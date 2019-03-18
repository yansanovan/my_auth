<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model 
{

	public function sign_in($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('tbl_users');
	}
}
