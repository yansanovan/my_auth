<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lupapassword extends CI_Model 
{

	public function kirim_token($token, $email)
	{
		$this->db->where('email', $email);
		$data  = array('token' => $token);
	    $this->db->update('tbl_users', $data);
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

	public function ganti_password_baru()
	{
		$status = true;
		$pesan  = '<div class="alert alert-success"alert-dismissible fade show role="alert">password baru berhasil dirubah</div>';
		$this->form_validation->set_rules('password_baru', 'Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru]');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');


		if ($this->form_validation->run() === FALSE) 
		{
			$status = false;
			$pesan = validation_errors();
		}
		if ($status) 
		{
			$this->load->model('m_hashed');
			$password_baru = $this->input->post('password_baru');
			$password_baru_hash = $this->m_hashed->hash_string_password($password_baru);
			$this->db->update('tbl_users', array('password' => $password_baru_hash,
												  'token'   => null));
		}

		return $this->session->set_flashdata('flashdata', $pesan);
	}
}
