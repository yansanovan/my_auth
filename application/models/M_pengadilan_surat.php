<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadilan_surat extends CI_Model 
{
	public function surat_kejaksaan($id_surat = NULL)
	{
		if ($id_surat != NULL) {
			$this->db->select('*');
			$this->db->from('tbl_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
			$this->db->where(array('tbl_kejaksaan.id_surat' => $id_surat));
			return $this->db->get()->row();
		}
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
		return $this->db->get()->result();
	}	
}
