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
	function cek_coba_logout_kejaksaan()
	{
        $ci =& get_instance();
		if ($ci->session->userdata('level') =='kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}
	
	function cek_coba_logout_kepolisian()
	{
        $ci =& get_instance();
		if ($ci->session->userdata('level') =='kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	function cek_coba_logout_pengadilan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') =='pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	function cek_coba_logout_lapas()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') =='lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
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
	function kepolisian_cobamasuk_kejaksaan()    
    {
        $ci =& get_instance();
		if ($ci->session->userdata('level') == 'kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('dashboard'));
		}
	}

	function kepolisian_cobamasuk_pengadilan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	function kepolisian_cobamasuk_lapas()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	function kepolisian_cobamasuk_superadmin()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kepolisian' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}



	//kejaksaan hak akses ke user lain
	function kejaksaan_cobamasuk_kepolisian()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	function kejaksaan_cobamasuk_pengadilan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	function kejaksaan_cobamasuk_lapas()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	function kejaksaan_cobamasuk_superadmin()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'kejaksaan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}


	
	// hak asses pengadilan ke user lain
	function pengadilan_cobamasuk_kejaksaan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	function pengadilan_cobamasuk_kepolisian()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	function pengadilan_cobamasuk_lapas()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}
    
    function pengadilan_cobamasuk_superadmin()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'pengadilan' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}


	// hak akses lapas ke user lain

	function lapas_cobamasuk_kejaksaan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}

	function lapas_cobamasuk_kepolisian()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}

	function lapas_cobamasuk_pengadilan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}
    
    function lapas_cobamasuk_superadmin()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'lapas' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}


	// superadmin coba masuk ke user lain
	function superadmin_cobamasuk_kepolisian()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}


	function superadmin_cobamasuk_kejaksaan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	function superadmin_cobamasuk_pengadilan()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}


	function superadmin_cobamasuk_lapas()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	function superadmin_cobamasuk_bon()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	function superadmin_cobamasuk_apl()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	function superadmin_cobamasuk_dashboard()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			$ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	function superadmin_cobamasuk_notifikasi()
	{
        $ci =& get_instance();

		if ($ci->session->userdata('level') == 'superadmin' AND $ci->session->userdata('status') == 'logged') 
		{
			// $ci->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect('superadmin');
		}
	}