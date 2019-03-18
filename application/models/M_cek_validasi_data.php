<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cek_validasi_data extends CI_Model 
{
	public function tampil_data_kepolisian($url = NULL)
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

	public function uraian_pasal_dan_cerita_singkat($url = NULL)
	{
		if ($url != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_kepolisian');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
			$this->db->where(array('tbl_kepolisian.url' => $url));
			$this->db->order_by("id_data", "desc");
			return $this->db->get()->row();
		}
	}

	public function tampil_data_kejaksaan($url = NULL)
	{
		if ($url != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users');
			$this->db->where(array('tbl_kejaksaan.url' => $url));
			$this->db->order_by("id_data", "desc");	
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users');
		$this->db->order_by("id_data", "desc");	
		return $this->db->get()->result();
	}

	public function tampil_data_pengadilan($url = NULL)
	{
		if ($url != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_pengadilan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_pengadilan.id_users');
			$this->db->where(array('tbl_pengadilan.url' => $url));
			$this->db->order_by("id_data", "desc");	
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('tbl_pengadilan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_pengadilan.id_users');
		$this->db->order_by("id_data", "desc");	
		return $this->db->get()->result();
	}

	public function tampil_data_lapas($url = NULL)
	{
		if ($url != NULL) 
		{
			$this->db->select('*');
			$this->db->from('tbl_lapas');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_lapas.id_users');
			$this->db->where(array('tbl_lapas.url' => $url));
			$this->db->order_by("id_data", "desc");	
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('tbl_lapas');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_lapas.id_users');
		$this->db->order_by("id_data", "desc");	
		return $this->db->get()->result();
	}

}