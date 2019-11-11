<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_session_prosecutor();
	}

	public function index()
	{  
		if ($this->session->userdata('level') == 'kejaksaan') 
		{
			// BON
			$data['title_bon'] = 'Permintaan Bon ke LP';
			$data['bon']   	= count($this->m_dashboard->bon());

			// Bon Balasan dari LP
			$data['bon_dibalas'] = 'Bon Dibalas LP ';
			$data['total_bon_dibalas']   	= count($this->m_dashboard->count_balas_bon());
			
			// APL
			$data['title_apl'] = 'Permintaan Apl ke LP';
			$data['apl']   	= count($this->m_dashboard->apl());

			// APL Balasan LP
			$data['apl_dibalas'] = 'Apl Dibalas LP ';
			$data['total_apl_dibalas']   = count($this->m_dashboard->count_balas_apl());
			
			// Surat Masuk Dari Polisi
			$data['surat_polisi'] = 'Surat Masuk Polisi';
			$data['surat_masuk_polisi'] 	= count($this->m_dashboard->count_tbl_polisi());
			
			// Surat Balasan Ke Polisi
			$data['surat_balasan_ke_polisi'] = 'Surat Balasan Ke Polisi';
			$data['surat_polisi_dibalas'] 	= count($this->m_dashboard->count_balas_surat_polisi());
			
			// Surat Dikirim Ke pengadilan
			$data['surat_ke_pengadilan'] = 'Surat Dikirim Ke Pengadilan';
			$data['surat_kirim_ke_pengadilan'] 	= count($this->m_dashboard->count_tbl_kejaksaan());	
			
			// Surat Balasan Dari Pengadilan
			$data['surat_balasan_pengadilan'] = 'Surat Balasan Dari Pengadilan';
			$data['surat_balasan_masuk_pengadilan'] 	= count($this->m_dashboard->tbl_balas_surat_kejaksaan());
			$data['last_login'] = $this->db->get_where('tbl_users', array('id' => $this->session->userdata('id')))->row();
			$this->template->load('pages/template/template','pages/dashboard/kejaksaan/content', $data);
		}
	}
}