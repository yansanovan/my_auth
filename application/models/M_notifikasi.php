<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model 
{

	function notifikasi_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_notification','tbl_notification.id_surat_balasan =  tbl_kepolisian.id_data', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_notification.id_users_pembalas', 'LEFT');
		$this->db->where("id_polisi", $this->session->userdata('id'));
		$this->db->limit(5);
		$this->db->order_by("tanggal_balas", "desc");	
		return $this->db->get();
	}

	function update_notif_polisi()
	{
		$this->db->where('id_polisi', $this->session->userdata('id'));
		$this->db->update('tbl_notification', array('notif_balasan' => 1));
		return true;
	}

	function hitung_nofikasi_balasan_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_notification');
		$this->db->where("notif_balasan", 0);	
		$this->db->where(array('id_polisi' => $this->session->userdata('id')));	
		return $this->db->get()->result();
	}

	// Notifikasi Kejaksaan
	function notifikasi_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->limit(5);
		$this->db->where('status_kj', 0);
		$this->db->order_by("id_data", "desc");		
		return $this->db->get();
	}

	function update_notif_kejakaan()
	{
		$notif = 1;
		$this->db->where('notif_kj', 0);
		$this->db->update('tbl_kepolisian', array('notif_kj' => $notif));
		return true;
	}

	function hitung_nofikasi_masuk_dari_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where("notif_kj", 0);		
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}

		// Notifikasi Kejaksaan surat balasan
	function notifikasi_surat_pn_ke_kj()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_balas_kejaksaan');
		$this->db->join('tbl_kejaksaan','tbl_kejaksaan.id_surat =  tbl_surat_balas_kejaksaan.id_balas', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_surat_balas_kejaksaan.id_users_pengadilan', 'LEFT');
		$this->db->limit(5);
		$this->db->order_by("id_balas", "desc");		
		return $this->db->get();
	}

	function update_notifikasi_surat_pn_ke_kj()
	{
		$notif = 1;
		$this->db->where('notif_kj', 0);
		$this->db->update('tbl_kepolisian', array('notif_kj' => $notif));
		return true;
	}

	function hitung_notifikasi_surat_pn_ke_kj()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_balas_kejaksaan');
		$this->db->where("notif_surat_kejaksaan_balasa", 0);		
		$this->db->order_by("id_balas", "desc");		
		return $this->db->get()->result();
	}

	// pengadilan
	function notifikasi_pengadilan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->limit(5);
		$this->db->where('status_pn', 0);
		$this->db->order_by("id_data", "desc");		
		return $this->db->get();
	}

	function update_notif_pengadilan()
	{
		$notif = 1;
		$this->db->where('notif_pn', 0);
		$this->db->update('tbl_kepolisian', array('notif_pn' => $notif));
		return true;
	}

	function hitung_nofikasi_masuk_dari_polisi_ke_pn()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where("notif_pn", 0);			
		return $this->db->get()->result();
	}

	// lapas
	function notif_bon_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->join('tbl_users','tbl_users.id = tbl_bon.id_users_pemohon', 'LEFT');
		$this->db->limit(5);
		$this->db->where('status_balas', 0);
		$this->db->order_by("id_bon", "desc");		
		return $this->db->get();
	}
	function update_notif_bon_lapas()
	{
		$this->db->where('notif_status', 0);
		$this->db->update('tbl_bon', array('notif_status' => 1));
		return true;
	}
	function hitung_notif_bon_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->where("notif_status", 0);		
		$this->db->order_by("id_bon", "desc");		
		return $this->db->get()->result();
	}

	// Bon balasan 
	function notif_bon_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->join('tbl_bon','tbl_bon.id_bon =  tbl_balas_bon.id_bon_balasan', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_bon.id_users_lapas', 'LEFT');
		$this->db->limit(5);
		$this->db->where("notif_bon_balasan", 1);
		$this->db->where("id_users_pemohon_balasan", $this->session->userdata('id'));
		$this->db->order_by("tanggal_balas_bon", "desc");		
		return $this->db->get();
	}

	function update_notif_bon_balasan()
	{
		$this->db->where('id_users_pemohon_balasan', $this->session->userdata('id'));
		$this->db->update('tbl_balas_bon', array('notif_bon_balasan' => 1));
		return true;
	}

	function hitung_notif_bon_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->where("notif_bon_balasan", 0);
		$this->db->where('id_users_pemohon_balasan', $this->session->userdata('id'));		
		$this->db->order_by("id", "desc");		
		return $this->db->get()->result();
	}
}