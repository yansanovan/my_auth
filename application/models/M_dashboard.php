<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
	public function count_tbl_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		if ($this->session->userdata('level') == 'kepolisian') {
			$this->db->where('id_users',$this->session->userdata('id'));	
		}
		return $this->db->get()->result();
	}

	public function count_tbl_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		if ($this->session->userdata('level') =='kejaksaan') {
		$this->db->where('id_users_kejaksaan',$this->session->userdata('id'));	
		}		
		return $this->db->get()->result();
	}

	public function count_balas_surat_polisi()
	{
		$this->db->select('*');
		if($this->session->userdata('level') == 'kejaksaan') 
		{
			$this->db->from('tbl_balas_kejaksaan');
			$this->db->where('id_users_kj',$this->session->userdata('id'));	
		}
		if($this->session->userdata('level') == 'pengadilan') 
		{
			$this->db->from('tbl_balas_pengadilan');
			$this->db->where('id_users_pn', $this->session->userdata('id'));	
		}
		return $this->db->get()->result();
	}

	public function tbl_balas_surat_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_surat_kejaksaan');
		if ($this->session->userdata('level') == 'pengadilan') {
			$this->db->where('id_users_pengadilan',$this->session->userdata('id'));	
		}
		else
		{
			$this->db->where('id_users_kejaksaan_balas',$this->session->userdata('id'));	
		}
		return $this->db->get()->result();
	}

	public function data_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_kejaksaan');
		$this->db->where('id_polisi_kj',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}

	public function data_pengadilan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_pengadilan');
		$this->db->where('id_polisi_pn',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}

	public function bon()
	{
		if ($this->session->userdata('level') == 'lapas') {
			$this->db->select('*');
			$this->db->from('tbl_bon');
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->where('id_users_pemohon',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}

	public function count_balas_bon()
	{
		if ($this->session->userdata('level') == 'lapas') 
		{
			$this->db->select('*');
			$this->db->from('tbl_balas_bon');
			$this->db->where('id_users_lapas',$this->session->userdata('id'));	
			return $this->db->get()->result();
		}

		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->where('id_users_pemohon_balasan',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}
	public function apl()
	{
		if ($this->session->userdata('level') == 'lapas') {
			$this->db->select('*');
			$this->db->from('tbl_apl');
			return $this->db->get()->result();
		}		
		$this->db->select('*');
		$this->db->from('tbl_apl');
		$this->db->where('id_users_apl',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}
	public function count_balas_apl()
	{
		if ($this->session->userdata('level') =='lapas') {
			$this->db->select('*');
			$this->db->from('tbl_balas_apl');
			$this->db->where('id_users_lapas', $this->session->userdata('id'));	
			return $this->db->get()->result();
		}

		$this->db->select('*');
		$this->db->from('tbl_balas_apl');
		$this->db->where('id_users_pemohon', $this->session->userdata('id'));	
		return $this->db->get()->result();
	}
}