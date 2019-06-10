<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_apl extends CI_Model 
{
	public function apl($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_apl');
			$this->db->where('id', $id);		
			return $this->db->get()->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_apl');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_apl.id_users_apl');
		// $this->db->where("id_pemohon_apl", $this->session->userdata('id'));		
		return $this->db->get()->result();
	}

	public function riwayat_apl($id = NULL)
	{
		if ($id != null) 
		{
			$this->db->where('id', $id);
			return $this->db->get('tbl_apl')->result();
		}
		$this->db->where('id_users_apl', $this->session->userdata('id'));
		return $this->db->get('tbl_apl')->result();
	}

	public function riwayat_balas($id = NULL)
	{
		$this->db->where('id_users_lapas', $this->session->userdata('id'));
		return $this->db->get('tbl_balas_apl')->result();
	}

	public function simpan($data)
	{
		$this->db->set('tanggal_apl', 'NOW()', FALSE);
		$this->db->insert('tbl_apl', $data);
		return true;
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

	public function autocomplete_bon($title)
	{	
		$this->db->like('nama_tersangka', $title , 'both');
		$this->db->order_by('nama_tersangka', 'ASC');
		$this->db->limit(10);
		return $this->db->get('tbl_kepolisian')->result();
    }
}