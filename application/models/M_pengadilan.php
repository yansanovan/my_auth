<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadilan extends CI_Model 
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
			return $this->db->get('tbl_pengadilan')->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_pengadilan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_pengadilan.id_users');
		$this->db->where(array('tbl_pengadilan.id_users' => $this->session->userdata('id')));
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function cek_id($id)
	{
		$this->db->where('id_data', $id);
		$query = $this->db->get('tbl_pengadilan');
		return $query;
	}

	public function tampil_data_kepolisian()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kepolisian.id_users');
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function tampil_data_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users');
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

	public function simpan($data)
	{	
		$this->db->set('tanggal_posting', 'NOW()', FALSE);
		$this->db->insert('tbl_pengadilan', $data);

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('pengadilan');
			
			return true;
		}
	}

	public function hapus($id, $url)
	{

		$this->db->where('id_data', $id);
		$this->db->delete('tbl_pengadilan');

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('pengadilan');

			// delete cache detail pengadilan
			$this->cache->delete('detail_pengadilan_'.$url);

			return true;
		}
	}

	public function lihat_detail_jadwal($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengadilan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_pengadilan.id_users');
		$this->db->where(array('tbl_pengadilan.url' => $url));
		return $this->db->get()->result();
	}

	public function ubah($id, $data, $url)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_pengadilan', $data);

		if ($this->db->affected_rows() > 0 ) 
		{
			// delete cache detail pengadilan
			$this->cache->delete('detail_pengadilan_'.$url);
			return true;
		}
	}

	public function ubah_deskripsi($id_data, $data, $url)
	{	
		$this->db->where('id_data', $id_data);
		$this->db->update('tbl_pengadilan', $data);
		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('pengadilan');

			$this->cache->delete('detail_pengadilan_'.$url);

			return true;
		}
	}



	public function unduh($id)
	{
		$this->db->where('id_data', $id);
		return $this->db->get('tbl_kepolisian')->row();
	}

	public function ambil_uraian_pokok_dan_putusan_amar($url)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengadilan');
		$this->db->where(array('tbl_pengadilan.url' => $url));
		return $this->db->get()->row();
	}

	public function ubah_uraian_pokok_dan_putusan_amar($id, $data, $url)
	{
		$this->db->where('id_data', $id);
	    $this->db->update('tbl_pengadilan', $data);

		if ($this->db->affected_rows() > 0 ) 
		{
			$this->cache->delete('detail_pengadilan_'.$url);
			return true;
		}
	}
}
