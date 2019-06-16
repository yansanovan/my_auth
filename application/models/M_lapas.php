<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapas extends CI_Model 
{

	public function bon($id = NULL)
	{
		if ($id != NULL) {
			$result = $this->db->get_where('tbl_balas_bon', array('id_bon_balasan' => $id ));
			return $result->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_bon.id_users_pemohon');
		$this->db->order_by("id_bon", "desc");	
		return $this->db->get()->result();
	}

	public function balas_bon($data, $id)
	{
		$this->db->set('tanggal_balas_bon', 'NOW()', FALSE);
		$balas = $this->db->insert('tbl_balas_bon', $data);

		if ($balas) 
		{
			$this->db->where('id_bon', base64_decode($id));
			$this->db->update('tbl_bon', array('status_balas' => 1));
		}
		return true;
	}

	public function edit_balas_bon($id)
	{
		$this->db->set('file_pengajuan_bon', $file_pengajuan_bon);
        @unlink('./uploads/lapas/bon/'. $post['old_bon_balasan']);
		$this->db->where('id_bon_balasan', $id);
		$this->db->update('tbl_balas_bon');
		return true;
	}

	public function riwayat_balas_bon()
	{
		$this->db->select('tbl_balas_bon.*, tbl_bon.nama_tersangka as nama_tersangka, tbl_bon.keterangan as keterangan, tbl_users.username as username, tbl_users.level as level ');
		$this->db->from('tbl_balas_bon');
		$this->db->join('tbl_bon', 'tbl_bon.id_bon = tbl_balas_bon.id_bon_balasan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_bon.id_users_pemohon');
		$this->db->where('id_users_lapas', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function cek_balas($id = NULL)
	{
		if($id != NULL){
			$this->db->select('tbl_balas_bon.*, tbl_bon.nama_tersangka as nama_tersangka, tbl_bon.keterangan as keterangan, tbl_users.username as username, tbl_users.level as level');
			$this->db->from('tbl_balas_bon');
			$this->db->join('tbl_bon', 'tbl_bon.id_bon = tbl_balas_bon.id_bon_balasan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_bon.id_users_pemohon');
			$this->db->where('id_bon_balasan', $id);
			return $this->db->get();
		}
		$this->db->where('id_bon_balasan', $id);
		$query = $this->db->get('tbl_balas_bon');
		return $query;
	}
	
	public function cek_id($id)
	{
		$this->db->where('id_bon', $id);
		$this->db->join('tbl_users', 'tbl_users.id = tbl_bon.id_users_pemohon');
		$query = $this->db->get('tbl_bon');
		return $query;
	}

	public function hapus_bon_balas($id)
	{
		$this->db->where('id_bon_balasan', $id);
		$this->db->delete('tbl_balas_bon');

		$this->db->where('id_bon', $id);
		$this->db->update('tbl_bon', array('status_balas' => 0));

		return true;
	}

}
