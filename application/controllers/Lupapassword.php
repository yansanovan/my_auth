<?php
class Lupapassword extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lupapassword');
		$this->load->model('m_hashed');
	}
	public function index()
	{
		cek_coba_logout_kejaksaan();
		cek_coba_logout_kepolisian();
		cek_coba_logout_pengadilan();
		cek_coba_logout_lapas();
		cek_coba_logout_superadmin();
	
		$this->form_validation->set_rules('email','Email','required|trim|valid_email', array('required' =>'Email tidak boleh kosong!'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('pages/lupapassword/index');		
		}
		else
		{
			$email = $this->input->post('email', TRUE);
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			if($this->m_lupapassword->kirim_token($token, $email)) 
			{
				$config['protocol']  = 'smtp';
				$config['smtp_host'] = 'ssl://in.mailjet.com';
				$config['smtp_port'] = '465';
				$config['smtp_user'] = '88f92a8c3b04ed85b96ec5897f261527';
				$config['smtp_pass'] = '6b61df8f013c65986f468d406ff522a2';
				$config['charset'] 	 = 'utf-8';
				$config['mailtype']  = 'html';
				$config['newline']   = "\r\n";

				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				$this->email->from('yansanovan.yn@gmail.com', 'novan');
				$this->email->to( $this->input->post('email', TRUE));
				$this->email->subject('Admin');
				$this->email->message('Ganti Password');
				$message  = "<h1><center> Hallo, dibawah ini adalah link reset password anda!!</center></h1>";
				$message .= "<br>";
				$message .= "<p> Untuk melakukan reset password anda, silahkan klik link berikut";
				$message .= "<br>";
				$message .= "<p><a href='".base_url()."lupapassword/ubah_password/$token'>Klik Disini</a></p>";
				$this->email->message($message);

				if($this->email->send())
				{
					$this->session->set_flashdata('link_reset_password_terkirim','<div class="alert alert-success" role="alert"> Link reset password sudah dikirim ke E-mail anda, Silahkan cek!</div>');
					redirect(base_url('lupapassword'));
				}
				else 
				{
				    show_error($this->email->print_debugger());
				}
			}
			else
			{
				$this->session->set_flashdata('tidak_ditemukan','<div class="alert alert-danger" role="alert">
																	E-mail tidak ditemukan!
																</div>');
				redirect(base_url('lupapassword'));			
			}
		}		
	}
	public function ubah_password()
	{
		$token = $this->uri->segment(3);
		$cek_users = $this->m_lupapassword->cek_token_users($token);
		if ($cek_users->num_rows() == 0) 
		{
			$this->session->set_flashdata('token_invalid','<div class="alert alert-danger" role="alert">
														    Token anda invalid!
														   </div>');
			redirect(base_url('lupapassword'));
		}
		else
		{
			if ($this->input->post('ganti_password', TRUE)) 
			{
				$this->m_lupapassword->ganti_password_baru($token);
			}
			$this->load->view('pages/lupapassword/passwordbaru/index');
		}
	}
}