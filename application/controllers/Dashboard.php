<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		superadmin_cobamasuk_dashboard();
		$this->load->model('m_dashboard');	
		$this->load->model('m_bon');	
	}

	public function index()
	{  
		if ($this->session->userdata('level') == 'kepolisian') {
			$data['title_bon'] = 'Permintaan Bon Ke LP';
			$data['bon']   	= count($this->m_dashboard->bon());

			$data['bon_dibalas'] = 'Bon Dibalas LP ';
			$data['total_bon_dibalas']   	= count($this->m_dashboard->count_balas_bon());

			$data['title_apl'] = 'Permintaan Apl Ke LP';
			$data['apl']   	= count($this->m_dashboard->apl());

			$data['apl_dibalas'] = 'Apl Dibalas LP ';
			$data['total_apl_dibalas']   = count($this->m_dashboard->apl());

			$data['surat'] = 'Surat Dikirim';
			$data['surat_masuk_polisi'] 	= count($this->m_dashboard->count_tbl_polisi());

			$data['surat_balasan_kejaksaan'] = 'Surat Balasan Dari Kejaksaan';
			$data['surat_balasan_dari_kejaksaan'] 	= count($this->m_dashboard->data_kejaksaan());

			$data['surat_balasan_pengadilan'] = 'Surat Balasan Dari Pengadilan';
			$data['surat_balasan_dari_pengadilan'] 	= count($this->m_dashboard->data_pengadilan());
		}

		if ($this->session->userdata('level') == 'kejaksaan') {
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
			$data['total_apl_dibalas']   = count($this->m_dashboard->apl());
			
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
		}

		if ($this->session->userdata('level') == 'pengadilan') {
			$data['title_bon'] = 'Permintaan Bon Ke LP';
			$data['bon']   	= count($this->m_dashboard->bon());

			$data['bon_dibalas'] = 'Bon Dibalas LP ';
			$data['total_bon_dibalas']   	= count($this->m_dashboard->count_balas_bon());

			$data['title_apl'] = 'Permintaan Apl Ke LP';
			$data['apl']   	= count($this->m_dashboard->apl());

			$data['apl_balasan'] = 'Apl Dibalas LP ';
			$data['apl_balasan_lapas']   = count($this->m_dashboard->apl());

			$data['surat_polisi'] = 'Surat Masuk Polisi';
			$data['surat_masuk_polisi'] 	= count($this->m_dashboard->count_tbl_polisi());

			$data['surat_kejaksaan'] = 'Surat Masuk Kejaksaan';
			$data['surat_masuk_kejaksaan'] 	= count($this->m_dashboard->count_tbl_kejaksaan());

			$data['surat_balasan_ke_polisi'] = 'Surat Balasan Ke Polisi';
			$data['surat_polisi_dibalas'] 	= count($this->m_dashboard->count_balas_surat_polisi());

			$data['surat_balasan_ke_kejaksaan'] = 'Surat Balasan Ke Kejaksaan';
			$data['surat_kejaksaan_dibalas'] 	= count($this->m_dashboard->tbl_balas_surat_kejaksaan());	
		}

		if ($this->session->userdata('level') == 'lapas') {
			$data['title_bon'] = 'Bon Masuk';
			$data['title_apl'] = 'APL Masuk';
			$data['bon'] 	= count($this->m_dashboard->bon());	
			$data['apl'] 	= count($this->m_dashboard->apl());
		}
		$this->template->load('pages/template/template','pages/dashboard', $data);
	}
}