<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{

	public function data_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		// $this->db->where('id_users',$this->session->userdata('id'));	
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
		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->where('id_users_pemohon_balasan',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}

	public function apl()
	{
		$this->db->select('*');
		$this->db->from('tbl_apl');
		$this->db->where('id_users_apl',$this->session->userdata('id'));	
		return $this->db->get()->result();
	}
}