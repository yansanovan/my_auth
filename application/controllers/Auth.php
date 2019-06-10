<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->load->model('m_hashed');
	}
	public function index()
	{		
		cek_coba_logout_kejaksaan();
		cek_coba_logout_kepolisian();
		cek_coba_logout_pengadilan();
		cek_coba_logout_lapas();
		cek_coba_logout_superadmin();
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
						$this->db->select('*');
						$this->db->from('tbl_users');
						$this->db->where('email', $email);
						$query = $this->db->get();
						$querycheck = $query->result();					
						$ip_address = $this->input->ip_address();
						$dataToInsert = array("ip_address" => $ip_address,  
											  "login_attemps" => $querycheck[0]->login_attemps+1);
						$this->db->update('tbl_users',$dataToInsert,array('email' => $email));
						if($querycheck[0]->login_attemps >= 3)
						{
							$this->session->set_flashdata('blokir','<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-warning"></i>Opps, Maaf!</h4>
							Akun Anda Di Blokir!
						  </div>');
							redirect('auth/sign_in');
						}
						else
						{
							$this->session->set_flashdata('gagal','<div class="alert alert-danger" role="alert"> Email / password anda salah!</div>');
							redirect('auth/sign_in', 'refresh');
						}
					}
					else
					{
						if($users->login_attemps >= 3){
							$this->session->set_flashdata('blokir','<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-warning"></i>Opps, Maaf!</h4>
							Akun Anda Di Blokir!
							</div>');
							redirect('auth/sign_in');
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
							redirect(base_url('dashboard'));
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
								redirect(base_url('dashboard'));
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
								redirect(base_url('dashboard'));
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
								redirect(base_url('dashboard'));
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
								redirect(base_url('dashboard'));
							}	
						}	
					}
				}
			}
			else
			{	
				$this->session->set_flashdata('invalid','<div class="alert alert-danger" role="alert"> Email / password anda tidak ditemukan!</div>');
				redirect('auth/sign_in', 'refresh');			
			}
		}
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
