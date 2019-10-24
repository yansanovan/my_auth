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
		coba_logout();
		cek_coba_logout_superadmin();
		$this->form_validation->set_rules('email', 'Email', 'required',  array('required' => 'Email tidak boleh kosong!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<p class="auth_validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('pages/auth/index');	
		}
		else
		{
			$email     	= htmlspecialchars($this->input->post('email', TRUE));
			$password 	= htmlspecialchars($this->input->post('password', TRUE));
			$data 		= $this->m_auth->sign_in($email);
			
			if ($data->num_rows() > 0) 
			{
				foreach ($data->result() as $users) 
				{
					if (!$this->m_hashed->hash_verify_password($password, $users->password)) 
					{
						$querycheck = $this->db->get_where('tbl_users', array('email' => $email))->result();				
						if($querycheck[0]->login_attemps >= 4)
						{
							$this->m_pesan->generatePesan('blokir', 'Opps! Maaf Akun Anda Telah Diblokir!');
							redirect('auth');		
						}
						else
						{
							$ip_address = $this->input->ip_address();
							$dataToInsert = array("ip_address" => $ip_address,  
												  "login_attemps" => $querycheck[0]->login_attemps+1);
							$this->db->update('tbl_users', $dataToInsert, array('email' => $email));
							$this->m_pesan->generatePesan('salah', 'Email Atau Password Salah!');
							redirect('auth');			
						}
					}
					else
					{
						if($users->login_attemps >= 4){
							$this->m_pesan->generatePesan('blokir', 'Maaf Akun anda Terblokir!');
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
							$this->m_pesan->generatePesan('logged_in', 'Anda Telah Login, Terima kasih!');
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
								$this->m_pesan->generatePesan('logged_in', 'Anda Telah Login, Terima kasih!');
								redirect('dashboard');
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
								$this->m_pesan->generatePesan('logged_in', 'Anda Telah Login, Terima kasih!');
								redirect('dashboard');
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
								$this->m_pesan->generatePesan('logged_in', 'Anda Telah Login, Terima kasih!');
								redirect('dashboard');
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
								$this->m_pesan->generatePesan('logged_in', 'Anda Telah Login, Terima kasih!');
								redirect('superadmin');
							}	
						}	
					}
				}
			}
			else
			{	
				$this->m_pesan->generatePesan('salah', 'Email / Password Salah!');
				redirect('auth');			
			}
		}
	}

	public function sign_out()
	{
		$array_items = array('id','username', 'email','level', 'status');
		$this->session->unset_userdata($array_items);
		$this->m_pesan->generatePesan('logout', 'Anda telah logout!');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('pages/auth/block/index');
	}
}
