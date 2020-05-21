<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->access()->permission(['users']);
	}

	public function index()
	{
		$data['users'] = $this->auth->users();
		$this->template->load('layouts/app','dashboard', $data);	
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */