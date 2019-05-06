<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepolisian extends CI_Model 
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
		$this->db->join('tbl_balas_kejaksaan','tbl_balas_kejaksaan.id_surat_kj =  tbl_kepolisian.id_data', 'LEFT');
		$this->db->join('tbl_balas_pengadilan','tbl_balas_pengadilan.id_surat_pn =  tbl_kepolisian.id_data','LEFT');
		$this->db->where("status_kj", 1);
		$this->db->or_where("status_pn", 1);
		$this->db->order_by("id_data", "desc");		
		$this->db->limit(5);		
		return $this->db->get();
	}

	function update_notif()
	{
		$notif = 1;
		$this->db->where('notif_balas_kj', 0);
		$this->db->update('tbl_balas_kejaksaan', array('notif_balas_kj' => $notif));

		$this->db->where('notif_balas_pn', 0);
		$this->db->update('tbl_balas_pengadilan', array('notif_balas_pn' => $notif));
		return true;
	}

	function fetch_2()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_balas_kejaksaan','tbl_balas_kejaksaan.id_surat_kj =  tbl_kepolisian.id_data', 'LEFT');
		$this->db->join('tbl_balas_pengadilan','tbl_balas_pengadilan.id_surat_pn =  tbl_kepolisian.id_data','LEFT');
		$this->db->where("notif_balas_kj", 0);
		$this->db->or_where("notif_balas_pn", 0);
		$this->db->order_by("id_data", "desc");		
		$this->db->limit(5);
		return $this->db->get()->result();
	}

	public function tampil($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->where('id_data', $id);
			return $this->db->get('tbl_kepolisian')->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
		$this->db->where(array('tbl_kepolisian.id_users' => $this->session->userdata('id')));
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function cek_id($id)
	{
		$this->db->where('id_data', $id);
		$query = $this->db->get('tbl_kepolisian');
		return $query;
	}

	public function simpan($data)
	{
		$this->db->set('tanggal_posting', 'NOW()', FALSE);
		$this->db->insert('tbl_kepolisian', $data);
		if ($this->db->affected_rows() > 0 ) 
		{
			return true;
		}
	}

	public function hapus($id)
	{
		$this->db->where('id_data', $id);
		$this->db->delete('tbl_kepolisian');
		return true;
	}

	public function ubah($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', $data);
	}


	public function unduh($id)
	{
		$this->db->where('id_data', $id);
		return $this->db->get('tbl_kejaksaan')->row();
	}

	public function detail($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where(array('url' => $url));
		return $this->db->get()->result();

	}
}
