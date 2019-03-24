<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepolisian extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'file'));
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
		$this->db->insert('tbl_kepolisian', $data);
		if ($this->db->affected_rows() > 0 ) 
		{
			// cache dari kepolisian yang ditampilan di kejaksaan, dihapus jika kepolisian create data 
			$this->cache->delete('kepolisian');
			
			return true;
		}
	}

	public function hapus($id, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->delete('tbl_kepolisian');

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('kepolisian');

			$this->cache->delete('detail_kepolisian_'.$url);
			return true;
		}
	}

	public function ubah($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', $data);


		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('detail_kepolisian_'.$url);
			return true;
		}
	}

	public function ubah_deskripsi($id_data, $data, $url)
	{
		$this->db->where('id_data', $id_data);
		$this->db->update('tbl_kepolisian', $data);

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('kepolisian');

			//untuk ganti deskripsi, jika kepolisian update deskripsi, maka hapus cache semua dulu
			$this->cache->delete('detail_kepolisian_'.$url);
		
			return true;
		}
	}

	public function unduh($id)
	{
		$this->db->where('id_data', $id);
		return $this->db->get('tbl_kejaksaan')->row();
	}

	public function lihat_detail_jadwal($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
		$this->db->where(array('tbl_kepolisian.url' => $url));
		return $this->db->get()->result();
	}

	public function uraian_dan_cerita($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where(array('tbl_kepolisian.url' => $url));
		return $this->db->get()->row();
	}

	public function ubah_uraian_pasal_dan_cerita_singkat($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', $data);
		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('detail_kepolisian_'.$url);
			return true;
		}
	}
}
