<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	// semua user menjadi login lewat url
	public function cek_coba_loggin()
	{

		if($this->session->userdata('level') !='kejaksaan' AND $this->session->userdata('status') != 'logged') 
		{

			$this->session->set_flashdata('akses_dilarang', '<div class="alert alert-danger" role="alert">Maaf Harus Login dulu</div>');
			redirect('auth');
		}
		else if($this->session->userdata('level') !='kepolian' AND $this->session->userdata('status') != 'logged') 
		{

			$this->session->set_flashdata('akses_dilarang', '<div class="alert alert-danger" role="alert">Maaf Harus Login dulu</div>');
			redirect('auth');
		}
		else if($this->session->userdata('level') !='lapas' AND $this->session->userdata('status') != 'logged') 
		{

			$this->session->set_flashdata('akses_dilarang', '<div class="alert alert-danger" role="alert">Maaf Harus Login dulu</div>');
			redirect('auth');
		}
		else if($this->session->userdata('level') !='superadmin' AND $this->session->userdata('status') != 'logged') 
		{
			$this->session->set_flashdata('akses_dilarang', '<div class="alert alert-danger" role="alert">Maaf Harus Login dulu</div>');
			redirect('auth');
		}
	}

	// semua users mencoba ke authentication
	public function cek_coba_logout_kejaksaan()
	{
		if ($this->session->userdata('level') =='kejaksaan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}
	
	public function cek_coba_logout_kepolisian()
	{
		if ($this->session->userdata('level') =='kepolisian' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	public function cek_coba_logout_pengadilan()
	{
		if ($this->session->userdata('level') =='pengadilan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	public function cek_coba_logout_lapas()
	{
		if ($this->session->userdata('level') =='lapas' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}
	
	public function cek_coba_logout_superadmin()
	{
		if ($this->session->userdata('level') =='superadmin' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}
	
	//kepolisian hak akses ke user lain
	public function kepolisian_cobamasuk_kejaksaan()
	{
		if ($this->session->userdata('level') == 'kepolisian' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	public function kepolisian_cobamasuk_pengadilan()
	{
		if ($this->session->userdata('level') == 'kepolisian' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	public function kepolisian_cobamasuk_lapas()
	{
		if ($this->session->userdata('level') == 'kepolisian' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}

	public function kepolisian_cobamasuk_superadmin()
	{
		if ($this->session->userdata('level') == 'kepolisian' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kepolisian'));
		}
	}



	//kejaksaan hak akses ke user lain
	public function kejaksaan_cobamasuk_kepolisian()
	{
		if ($this->session->userdata('level') == 'kejaksaan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	public function kejaksaan_cobamasuk_pengadilan()
	{
		if ($this->session->userdata('level') == 'kejaksaan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	public function kejaksaan_cobamasuk_lapas()
	{
		if ($this->session->userdata('level') == 'kejaksaan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}

	public function kejaksaan_cobamasuk_superadmin()
	{
		if ($this->session->userdata('level') == 'kejaksaan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('kejaksaan'));
		}
	}


	
	// hak asses pengadilan ke user lain
	public function pengadilan_cobamasuk_kejaksaan()
	{
		if ($this->session->userdata('level') == 'pengadilan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	public function pengadilan_cobamasuk_kepolisian()
	{
		if ($this->session->userdata('level') == 'pengadilan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}

	public function pengadilan_cobamasuk_lapas()
	{
		if ($this->session->userdata('level') == 'pengadilan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}
	public function pengadilan_cobamasuk_superadmin()
	{
		if ($this->session->userdata('level') == 'pengadilan' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('pengadilan'));
		}
	}


	// hak akses lapas ke user lain

	public function lapas_cobamasuk_kejaksaan()
	{
		if ($this->session->userdata('level') == 'lapas' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}

	public function lapas_cobamasuk_kepolisian()
	{
		if ($this->session->userdata('level') == 'lapas' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}

	public function lapas_cobamasuk_pengadilan()
	{
		if ($this->session->userdata('level') == 'lapas' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}
	public function lapas_cobamasuk_superadmin()
	{
		if ($this->session->userdata('level') == 'lapas' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('lapas'));
		}
	}


	// superadmin coba masuk ke user lain
	public function superadmin_cobamasuk_kepolisian()
	{
		if ($this->session->userdata('level') == 'superadmin' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}


	public function superadmin_cobamasuk_kejaksaan()
	{
		if ($this->session->userdata('level') == 'superadmin' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}

	public function superadmin_cobamasuk_pengadilan()
	{
		if ($this->session->userdata('level') == 'superadmin' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}


	public function superadmin_cobamasuk_lapas()
	{
		if ($this->session->userdata('level') == 'superadmin' AND $this->session->userdata('status') == 'logged') 
		{
			$this->session->set_flashdata('harus_keluar','<div class="alert alert-danger" role="alert">Harus Logout</div>');
			redirect(base_url('superadmin'));
		}
	}
}
