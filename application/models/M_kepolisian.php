<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepolisian extends CI_Model 
{
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
	}

	public function hapus($id)
	{
		$this->db->where('id_data', $id);
		$this->db->delete('tbl_kepolisian');
	}

	public function ubah($id, $data)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', $data);
		return true;
	}

	public function ubah_deskripsi($id_data, $data)
	{
		$this->db->where('id_data', $id_data);
		$this->db->update('tbl_kepolisian', $data);
		return true;
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

	public function ubah_uraian($id, $data)
	{
		$this->db->where('id_data', $id);
		$this->db->update('tbl_kepolisian', $data);
		return true;
	}
}
