<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lupapassword extends CI_Model 
{

	public function kirim_token($token, $email)
	{
		$this->db->where('email', $email);
	    $this->db->update('tbl_users', array('token' => $token, 'time' => NOW()));
		if ($this->db->affected_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function cek_token_users($token)
	{
		$this->db->where('token', $token);
		$query = $this->db->get('tbl_users');
		return $query;
	}

	public function change_password($token)
	{
		$status = true;
		$pesan  = 'Success!, Password has been changed';
		$this->form_validation->set_rules('new_password', 'Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password ', 'trim|required|matches[new_password]');

		if ($this->form_validation->run() === FALSE) 
		{
			$status = false;
			$pesan 	= validation_errors();
		}
		if ($status) 
		{
			$password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
			$this->db->where('token', $token);
			$this->db->update('tbl_users', array('password' => $password, 'token'   => null));
			$this->m_pesan->generatePesan('berhasil', $pesan);
			redirect('auth');
		}

		return	$this->m_pesan->generatePesan('salah', $pesan);
	}
}
