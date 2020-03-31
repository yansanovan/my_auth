<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function index()
	{
        $this->auth->login();
		$this->template->load('layouts/app','auth/login');	
	}

	public function forgot()
	{
        $this->auth->forgot();
		$this->template->load('layouts/app','auth/forgotpassword');	
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
