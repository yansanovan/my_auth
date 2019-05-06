<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kejaksaan extends CI_Model 
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
		// $this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function tampil($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->db->where('id_data', $id);
			return $this->db->get('tbl_kejaksaan')->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users');
		$this->db->where(array('tbl_kejaksaan.id_users' => $this->session->userdata('id')));
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function lihat_detail_jadwal($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users');
		$this->db->where(array('tbl_kejaksaan.url' => $url));
		return $this->db->get()->result();
	}

	
	public function simpan($data)
	{
		$this->db->set('tanggal_posting', 'NOW()', FALSE);
		$this->db->insert('tbl_kejaksaan', $data);
		
		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('kejaksaan');

			return true;
		}

	}

	public function save($data)
	{
		// $this->db->set('tanggal_posting', 'NOW()', FALSE);
		$this->db->insert('tbl_balas', $data);
		return true;

	}

	public function ubah($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kejaksaan', $data);

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('detail_kejaksaan_'.$url);
			return true;
		}
	}

	public function ubah_deskripsi($id_data, $data, $url)
	{

		$this->db->where('id_data', $id_data);
		$this->db->update('tbl_kejaksaan', $data);
		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('kejaksaan');

			//delete detail cache kejaksaan
			$this->cache->delete('detail_kejaksaan_'.$url);
			return true;
		}
	}
	
	public function hapus($id, $url)
	{
		$this->load->driver('cache', array('adapter' => 'file'));

		$this->db->where('id_data', $id);
		$this->db->delete('tbl_kejaksaan');
		if ($this->db->affected_rows() > 0) 
		{
			$this->cache->delete('kejaksaan');

			//delete detail cache kejaksaan
			$this->cache->delete('detail_kejaksaan_'.$url);

			return true;
		}
	}

	public function unduh($id)
	{
		$this->db->where('id_data', $id);
		return $this->db->get('tbl_kepolisian')->row();
	}

	public function ambil_tuntutan_dan_dakwaan($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->where(array('tbl_kejaksaan.url' => $url));
		return $this->db->get()->row();
	}

	public function ubah_tuntutan_dan_dakwaan($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kejaksaan', $data);
		if ($this->db->affected_rows() > 0) 
		{
			//delete detail cache kejaksaan
			$this->cache->delete('detail_kejaksaan_'.$url);

			return true;
		}
	}
}
