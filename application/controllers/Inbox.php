<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends MY_Validate
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
        kepolisian_coba_masuk();
        pengadilan_coba_masuk();
        lapas_coba_masuk();
        superadmin_coba_masuk();        
	}

	public function index()
	{
        $this->template->load('pages/template/template','pages/kejaksaan/inbox/content');    
	}
	public function spdp_inbox()
	{
		$data['data'] = $this->db->get('tbl_police')->result();
        $this->template->load('pages/template/template','pages/kejaksaan/inbox/spdp/content', $data);    
	}
}

