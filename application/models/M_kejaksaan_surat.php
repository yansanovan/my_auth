<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kejaksaan_surat extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'file'));
	}

	function fetch()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->limit(10);
		$this->db->where('status_kj', 0);
		$this->db->order_by("id_data", "desc");		
		return $this->db->get();
	}

	function update_notif()
	{
		$notif = 1;
		$this->db->where('notif_kj', 0);
		$this->db->update('tbl_kepolisian', array('notif_kj' => $notif));
		return true;
	}

	function fetch_2()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where("notif_kj", 0);		
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function riwayat_surat($id_surat = NULL)
	{
		if ($id_surat != NULL) {
			$this->db->select('*');
			$this->db->from('tbl_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
			$this->db->where(array('tbl_kejaksaan.id_surat' => base64_decode($id_surat)));
			return $this->db->get();
		}
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
		$this->db->where(array('tbl_kejaksaan.id_users_kejaksaan' => $this->session->userdata('id')));
		return $this->db->get()->result();
	}	
	public function simpan($data)
	{
		$this->db->insert('tbl_kejaksaan', $data);
		return true;
	}

	public function edit($id_surat, $data)
	{
		$this->db->where('id_surat', base64_decode($id_surat));
		$this->db->update('tbl_kejaksaan', $data);
		return true;
	}

	public function hapus($id_surat)
	{
		$this->db->where('id_surat', base64_decode($id_surat));
		$this->db->delete('tbl_kejaksaan');
		return true;
	}
}
