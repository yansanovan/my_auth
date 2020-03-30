<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->access();
		$this->auth->permission(['admin']);
	}

	public function index()
	{
		$data['data'] = $this->authentication->get_user();
		$this->load->view('auth/index', $data);
	}

	public function create_user()
	{
		if ($this->store_user() == true) 
		{
			$data['role'] = $this->authentication->get_role();
			$this->load->view('auth/create_user', $data);
			return true;	
		}
		else
		{
			$data['role'] = $this->authentication->get_role();
			$this->load->view('auth/create_user', $data);
			return false;
		}
	}

	public function store_user()
	{
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->form_validation->run() == FALSE) 
		{
			return false;
		}
		else
		{
			$post  = $this->input->post(NULL, TRUE);
			$data  = ['username'   => $post['username'],
					  'email' 	   => $post['email'],
					  'password'   => password_hash($post['password'], PASSWORD_DEFAULT),
					  'image'      => 'default.jpg',
					  'created_at' => date('Y-m-d H:i:s')
					 ];
			$this->authentication->create_user($data);
			$this->m_message->generateMessage('success', 'Successfully created new user');
		}	
	}

	public function check_user_email($email) 
	{        
	    if($this->input->post('id'))
	        $id = $this->input->post('id');
	    else
	        $id = '';
	    $result = $this->authentication->check_unique_user_email($id, $email);
	    if($result == 0)
	        $response = true;
	    else 
	    {
	        $this->form_validation->set_message('check_user_email', 'Upps! Email must be unique!');
	        $response = false;
	    }
	    return $response;
	}
	
	public function edit_user($id)
	{
		$data['role'] = $this->authentication->get_role();
		$data['data'] = $this->authentication->findUserById($id)->row();

		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|callback_check_user_email');
		$this->form_validation->set_rules('role', 'role', 'required');
		if ($this->input->post('password')) 
		{
			$this->form_validation->set_rules('password','Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'trim|required|matches[password]');
		}
        $this->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('auth/edit_user', $data);
			return false;
		}
		else
		{
			$post	= $this->input->post(NULL, TRUE);
			if ($this->input->post('password')) 
			{
				$data = ['username'   => $post['username'],
						 'email' 	  => $post['email'],
						 'password'   => password_hash($post['password'], PASSWORD_DEFAULT),
						 'active' 	  => $this->input->post('activation') == "1" ? "1" : null
						];
			}
			else
			{
				$data = ['username'   => $post['username'],
						 'email' 	  => $post['email'],
						 'active' 	  => $this->input->post('activation') == "1" ? "1" : null
						];
			}
			$this->authentication->update_user($post['id'], $data);
			$this->m_message->generateMessage('success', 'Successfully updated an user');
			redirect(current_url());
		}	
	}

	public function delete_user($id)
	{
		$this->authentication->delete_user($id);
		$this->m_message->generateMessage('success', 'Successfully deleted user');
		redirect('admin');
	}

	public function role()
	{
		$data['data'] = $this->authentication->get_role($get = "role");

		$this->form_validation->set_rules('role','role', 'required|is_unique[role.role]');
        $this->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('auth/role', $data);
			return false;
		}
		else
		{
			$post	= $this->input->post(NULL, TRUE);
			$data   = ['role'   	=> $post['role'],
					   'created_at' => date('Y-m-d H:i:s')];
			$this->authentication->create_role($data);
			$this->m_message->generateMessage('success', 'Successfully created new role');
			redirect(current_url());
		}	
	}

	public function edit_role($id)
	{
		$data['data'] = $this->db->get_where('role', ['id'=> $id])->row();

		$this->form_validation->set_rules('role', 'role', 'required|callback_check_role');
        $this->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('auth/edit_role', $data);
			return false;
		}
		else
		{
			$id 	= $this->input->post('id');
			$role   = $this->input->post('role');
			$this->authentication->update_role($id, $role);
			$this->m_message->generateMessage('success', 'Successfully updated a role');
			redirect(current_url());
		}	
	}

	public function check_role($role) 
	{        
	    if($this->input->post('id'))
	        $id = $this->input->post('id');
	    else
	        $id = '';
	    $result = $this->authentication->check_role_unique($id, $role);
	    if($result == 0)
	        $response = true;
	    else 
	    {
	        $this->form_validation->set_message('check_role', 'Upps! Role must be unique!');
	        $response = false;
	    }
	    return $response;
	}

	public function delete_role($id)
	{
		$this->authentication->delete_role($id);
		$this->m_message->generateMessage('success', 'Successfully deleted role');
		redirect('admin/role');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */