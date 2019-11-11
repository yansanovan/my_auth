<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
		check_logout();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="auth_validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('pages/auth/index');	
		}
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$email     	= htmlspecialchars($this->input->post('email', TRUE));
		$password 	= htmlspecialchars($this->input->post('password', TRUE));
		$data 		= $this->m_auth->sign_in($email);
		
		if ($data->num_rows() > 0) 
		{
			foreach ($data->result() as $users) 
			{
				if (!password_verify($password, $users->password)) 
				{
					$querycheck = $this->db->get_where('tbl_users', array('email' => $email))->result();				
					if($querycheck[0]->login_attemps >= 4)
					{
						$this->m_pesan->generatePesan('blocked', 'Opps! Sorry, your accout has been blocked!');
						redirect('auth');		
					}
					else
					{
						$ip_address = $this->input->ip_address();
						$dataToInsert = array("ip_address" => $ip_address,  
											  "login_attemps" => $querycheck[0]->login_attemps+1);
						$this->db->update('tbl_users', $dataToInsert, array('email' => $email));
						$this->m_pesan->generatePesan('salah', 'Email or Password is wrong!');
						redirect('auth');			
					}
				}
				else
				{
					if($users->login_attemps >= 4)
					{
						$this->m_pesan->generatePesan('blocked', 'Opps! Sorry, your accout has been blocked!');
						redirect('auth');
					}
					else
					{
						$dataToInsert = array("login_attemps" => 0 );
						$this->db->update('tbl_users',$dataToInsert,array('email' => $users->email));

						if ($users->level == 'kejaksaan') 
						{
							$data = array('id'		 =>  $users->id,
										  'username' =>  $users->username,
										  'email'	 =>  $users->email,
										  'level'	 =>  $users->level,
										  'status'	 =>  'logged',
										  );
							
							$this->session->set_userdata($data);
							$this->m_pesan->generatePesan('logged_in', 'You are logged now, Thank You!');
							redirect('prosecutor/dashboard');
						}
						elseif ($users->level == 'kepolisian') 
						{
							$data = array('id'		 =>  $users->id,
										  'username' =>  $users->username,
										  'email'	 =>  $users->email,
										  'level'	 =>  $users->level,
										  'status'	 =>  'logged',
										 );
							
							$this->session->set_userdata($data);
							$this->m_pesan->generatePesan('logged_in', 'You are logged now, Thank You!');
							redirect('police/dashboard');
						}
						elseif ($users->level == 'pengadilan') 
						{
							$data = array('id'		 =>  $users->id,
										'username' =>  $users->username,
										'email'	 =>  $users->email,
										'level'	 =>  $users->level,
										'image'	 =>  $users->image,
										'status'	 =>  'logged',
										);
							
							$this->session->set_userdata($data);
							$this->m_pesan->generatePesan('logged_in', 'You are logged now, Thank You!');
							redirect('court/dashboard');
						}
						elseif ($users->level == 'lapas') 
						{
							$data = array('id'		 =>  $users->id,
										'username' =>  $users->username,
										'email'	 =>  $users->email,
										'level'	 =>  $users->level,
										'status'	 =>  'logged',
										);
							
							$this->session->set_userdata($data);
							$this->m_pesan->generatePesan('logged_in', 'You are logged now, Thank You!');
							redirect('prison/dashboard');
						}	
						elseif ($users->level == 'superadmin') 
						{
							$data = array('id'	   =>  $users->id,
											'username' =>  $users->username,
											'email'	   =>  $users->email,
											'level'	   =>  $users->level,
											'status'   =>  'logged',
											);
							
							$this->session->set_userdata($data);
							$this->m_pesan->generatePesan('logged_in', 'You are logged now, Thank You!');
							redirect('superadmin');
						}	
					}	
				}
			}
		}
		else
		{	
			$this->m_pesan->generatePesan('salah', 'Email Or Password is wrong!');
			redirect('auth');			
		}
	}

	public function sign_out()
	{
		$this->db->set('last_login', 'NOW()', FALSE);
		$this->db->where('id', $this->session->userdata('id'));
	    $this->db->update('tbl_users');
		$session = array('id','username', 'email','level', 'status');
		$this->session->unset_userdata($session);
		$this->m_pesan->generatePesan('logout', 'You have been logout!');
		redirect('auth');
	}
}
