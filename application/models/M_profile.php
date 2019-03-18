<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model 
{

	public function ambil_users($session_id)
	{
		$this->db->where('id', $session_id);
		$user = $this->db->get('tbl_users');
		return $user->result();
	}

	public function cek_users($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		return $query;
	}

	public function ubah_password($id, $password_baru)
	{
		$this->load->model('m_hashed');
		$hash_password = $this->m_hashed->hash_string_password($password_baru);
		$this->db->where('id', $id);
		$this->db->update('tbl_users', array('password' => $hash_password));
		return true;
	}
}
