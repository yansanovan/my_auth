<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author : Yansa novan <yansanovan.yn31@gmail.com>
 * Github :
 * ===========================================================
 * Copyright (c) 2020 Yansa Novan
 * ===========================================================
 *	libary authentication for codeigniter 3
 *	created by Yansa novan
 *	Feature of auth is : 
 *	- login,
 *	- logout,
 *	- only method, 
 *	- permission, 
 *	- except method,
 *	- login attemps,  
 *	- forgot password
*/
class Auth 
{
	// instance ci
	protected $CI;

	// email default is null
	protected $email 	 = null; 

	// password default is null
	protected $password  = null; 

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->config->load('my_auth');
        $this->CI->load->model('authentication');
	}

	public function login()
	{ 
		$enable_redirect_role = $this->CI->config->item('enable_redirect_role');
		$redirect_role 		  = $this->CI->config->item('redirect_role');
		
		if ($enable_redirect_role === FALSE) 
		{
			$this->CI->m_message->generateMessage('wrong', 'Please enable redirect role!');
			return false;
		}

		$this->redirect_check_logged_in();

		if ($this->validate() === TRUE) 
		{			
			if ($this->authorize() === TRUE) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
	        $this->CI->session->unset_userdata('msgbox');
		}
	}

	public function validate()
	{
        $this->CI->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->CI->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->CI->form_validation->run() === TRUE) 
		{
			$this->email 	= htmlspecialchars($this->CI->input->post("email", TRUE));
            $this->password = htmlspecialchars($this->CI->input->post("password", TRUE));
			return true;
		}
		else
		{
	        return false;
		}
	}

	public function authorize()
	{
		$data = $this->CI->authentication->findUser($this->email);

		if ($data->num_rows() > 0) 
		{
			foreach ($data->result() as $users) 
			{	
				if(password_verify($this->password, $users->password))
				{
					if ($users->active == 1) 
					{
						$this->CI->m_message->generateMessage('wrong', 'Your account deactive!');
						redirect('login');
					}
					else
					{
				    	$enable_login_attemps = $this->CI->config->item('enable_login_attemps');	
				    	if ($enable_login_attemps != FALSE) 
				    	{
				    		$this->check_attemps();
			    		}
			    		$array = ['id'			=>  $users->id_session,
					    		  'username'  	=>  $users->username,
					    		  'email'	  	=>  $users->email,
					    		  'role'		=>  $users->role_name,
					    		  'logged_in' 	=>  true
					    		 ];
						$session = $this->CI->session->set_userdata($array);

						$enable_redirect_role = $this->CI->config->item('enable_redirect_role');
						$redirect_role 		  = $this->CI->config->item('redirect_role');

						if(isset($redirect_role[$this->CI->session->userdata('role')])) 
						{
							$value = $redirect_role[$this->CI->session->userdata('role')];
							redirect($value);
							return true;
						} 
						else 
						{
							$this->CI->m_message->generateMessage('wrong', 'Please check redirect role!');
							$session = array("id", "username", "email", "role", "logged_in");
							$this->CI->session->unset_userdata($session);
							redirect('login');
							return false;
						}
					}
				}
				else
				{
			    	$enable_login_attemps = $this->CI->config->item('enable_login_attemps');	
			    	if ($enable_login_attemps === TRUE) 
			    	{
			    		$this->attemps();
		    		}
					$this->CI->m_message->generateMessage('wrong', 'username or password incorrect!');
					return false;
				}
			}
		}
		else
		{
			$this->CI->m_message->generateMessage('wrong', 'username or password not found!');
			return false;
		}
	}

	public function users()
	{
		if ($this->CI->session->userdata('logged_in') === true) 
		{
			$this->CI->db->select('users.*, role.*, users_on_role.*');
			$this->CI->db->from('users');
			$this->CI->db->join('users_on_role', 'users_on_role.user_id = users.id', 'left');
			$this->CI->db->join('role', 'role.id = users_on_role.role_id', 'left');
			$this->CI->db->where('users.id', $this->CI->session->userdata('id'));
			$users = $this->CI->db->get()->row();
			$data  = [ 'id' 		=> $users->id,
					   'username'   => $users->username,
					   'email' 		=> $users->email,
					   'last_login' => $users->last_login,
					   'role' 		=> $users->role,
					   'image' 		=> $users->image,
					   'last_login' => $users->last_login
					 ];
			return $data;
		}
		else
		{
			return false;
		}
	}

	public function access()
	{
		if ($this->CI->session->userdata('logged_in') != true) 
		{
			$this->CI->m_message->generateMessage('wrong', 'why you want to go there? you don\'t have access.');
			redirect('login');
		}

		return $this;
	}

    public function except($method = array())
    {
        if (is_array($method)) 
        {
            foreach ($method as $methods) 
            {
                if ($methods == (is_null($this->CI->uri->segment(2)) ? "index" : $this->CI->uri->segment(2))) 
                {
					return $this;
                }
            }
        }
        return $this->access();
    }

    public function only($method = array())
    {
    	if (is_array($method)) 
    	{
    		foreach ($method as $methods) 
    		{
    			if ($methods == (is_null($this->CI->uri->segment(2)) ? "index" : $this->CI->uri->segment(2))) 
    			{
    				return $this->access();
    			}
    		}
    	}
    	return $this;
    }

	public function permission($role = array())
	{
		$enable_redirect_role = $this->CI->config->item('enable_redirect_role');
		$redirect_role 		  = $this->CI->config->item('redirect_role');

		if ($this->CI->session->userdata('logged_in') === true) 
		{
			if ($enable_redirect_role === TRUE) 
			{
				if (!in_array($this->CI->session->userdata('role'), $role)) 
				{
					foreach ($redirect_role as $user => $redirect) 
					{
						if ($this->CI->session->userdata('role') === $user) 
						{
							$this->CI->m_message->generateMessage('wrong', 'you dont have access!');
							redirect($redirect);
						} 	
					}
				}
			}
		}
	}

    public function check_attemps()
    {
    	$max_login_attemps  = $this->CI->config->item('max_login_attemps');
    	$querycheck 	 	= $this->CI->db->get_where('users', array('email' => $this->email))->result();		
    	if($querycheck[0]->login_attemps >= $max_login_attemps)
    	{
    		$this->CI->m_message->generateMessage('blocked', 'Opps! Sorry, your accout has been blocked!');
    		redirect('login');		
    	}
    }

    public function attemps()
    {
    	$max_login_attemps = $this->CI->config->item('max_login_attemps');		
    	$querycheck 	   = $this->CI->db->get_where('users', ['email' => $this->email])->result();		
    	if($querycheck[0]->login_attemps >= $max_login_attemps)
    	{
    		$this->CI->m_message->generateMessage('blocked', 'Opps! Sorry, your accout has been blocked!');
    		redirect('login');		
    	}
    	else
    	{
    		$ip_address = $this->CI->input->ip_address();
    		$attemps    = ["ip_address"    => $ip_address,
    					   "login_attemps" => $querycheck[0]->login_attemps+1];
    		$this->CI->db->update('users', $attemps, ['email' => $this->email]);
			$this->CI->m_message->generateMessage('wrong', 'Incorrect Email or Password!');
    		redirect('login');			
    	}
    }

    public function redirect_check_logged_in()
    {
		$enable_redirect_role = $this->CI->config->item('enable_redirect_role');
		$redirect_role 		  = $this->CI->config->item('redirect_role');

		if ($this->CI->session->userdata('logged_in') == true) 
		{
			if ($enable_redirect_role === TRUE) 
			{
				foreach ($redirect_role as $user => $redirect) 
				{
					if ($this->CI->session->userdata('role') === $user) 
					{
						$this->CI->m_message->generateMessage('wrong', 'You don\'t have access!');
						redirect($redirect);
					} 	
				}
			}
		}
    }

    public function forgot()
    {
		$this->redirect_check_logged_in();

		if ($this->forgotten_validate() === true) 
		{
			if ($this->forgotten_check_email() === true) 
			{
				$this->CI->m_message->generateMessage('success', 'Success! Link forgotten password has been send to your email, Please check!');
				redirect('login/forgot');
				return true;
			}
		}
		else
		{
			return false;
		}
    }

    public function forgotten_validate()
	{
        $this->CI->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->CI->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->CI->form_validation->run() === TRUE) 
		{
			$this->email = htmlspecialchars($this->CI->input->post("email", TRUE));
			return true;
		}
		else
		{
	        return false;
		}
	}

	public function forgotten_check_email()
	{
		
		$data = $this->CI->authentication->findUser($this->email);
		if ($data->num_rows() > 0) 
		{
			foreach ($data->result() as $users) 
			{	
				if ($users->active == 1) 
				{
					$this->CI->m_message->generateMessage('wrong', 'Your accout deactive!');
					redirect('login/forgot');
				}
				$token  = bin2hex(random_bytes(32));

				if($this->CI->authentication->_forgotten_password_token($token, $this->email)) 
				{
					$config 	= $this->CI->config->item('email_forgotten');
					$email_from = $this->CI->config->item('email_from');

					$this->CI->load->library('email', $config);
					$this->CI->email->set_newline("\r\n");
					$this->CI->email->from($email_from, 'Admin');
					$this->CI->email->to( htmlspecialchars($this->CI->input->post('email', TRUE)));
					$this->CI->email->subject('Admin');
					$this->CI->email->message('Reset Password');
					$message  = "<h1 style='color:rgb(66, 149, 245)'><center> Hallo, this is link forgotten your password!!</center></h1>";
					$message .= "<br>";
					$message .= "<p> Please click link below to reset your password";
					$message .= "<br>";
					$message .= "<p><a href='".base_url('login/reset/'.$token)."'>Clik Here</a></p>";
					$this->CI->email->message($message);

					if($this->CI->email->send())
					{
						return true;
					}
					else 
					{
						show_error($this->CI->email->print_debugger());
					}
				}
				else
				{
					$this->CI->m_message->generateMessage('wrong', 'Could not send an email!');
					redirect('login/forgot');
					return false;		
				}
			}
		}
		else
		{
			$this->CI->m_message->generateMessage('wrong', 'Email not found!');
			redirect('login/forgot');
			return false;
		}
	}

	public function reset($token)
	{
		$this->redirect_check_logged_in();

		$forgotten_password_time  = $this->CI->authentication->_check_token($token)->row();
		$check = $this->CI->authentication->_check_token($token);
		if ($check->num_rows() == 0) 
		{
			$this->CI->m_message->generateMessage('wrong', 'Opps! Token is invalid!');
			redirect('login/forgot');
		}
		else
		{
			$expired_reset = $this->CI->config->item('expired_reset');
			
			if (time() - $forgotten_password_time->forgotten_password_time > $expired_reset) 
			{
				$this->CI->m_message->generateMessage('wrong', 'Opps! token has been expired');
				redirect('login/forgot');	
			}
			else
			{
				if (htmlspecialchars($this->CI->input->post('change_password', TRUE))) 
				{
					$this->CI->authentication->change_password($token);
				}
				$this->CI->template->load('layouts/app','auth/changepassword');	
			}
		}
	}
	
	public function logout()
	{
        date_default_timezone_set('Asia/jakarta');
		$this->CI->db->set('last_login', 'NOW()', FALSE);
		$this->CI->db->where('id' , $this->CI->session->userdata('id'));
	    $this->CI->db->update('users');
		$this->CI->session->sess_destroy();
		redirect('login');
	}
}
