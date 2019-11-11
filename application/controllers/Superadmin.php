<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Superadmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_session_superadmin();
	}
	public function index()
	{
		$data['data'] = $this->m_superadmin->tampil_users();
		$this->load->view('pages/superadmin/users/index', $data);	
	}

	public function create()
	{
		$this->load->view('pages/superadmin/manage/add/index');	
	}

	public function store()
	{
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('level','level', 'required');
        $this->form_validation->set_error_delimiters('<p class="auth_validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->create();
		}
		else
		{
			$post	= $this->input->post(NULL, TRUE);
			$data = array('username' => $post['username'],
						  'email' 	 => $post['email'],
						  'password' => password_hash($post['password'], PASSWORD_BCRYPT),
						  'level'	 => $post['level'],
						  'image'    => 'default.jpg');
			$this->m_superadmin->store($data);
			$this->m_pesan->generatePesan('berhasil', 'Success!, User has been created');
			redirect('superadmin/create');
		}	
	}

	public function edit($id)
	{
		$cek_id = $this->m_superadmin->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
			$data['data'] = $this->m_superadmin->tampil_users($id);
			$this->load->view('pages/superadmin/manage/edit/index', $data);
		}
	}
	public function delete($id)
	{
		$this->m_superadmin->hapus($id);
		$this->m_pesan->generatePesan('berhasil', 'Success!, Data has been deleted');
		redirect('superadmin');
	}

	public function check_user_email($email) 
	{        
	    if($this->input->post('id'))
	        $id = $this->input->post('id');
	    else
	        $id = '';
	    $result = $this->m_superadmin->check_unique_user_email($id, $email);
	    if($result == 0)
	        $response = true;
	    else {
	        $this->form_validation->set_message('check_user_email', 'Upps! Email must be unique!');
	        $response = false;
	    }
	    return $response;
	}
	public function update()
	{
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_email');
        $this->form_validation->set_error_delimiters('<p class="auth_validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
		
		$post = $this->input->post(NULL, TRUE);
		
		if ($this->form_validation->run() === FALSE) 
		{
			return $this->edit($post['id']);
		}
		else
		{
			if (!$post['password']) 
			{
				$data = array('username' => $post['username'],
							  'email' 	 => $post['email'],
							  'level'	 => $post['level'], 
							  'login_attemps'	 => $post['status_block']);
				$this->m_superadmin->update($post['id'], $data);
				$this->m_pesan->generatePesan('berhasil', 'Success!, User has been updated');
				redirect('superadmin/edit/'.$post['id']);

			}
			elseif (!$post['email']) 
			{
				$data = array('username' => $post['username'],
							  'password' => $this->m_hashed->hash_string_password($post['password']),
							  'level'	 => $post['level'],
							  'login_attemps'	 => $post['status_block']);
				$this->m_superadmin->update($post['id'], $data);
				$this->m_pesan->generatePesan('berhasil', 'Success!, User has been updated');
				redirect('superadmin/edit/'.$post['id']);

			}
			else
			{
				$data = array('username' => $post['username'],
							  'email' 	 => $post['email'],
							  'password' => $this->m_hashed->hash_string_password($post['password']),
							  'level'	 => $post['level'],
							  'login_attemps'	 => $post['status_block']);
							  
				$this->m_superadmin->update($post['id'], $data);
				$this->m_pesan->generatePesan('berhasil', 'Success!, User has been updated');
				redirect('superadmin/edit/'.$post['id']);
			}
		}	

	}
    public function db_backup() 
    {
		$this->load->helper('file');
		$this->load->dbutil();
		
		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'database.sql'
		);
	
		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup($config);
		// Load the file helper and write the file to your server
		$this->load->helper('download');
		// $success = write_file($save, $backup);
		force_download('backup_database-'.date("ymdHis").'-db.zip', $backup);

		if ($success) 
		{
			$this->m_pesan->generatePesan('berhasil', 'Success!, Database has been Backup');
			redirect('superadmin');
		}
	}

	public function project_backup()
	{
		$date = date("Y-m-d");
		$this->load->library('zip');
		$this->zip->read_dir(FCPATH, FALSE);
		$success = $this->zip->download('Files_backup'.$date.'zip');
		if ($success) 
		{
			$this->m_pesan->generatePesan('berhasil', 'Success!, Project has been Backup');
			redirect('superadmin');
		}
	}
}
