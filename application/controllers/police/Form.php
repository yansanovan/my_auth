<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller
{
    
	function __construct()
	{
		parent::__construct();
        check_session_police();
	}
    public function index()
    {
        $this->template->load('pages/template/template','pages/police/form/content');      
    }
}


