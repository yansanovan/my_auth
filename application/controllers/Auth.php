<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->load->model('m_hashed');
		
	}
	public function index()
	{		
		$this->cek_coba_logout_kejaksaan();
		$this->cek_coba_logout_kepolisian();
		$this->cek_coba_logout_pengadilan();
		$this->cek_coba_logout_lapas();
		$this->cek_coba_logout_superadmin();
		$this->load->view('pages/auth/index');
	}

	public function sign_in()
	{
		$this->form_validation->set_rules('email', 'Email', 'required',  array('required' => 'Email tidak boleh kosong!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() === FALSE) 
		{
			return $this->index();
		}
		else
		{
			$email     	= $this->input->post('email', TRUE);
			$password 	= $this->input->post('password', TRUE);
			$data 		= $this->m_auth->sign_in($email);
			
			if ($data->num_rows() > 0) 
			{
				foreach ($data->result() as $users) 
				{
					if (!$this->m_hashed->hash_verify_password($password, $users->password)) 
					{
						$this->session->set_flashdata('gagal','<div class="alert alert-danger" role="alert"> Email / password anda salah!</div>');
						redirect(base_url('auth'));
					}
					else
					{
						if ($users->level == 'kejaksaan') 
						{
							$data = array('id'		 =>  $users->id,
										  'username' =>  $users->username,
										  'email'	 =>  $users->email,
										  'level'	 =>  $users->level,
										  'status'	 =>  'logged',
										  );
							
							$this->session->set_userdata($data);
							redirect(base_url('kejaksaan'));
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
							redirect(base_url('kepolisian'));
						}

						elseif ($users->level == 'pengadilan') 
						{
							$data = array('id'		 =>  $users->id,
										  'username' =>  $users->username,
										  'email'	 =>  $users->email,
										  'level'	 =>  $users->level,
										  'status'	 =>  'logged',
										  );
							
							$this->session->set_userdata($data);
							redirect(base_url('pengadilan'));
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
							redirect(base_url('lapas'));
						}	

						elseif ($users->level == 'superadmin') 
						{
							$data = array('id'		 =>  $users->id,
										  'username' =>  $users->username,
										  'email'	 =>  $users->email,
										  'level'	 =>  $users->level,
										  'status'	 =>  'logged',
										  );
							
							$this->session->set_userdata($data);
							redirect(base_url('superadmin'));
						}	
					}	
				}
			}
			else
			{	
				$this->session->set_flashdata('invalid','<div class="alert alert-danger" role="alert"> Email / password anda tidak ditemukan!</div>');

				redirect(base_url('auth'));		
			}
		}
	}

	public function sign_out()
	{
		$this->session->set_flashdata('keluar','<div class="alert alert-success alert-dismissible fade show" role="alert">Anda telah keluar!</div>');
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
