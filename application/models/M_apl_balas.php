<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_apl_balas extends CI_Model 
{
	public function apl($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_apl');
			$this->db->where('id', $id);		
			return $this->db->get();
		}
		// jika login sebagai polisi kejaksaan dan pengadilan tampilkan balasan apl
		$this->db->select('tbl_apl.*, tbl_users.username as username');
		$this->db->from('tbl_apl');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_apl.id_users_apl');	
		return $this->db->get()->result();
	}

	public function balas_apl($data, $id)
	{
		$this->db->set('tanggal_apl_balasan', 'NOW()', FALSE);
		$balas = $this->db->insert('tbl_balas_apl', $data);

		if ($balas) 
		{
			$this->db->where('id', base64_decode($id));
			$this->db->update('tbl_apl', array('status_balas' => 1));
		}
		return true;
	}

	public function riwayat_balas_apl()
	{
		$this->db->select('tbl_balas_apl.*, tbl_apl.nama_tersangka as nama_tersangka,  tbl_users.username as username');
		$this->db->from('tbl_balas_apl');
		$this->db->join('tbl_apl', 'tbl_apl.id = tbl_balas_apl.id_apl_balasan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_balas_apl.id_users_apl');
		$this->db->where('id_users_lapas', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function ubah($data)
	{
		$this->db->where('id', $this->input->post('id_apl'));
		$this->db->update('tbl_apl', $data);
		return true;
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_apl');
		return true;
	}

	public function cek_balas_apl($id)
	{
		$this->db->where('id_apl_balasan', $id);
		$query = $this->db->get('tbl_balas_apl');
		return $query;
	}
}