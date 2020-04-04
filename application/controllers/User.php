<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->access()->permission(['user']);
	}

	public function index()
	{
		print_r($this->auth->users());
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */