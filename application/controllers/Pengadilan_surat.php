<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan_surat extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kepolisian_cobamasuk_pengadilan();
		kejaksaan_cobamasuk_pengadilan();
		lapas_cobamasuk_pengadilan();
		superadmin_cobamasuk_pengadilan();
		$this->load->model('m_pengadilan_surat');
	}

	public function index()
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan();
        $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/content', $data);
    }

    public function detail($id_surat)
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan(base64_decode($id_surat));
        $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/detail/content', $data);
    }

}
