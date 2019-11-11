<?php
class ForgotpasswordController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		check_logout();
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_error_delimiters('<p class="auth_validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');

		if($this->form_validation->run() === FALSE)
		{			
			$this->load->view('pages/lupapassword/index');	
		}
		else
		{
			$email = htmlspecialchars($this->input->post('email', TRUE));
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
				$message  = "<h1 style='color:rgb(66, 149, 245)'><center> Hallo, this is link forgotten your password!!</center></h1>";
				$message .= "<br>";
				$message .= "<p> Please click link below to reset your password";
				$message .= "<br>";
				$message .= "<p><a href='".base_url('forgot/reset/'.$token)."'>Clik Here</a></p>";
				$this->email->message($message);

				if($this->email->send())
				{
					$this->m_pesan->generatePesan('berhasil', 'Success! Link forgotten password has been send to your email, Please check!');
					redirect('forgot');
				}
				else 
				{
				    show_error($this->email->print_debugger());
				}
			}
			else
			{
				$this->m_pesan->generatePesan('salah', 'Opps! Email not found!');
				redirect('forgot');			
			}
		}		
	}
	public function change_password()
	{
		$token = $this->uri->segment(3);
		$time = $this->db->get_where('tbl_users', array('token' => $token))->row();

		$cek_users = $this->m_lupapassword->cek_token_users($token);
		if ($cek_users->num_rows() == 0) 
		{
			$this->m_pesan->generatePesan('salah', 'Opps! Your token invalid!');
			redirect('forgot');
		}
		else
		{
			if (time() - $time->time > 300) 
			{
				$this->m_pesan->generatePesan('salah', 'Opps! token has been expired');
				redirect('forgot');	
			}
			else
			{
				if (htmlspecialchars($this->input->post('ganti_password', TRUE))) 
				{
					$this->m_lupapassword->change_password($token);
				}
				$this->load->view('pages/lupapassword/passwordbaru/index');
			}
		}
	}
}