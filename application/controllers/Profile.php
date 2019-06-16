<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();	
		$this->load->model('m_hashed');
		$this->load->model('m_profile');
	}

	public function index()
	{
		$session_id	   = $this->session->userdata('id');
		$data['users'] = $this->m_profile->ambil_users($session_id);
		
		$this->form_validation->set_rules('password_lama','<b>Password Lama</b>', 'required', 
											array('required' => 'Masukan Password Lama!'));
		$this->form_validation->set_rules('password_baru','<b>Password Baru</b>', 'required|trim|min_length[8]', 
											array('required' => 'Masukan Password Baru!'));
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
			

		if ($this->form_validation->run() === FALSE ) 
		{
	        $this->template->load('pages/template/template','pages/profile/content', $data);
		}
		else
		{
			$email 			= $this->input->post('email', TRUE);
			$password_lama	= $this->input->post('password_lama', TRUE);
			$userdata		= $this->m_profile->cek_users($email);
			if ($userdata->num_rows() > 0) 
			{
				foreach($userdata->result() as $value) 
				{
					if ($this->m_hashed->hash_verify_password($password_lama, $value->password))
					{
						$id 		   = $this->input->post('id', TRUE);
						$password_baru = $this->input->post('password_baru', TRUE);
						$this->m_profile->ubah_password($id, $password_baru);
						$this->session->set_flashdata('password_berhasil_dirubah','<div class="alert alert-success" role="alert"> Password berhasil dirubah!</div>');
						redirect('profile');
					}
					else
					{
						$this->session->set_flashdata('password_berbeda','<div class="alert alert-danger" role="alert"> Password lama tidak sama!</div>');
						redirect('profile');
					}
				}
			}
			else
			{
				redirect('profile');
			}
		}
	}
}