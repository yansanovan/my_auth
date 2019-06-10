<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_bon extends CI_Model 
{
	public function ambil_bon($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_bon');
			$this->db->where('id_bon', $id);		
			return $this->db->get()->row();
		}
		$this->db->select('tbl_balas_bon.*, tbl_bon.nama_tersangka as nama_tersangka, tbl_users.username as username');
		$this->db->from('tbl_balas_bon');
		$this->db->join('tbl_bon', 'tbl_bon.id_bon = tbl_balas_bon.id_bon_balasan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_balas_bon.id_users_lapas');
		$this->db->where("id_users_pemohon_balasan", $this->session->userdata('id'));		
		return $this->db->get()->result();
	}

	public function riwayat_bon($id = NULL)
	{
		if ($id != null) 
		{
			$this->db->where('id_bon', $id);
			return $this->db->get('tbl_bon')->result();
		}
		$this->db->where('id_users_pemohon', $this->session->userdata('id'));
		return $this->db->get('tbl_bon')->result();
	}

	public function simpan($data)
	{
		$this->db->set('tanggal_posting', 'NOW()', FALSE);
		$this->db->insert('tbl_bon', $data);
		return true;
	}

	public function ubah($data)
	{
		$this->db->where('id_bon', $this->input->post('id_bon'));
		$this->db->update('tbl_bon', $data);
		return true;
	}

	public function hapus($id)
	{
		$this->db->where('id_bon', $id);
		$this->db->delete('tbl_bon');
		return true;
	}

	public function autocomplete_bon($title)
	{	
		$this->db->like('nama_tersangka', $title , 'both');
		$this->db->order_by('nama_tersangka', 'ASC');
		$this->db->limit(10);
		return $this->db->get('tbl_kepolisian')->result();
    }
}