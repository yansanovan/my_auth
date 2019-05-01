<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model 
{
	public function surat_polisi($url = NULL)
	{
		if ($url != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_kepolisian');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
			$this->db->where(array('tbl_kepolisian.url' => $url));
			$this->db->order_by("id_data", "desc");
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
		$this->db->order_by("id_data", "desc");	
		return $this->db->get()->result();
	}

	public function get_balasan($id = NULL)
	{
		if ($id != NULL) {
			$this->db->select('*');
			$this->db->from('tbl_kepolisian');
			$this->db->join('tbl_balas_kejaksaan','tbl_balas_kejaksaan.id_surat_kj =  tbl_kepolisian.id_data', 'LEFT');
			$this->db->join('tbl_balas_pengadilan','tbl_balas_pengadilan.id_surat_pn =  tbl_kepolisian.id_data','LEFT');
			$this->db->where("id_data", $id);	
			$this->db->order_by("id_data", "desc");	
			return $this->db->get()->result();	
		}
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_balas_kejaksaan','tbl_balas_kejaksaan.id_surat_kj = tbl_kepolisian.id_data', 'LEFT');
		$this->db->join('tbl_balas_pengadilan','tbl_balas_pengadilan.id_surat_pn = tbl_kepolisian.id_data', 'LEFT');
		$this->db->order_by("id_data", "desc");	
		return $this->db->get()->result();	
	}

	public function get_username($id = NULL)
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_kejaksaan');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_kejaksaan.id_users_kj');
		$this->db->where("id_surat_kj", $id);	
		return $this->db->get()->row();	
	}

	public function get_username_pn($id = NULL)
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_pengadilan');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_pengadilan.id_users_pn');
		$this->db->where("id_surat_pn", $id);	
		return $this->db->get()->row();	
	}

	public function riwayat_balas_kj($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_balas_kejaksaan');
			$this->db->join('tbl_kepolisian','tbl_kepolisian.id_data = tbl_balas_kejaksaan.id_surat_kj');
			$this->db->where("id_surat_kj", $id);		
			return $this->db->get()->row();
		}

		$this->db->select('*');
		$this->db->from('tbl_balas_kejaksaan');
		$this->db->join('tbl_kepolisian','tbl_kepolisian.id_data = tbl_balas_kejaksaan.id_surat_kj');
		$this->db->where("id_users_kj", $this->session->userdata('id'));		
		return $this->db->get()->result();
	}

	public function riwayat_balas_pn($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_balas_pengadilan');
			$this->db->join('tbl_kepolisian','tbl_kepolisian.id_data = tbl_balas_pengadilan.id_surat_pn');
			$this->db->where("id_surat_pn", $id);		
			return $this->db->get()->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_balas_pengadilan');
		$this->db->join('tbl_kepolisian','tbl_kepolisian.id_data = tbl_balas_pengadilan.id_surat_pn');
		$this->db->where("id_users_pn", $this->session->userdata('id'));		
		return $this->db->get()->result();
	}

	public function kejaksaan_balas($data, $id)
	{
		$this->db->set('tanggal_balas_kj', 'NOW()', FALSE);
		$this->db->insert('tbl_balas_kejaksaan', $data);
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', array('status_kj' => 1));
	}

	public function pengadilan_balas($data, $id)
	{
		$this->db->set('tanggal_balas_pn', 'NOW()', FALSE);
		$this->db->insert('tbl_balas_pengadilan', $data);
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', array('status_pn' => 1));
	}


	public function hapus_balasan_kj($id)
	{
		$this->db->where('id_surat_kj', $id);
		$this->db->delete('tbl_balas_kejaksaan');
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', array('status_kj' => 0));
	}

	public function hapus_balasan_pn($id)
	{
		$this->db->where('id_surat_kj', $id);
		$this->db->delete('tbl_balas_kejaksaan');
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', array('status_kj' => 0));
	}

	public function cek_balas_kejaksaan($id_surat)
	{
		$this->db->where('id_surat_kj', $id_surat);
		$query = $this->db->get('tbl_balas_kejaksaan');
		return $query;
	}

	public function cek_balas_pengadilan($id_surat)
	{
		$this->db->where('id_surat_pn', $id_surat);
		$query = $this->db->get('tbl_balas_pengadilan');
		return $query;
	}
	public function cek_id($id)
	{
		$this->db->where('id_data', $id);
		$query = $this->db->get('tbl_kepolisian');
		return $query;
	}

}