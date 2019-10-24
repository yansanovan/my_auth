<?php defined('BASEPATH') OR exit('No direct script access allowed');

    function check_is_logged()
	{
        $ci =& get_instance();
		$ci->load->model('m_pesan');

		if($ci->session->userdata('level') !='kejaksaan' AND $ci->session->userdata('status') != 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus login!');
			redirect('auth');
		}
		else if($ci->session->userdata('level') !='kepolisian' AND $ci->session->userdata('status') != 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus login!');
			redirect('auth');
		}
		else if($ci->session->userdata('level') !='lapas' AND $ci->session->userdata('status') != 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus login!');
			redirect('auth');
		}
		else if($ci->session->userdata('level') !='superadmin' AND $ci->session->userdata('status') != 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus login!');
			redirect('auth');
		}
	}

	// semua users mencoba ke authentication
	function coba_logout()
	{
        $ci =& get_instance();
		if ($ci->session->userdata('status') == 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus logout!');
			
			redirect('dashboard');
		}
	}

	function cek_coba_logout_superadmin()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') =='superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}
		
	//kepolisian hak akses ke user lain
	function kepolisian_coba_masuk()    
    {
        $ci =& get_instance();
		if ($ci->session->userdata('level') == 'kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus logout!');
			redirect('dashboard');
		}
	}

	//kejaksaan hak akses ke user lain
	function kejaksaan_coba_masuk()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus logout!');
			redirect('dashboard');
		}
	}
	
	// hak asses pengadilan ke user lain
	function pengadilan_coba_masuk()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus logout!');
			redirect('dashboard');
		}
	}

	function lapas_coba_masuk()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->m_pesan->generatePesan('akses_dilarang', 'Maaf harus logout!');
			redirect('dashboard');
		}
	}

	// superadmin coba masuk ke user lain
	function superadmin_coba_masuk()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('akses_dilarang','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect('superadmin');
		}
	}
	
	function superadmin_cobamasuk_notifikasi()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			redirect('superadmin');
		}
	}