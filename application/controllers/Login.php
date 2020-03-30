<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->auth->only(['coba']);
	// }
	public function index()
	{
        $this->auth->login();
		$this->load->view('auth/login');
	}

	public function forgot()
	{
        $this->auth->forgot();
		$this->load->view('auth/forgotpassword');
	}

	public function reset($token)
	{
        $this->auth->reset($token);
	}
	
	public function logout()
	{
		$this->auth->logout();
	}

}
