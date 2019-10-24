<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Superadmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_is_logged();
		if ($this->session->userdata('level') !='superadmin') 
		{
			redirect('dashboard');
		}
	}
	public function index()
	{
		$data['data'] = $this->m_superadmin->tampil_users();
		$this->load->view('pages/superadmin/data_users/index', $data);	
	}

	public function tambah_users()
	{
		$this->load->view('pages/superadmin/kelola_users/tambah_users/index');	
	}

	public function simpan()
	{
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->tambah_users();
		}
		else
		{
			$username	= $this->input->post('username');
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			$level 		= $this->input->post('level');

			$data = array('username' => $username,
						  'email' => $email,
						  'password' => $this->m_hashed->hash_string_password($password),
						  'level'	 => $level);
			$this->m_superadmin->simpan($data);
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">Users di simpan</div>');
			redirect('superadmin/tambah_users');
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
			$this->load->view('pages/superadmin/kelola_users/ubah_users/index', $data);
		}
	}
	public function hapus($id)
	{
		$this->m_superadmin->hapus($id);
		$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Users terhapus</div>');
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
	        $this->form_validation->set_message('check_user_email', 'Upps! Email ada yang sama, harus unik!');
	        $response = false;
	    }
	    return $response;
	}
	public function update()
	{

		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_email');
		// $this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$id = $this->input->post('id');
			return $this->edit($id);
		}
		else
		{
			$id 			= $this->input->post('id');
			$username		= $this->input->post('username');
			$email 			= $this->input->post('email');
			$password 		= $this->input->post('password');
			$level 			= $this->input->post('level');
			$status_block 			= $this->input->post('status_block');


			if (!$password) 
			{
				$data = array('username' => $username,
							  'email' 	 => $email,
							  'level'	 => $level, 
							  'login_attemps'	 => $status_block);
				$this->m_superadmin->update($id, $data);
				$this->session->set_flashdata('updated', '<div class="alert alert-success" role="alert">Users berhasil di update</div>');
				redirect('superadmin');
			}
			elseif (!$email) 
			{
				$data = array('username' => $username,
							  'password' => $this->m_hashed->hash_string_password($password),
							  'level'	 => $level,
							  'login_attemps'	 => $status_block);
				$this->m_superadmin->update($id, $data);
				$this->session->set_flashdata('updated', '<div class="alert alert-success" role="alert">Users berhasil di update</div>');
				redirect('superadmin');
			}
			else
			{
				$data = array('username' => $username,
							  'email' 	 => $email,
							  'password' => $this->m_hashed->hash_string_password($password),
							  'level'	 => $level,
							  'login_attemps'	 => $status_block);
							  
				$this->m_superadmin->update($id, $data);
				$this->session->set_flashdata('updated', '<div class="alert alert-success" role="alert">Users berhasil di update</div>');
				redirect('superadmin');
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
		// $save = FCPATH.'backup/database/backup-database-'.date("ymdHis").'-db.zip';
		// $save = 'backup-database-'.date("ymdHis").'-db.zip';

		// Load the file helper and write the file to your server
		$this->load->helper('download');
		// $success = write_file($save, $backup);
		force_download('backup_database-'.date("ymdHis").'-db.zip', $backup);

		if ($success) 
		{
			redirect(base_url('superadmin'));
			$this->session->set_flashdata('Backup_db', '<div class="alert alert-success" role="alert">Database berhasil di backup</div>');
		}
	}

	public function project_backup()
	{
		$date = date("Y-m-d");
		$this->load->library('zip');
		$this->zip->read_dir(FCPATH, FALSE);
		$success = $this->zip->download('Files_backup'.$date.'zip');
		// $success = $this->zip->archive('backup/project/backup-files-'.$date.'.zip');
		if ($success) 
		{
			$this->session->set_flashdata('Bakup_files', '<div class="alert alert-success" role="alert">Files berhasil di backup</div>');
			redirect(base_url('superadmin'));
		}
	}
}
