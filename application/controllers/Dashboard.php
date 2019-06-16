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
		$data['bon']   	= count($this->m_dashboard->bon());
		$data['apl']   	= count($this->m_dashboard->apl());
		$data['title_bon'] = 'Total Bon';
		$data['title_apl'] = 'Total APL';

		if ($this->session->userdata('level') == 'kepolisian') {
			$data['title1'] = 'Surat Balasan Kejaksaan';
			$data['title2'] = 'Surat Balasan Pengadilan';
			$data['data1'] 	= count($this->m_dashboard->data_kejaksaan());
			$data['data2'] 	= count($this->m_dashboard->data_pengadilan());
		}

		if ($this->session->userdata('level') == 'kejaksaan') {
			$data['title1'] = 'Total Surat';
			$data['title2'] = 'Surat Balasan';
			$data['data1'] 	= count($this->m_dashboard->data_polisi());
			$data['data2'] 	= count($this->m_dashboard->data_pengadilan());
		}

		if ($this->session->userdata('level') == 'pengadilan') {
			$data['title1'] = 'Surat Polisi';
			$data['title2'] = 'Surat Balasan';
			$data['data1'] 	= count($this->m_dashboard->data_polisi());
			$data['data2'] 	= count($this->m_dashboard->data_pengadilan());	
		}

		if ($this->session->userdata('level') == 'lapas') {
			$data['title1'] = 'Bon Masuk';
			$data['title2'] = 'APL Masuk';
			$data['data1'] 	= count($this->m_bon->ambil_bon());
			$data['data2'] 	= count($this->m_bon->ambil_bon());
		}
		$this->template->load('pages/template/template','pages/dashboard', $data);
	}
}