<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_session_police();
	}

	public function index()
	{  
		$data['title_bon'] = 'Permintaan Bon Ke LP';
		$data['bon']   	= count($this->m_dashboard->bon());

		$data['bon_dibalas'] = 'Bon Dibalas LP ';
		$data['total_bon_dibalas'] = count($this->m_dashboard->count_balas_bon());

		$data['title_apl'] = 'Permintaan Apl Ke LP';
		$data['apl'] = count($this->m_dashboard->apl());

		$data['apl_dibalas'] = 'Apl Dibalas LP ';
		$data['total_apl_dibalas'] = count($this->m_dashboard->count_balas_apl());

		$data['surat'] = 'Surat Dikirim';
		$data['surat_masuk_polisi'] = count($this->m_dashboard->count_tbl_polisi());

		$data['surat_balasan_kejaksaan'] = 'Surat Balasan Dari Kejaksaan';
		$data['surat_balasan_dari_kejaksaan'] = count($this->m_dashboard->data_kejaksaan());

		$data['surat_balasan_pengadilan'] = 'Surat Balasan Dari Pengadilan';
		$data['surat_balasan_dari_pengadilan'] 	= count($this->m_dashboard->data_pengadilan());
		$data['last_login'] = $this->db->get_where('tbl_users', array('id' => $this->session->userdata('id')))->row();
		$this->template->load('pages/template/template','pages/police/dashboard/content', $data);
	}
}