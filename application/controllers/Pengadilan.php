<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kepolisian_cobamasuk_pengadilan();
		$this->kejaksaan_cobamasuk_pengadilan();
		$this->lapas_cobamasuk_pengadilan();
		$this->superadmin_cobamasuk_pengadilan();
		$this->load->helper('file');
		$this->load->model('m_pengadilan');
		$this->load->model('m_cek_validasi_data');
		$this->output->enable_profiler(TRUE);
		
	}
	public function index()
	{
		$this->load->driver('cache', array('adapter' => 'file'));

		$cacheKepolisian = 'kepolisian';

		if (!$data['kepolisian']  = $this->cache->get($cacheKepolisian))
		{
			$data['kepolisian'] = $this->m_cek_validasi_data->tampil_data_kepolisian();
	        $this->cache->save($cacheKepolisian, $data['kepolisian'], 300);
		}

		$cacheKejaksaan = 'kejaksaan'; 
		
		if (!$data['kejaksaan']  = $this->cache->get($cacheKejaksaan))
		{
			$data['kejaksaan']  = $this->m_cek_validasi_data->tampil_data_kejaksaan();
	        $this->cache->save($cacheKejaksaan, $data['kejaksaan'], 300);
		}

		$cacheLapas = 'lapas';

		if (!$data['lapas'] = $this->cache->get($cacheLapas))
		{
			$data['lapas'] 		= $this->m_cek_validasi_data->tampil_data_lapas();
	        $this->cache->save($cacheLapas, $data['lapas'], 300);	
		}
		
		$data['data_kepolisian'] = count($data['kepolisian']);
		$data['data_kejaksaan']  = count($data['kejaksaan']);
		$data['data_lapas'] 	 = count($data['lapas']);

		$this->load->view('pages/pengadilan/daftar_jadwal/index', $data);
	}
	
	public function detail_kepolisian($url)
	{
		$detail_kepolisian = 'detail_kepolisian_'.$url;
		if (!$data['data'] 	= $this->cache->get($detail_kepolisian)) 
		{
			$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kepolisian($url);	
			$this->cache->save($detail_kepolisian, $data['data'], 300);	
		}
		$this->load->view('pages/pengadilan/daftar_jadwal/detail_kepolisian/index', $data);
	}

	public function detail_kejaksaan($url)
	{
		$detail_kejaksaan = 'detail_kejaksaan_'.$url;
		if (!$data['data'] 	= $this->cache->get($detail_kejaksaan)) 
		{
			$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kejaksaan($url);	
			$this->cache->save($detail_kejaksaan, $data['data'], 300);	
		}
		$this->load->view('pages/pengadilan/daftar_jadwal/detail_kejaksaan/index', $data);
	}

	public function detail_lapas($url)
	{
		$detail_lapas = 'detail_lapas_'.$url;
		if (!$data['data'] 	= $this->cache->get($detail_lapas)) 
		{
			$data['data'] 	= $this->m_cek_validasi_data->tampil_data_lapas($url);	
			$this->cache->save($detail_lapas, $data['data'], 300);	
		}
		$this->load->view('pages/pengadilan/daftar_jadwal/detail_lapas/index', $data);
	}


	public function data_jadwal()
	{
		$data['data'] = $this->m_pengadilan->tampil();
		$this->load->view('pages/pengadilan/data_jadwal/index', $data);
	}

	public function lihat_detail_jadwal($url)
    {
    	$data['data'] = $this->m_pengadilan->lihat_detail_jadwal($url);
		$this->load->view('pages/pengadilan/data_jadwal/detail_jadwal/index', $data);
    }

    public function uraian_pokok($url)
	{
    	$data['data'] = $this->m_pengadilan->ambil_uraian_pokok_dan_putusan_amar($url);
		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/uraian_pokok/index', $data);
	}


	public function ubah_uraian_pokok($url)
	{
    	$this->form_validation->set_rules('uraian_pokok', 'uraian pokok', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->uraian_pokok($url);		
		}
		else
		{
			$id_data 		= $this->input->post('id_data');
			$uraian_pokok   = $this->input->post('uraian_pokok');
			$data 			= array('uraian_pokok' =>  $uraian_pokok);
			$success = $this->m_pengadilan->ubah_uraian_pokok_dan_putusan_amar($id_data, $data, $url);

			$this->session->set_flashdata('uraian_pokok', '<div class="alert alert-success" role="alert">uraian pokok dirubah</div>');	
			$this->uraian_pokok($url);	
		}
	}


	public function putusan_amar($url)
	{
    	$data['data'] = $this->m_pengadilan->ambil_uraian_pokok_dan_putusan_amar($url);
		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/putusan_amar/index', $data);
	}

	public function ubah_putusan_amar($url)
	{
    $this->form_validation->set_rules('putusan_amar', 'putusan amar', 'required');
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->putusan_amar($url);		
		}
		else
		{
			$id_data 		= $this->input->post('id_data');
			$putusan_amar 	= $this->input->post('putusan_amar');
			$data 			= array('putusan_amar' =>  $putusan_amar);
			$success = $this->m_pengadilan->ubah_uraian_pokok_dan_putusan_amar($id_data, $data, $url);
			
		
			$this->session->set_flashdata('putusan_amar', '<div class="alert alert-success" role="alert">putuasan amar dirubah</div>');	
			$this->putusan_amar($url);	
		
		}
	}


    public function tambah_jadwal()
	{
		// cek data kepolisian & kejaksaan
		$kepolisian = $this->m_pengadilan->tampil_data_kepolisian();
		$kejaksaan 	= $this->m_pengadilan->tampil_data_kejaksaan();
		$jumlah_kepolisian = count($kepolisian);
		$jumlah_kejaksaan  = count($kejaksaan);

		if ($jumlah_kejaksaan == 0) 
		{
			redirect('pengadilan/data_kosong');
		}
		elseif ($jumlah_kepolisian == 0) 
		{
			redirect('pengadilan/data_kosong');
		}
		else
		{

			foreach ($kepolisian as $key => $data) 
			{	
				if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_penangkapan == NULL || $data->file_ijin_sita == NULL || $data->file_ijin_geledah == NULL || $data->file_pelimpahan == NULL || $data->file_penahanan == NULL || $data->file_perpanjang_penahanan == NULL || $data->tanggal_penangkapan == 0000-00-00 || $data->tanggal_ijin_sita == 0000-00-00 || $data->tanggal_ijin_geledah == 0000-00-00 || $data->tanggal_pelimpahan == 0000-00-00 || $data->tanggal_penahanan == 0000-00-00 || $data->tanggal_perpanjang_penahanan == 0000-00-00 ) 
				{
					redirect('pengadilan/data_kosong');
				}
			}

			foreach ($kejaksaan as $key => $data) 
			{	
				if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_pelimpahan_berkas == NULL || $data->file_tahap_I == NULL || $data->file_tahap_II == NULL || $data->file_pelimpahan == NULL || $data->file_penahanan == NULL || $data->file_perpanjang_penahanan == NULL || $data->file_eksekusi_putusan == NULL || $data->tanggal_pelimpahan_berkas == 0000-00-00 || $data->tanggal_tahap_I == 0000-00-00 || $data->tanggal_tahap_II == 0000-00-00 || $data->tanggal_pelimpahan == 0000-00-00 || $data->tanggal_perpanjang_penahanan == 0000-00-00 || $data->tanggal_eksekusi_putusan == 0000-00-00 ) 
				{
					redirect('pengadilan/data_kosong');
				}
			}
			$this->load->view('pages/pengadilan/tambah_jadwal/index');
		}

	}

	public function data_kosong()
	{
	
		$this->load->view('pages/template/header');	
		$this->load->view('pages/template/sidebar');			
		$this->load->view('pages/akses_crud/akses_crud');
		$this->load->view('pages/template/footer');		
	}

	public function data_kejaksaan_kosong()
	{
		$this->load->view('pages/template/header');	
		$this->load->view('pages/template/sidebar');			
		$this->load->view('pages/tidak_bisa_akses_kejaksaan');
		$this->load->view('pages/template/footer');		
	}

	public function simpan()
	{
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('uraian_pokok', 'uraian pokok', 'required');
		$this->form_validation->set_rules('putusan_amar', 'putusan amar', 'required');
		$this->form_validation->set_rules('file_pelimpahan_berkas', '', 'callback_file_pelimpahan_berkas');
		$this->form_validation->set_rules('file_penetapan_hari_sidang', '', 'callback_file_penetapan_hari_sidang');
		$this->form_validation->set_rules('file_penahanan', '', 'callback_file_penahanan');
		$this->form_validation->set_rules('file_perpanjang_penahanan_I', '', 'callback_file_perpanjang_penahanan_I');
		$this->form_validation->set_rules('file_perpanjang_penahanan_II', '', 'callback_file_perpanjang_penahanan_II');
		$this->form_validation->set_rules('file_perpanjang_penahanan_III', '', 'callback_file_perpanjang_penahanan_III');
		$this->form_validation->set_rules('file_putusan', '', 'callback_file_putusan');


		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			return $this->tambah_jadwal();
			$this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" role="alert">Gagal di simpan!</div>');
		}
		else
		{
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_pelimpahan_berkas']['error'] <> 4 || $_FILES['file_penetapan_hari_sidang']['error'] <> 4 || $_FILES['file_penahanan']['error'] <> 4 || $_FILES['file_perpanjang_penahanan_I']['error'] <> 4 || $_FILES['file_perpanjang_penahanan_II']['error'] <> 4 || $_FILES['file_perpanjang_penahanan_III']['error'] <> 4 || $_FILES['file_putusan']['error'] <> 4  ) 
			{
				if (!empty($this->upload->do_upload('file_pelimpahan_berkas')))
				{
					$file_pelimpahan_berkas 		 = $this->upload->data();
				}
				if (!empty($this->upload->do_upload('file_penetapan_hari_sidang'))) 
				{
					$file_penetapan_hari_sidang 	 = $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_penahanan'))) 
				{
					$file_penahanan 		= $this->upload->data(); 
				}
				
				if (!empty($this->upload->do_upload('file_perpanjang_penahanan_I')))
				{
					$file_perpanjang_penahanan_I 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_perpanjang_penahanan_II')))
				{
					$file_perpanjang_penahanan_II 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_perpanjang_penahanan_III')))
				{
					$file_perpanjang_penahanan_III 	= $this->upload->data(); 
				}

				if (!empty($this->upload->do_upload('file_putusan')))
				{
					$file_putusan 	= $this->upload->data(); 
				}

					$deskripsi 	= $this->input->post('deskripsi', TRUE);
					$tanggal_posting = date('d/m/y');
					$url  = md5(uniqid());
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'tanggal_posting'					=> $tanggal_posting,
								  'deskripsi'						=> $deskripsi,
								  'uraian_pokok'					=> $this->input->post('uraian_pokok'),
								  'putusan_amar'					=> $this->input->post('putusan_amar'),
								  'pelimpahan_berkas'				=> $this->input->post('pelimpahan_berkas'),
								  'penetapan_hari_sidang'			=> $this->input->post('penetapan_hari_sidang'),
								  'penahanan'						=> $this->input->post('penahanan'),
								  'perpanjang_penahanan_I'			=> $this->input->post('perpanjang_penahanan_I'),
								  'perpanjang_penahanan_II'			=> $this->input->post('perpanjang_penahanan_II'),
								  'perpanjang_penahanan_III'		=> $this->input->post('perpanjang_penahanan_III'),
								  'putusan'							=> $this->input->post('putusan'),
								  'file_pelimpahan_berkas'			=> $file_pelimpahan_berkas['file_name'],
								  'file_penetapan_hari_sidang'		=> $file_penetapan_hari_sidang['file_name'], 
								  'file_penahanan'					=> $file_penahanan['file_name'], 
								  'file_perpanjang_penahanan_I'		=> $file_perpanjang_penahanan_I['file_name'], 
								  'file_perpanjang_penahanan_II'	=> $file_perpanjang_penahanan_II['file_name'], 
								  'file_perpanjang_penahanan_III'	=> $file_perpanjang_penahanan_III['file_name'],
								  'file_putusan'					=> $file_putusan['file_name'],
								  'tanggal_pelimpahan_berkas'		=> $this->input->post('tanggal_pelimpahan_berkas'),
								  'tanggal_penetapan_hari_sidang'	=> $this->input->post('tanggal_penetapan_hari_sidang'),
								  'tanggal_penahanan'				=> $this->input->post('tanggal_penahanan'),
								  'tanggal_perpanjang_penahanan_I'	=> $this->input->post('tanggal_perpanjang_penahanan_I'),
								  'tanggal_perpanjang_penahanan_II'	=> $this->input->post('tanggal_perpanjang_penahanan_II'),
								  'tanggal_perpanjang_penahanan_III'=> $this->input->post('tanggal_perpanjang_penahanan_III'),
								  'tanggal_putusan'					=> $this->input->post('tanggal_putusan'),
								  'url'								=> $url );
					
					$this->m_pengadilan->simpan($data);	
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('pengadilan/tambah_jadwal'));			
					
			}
			else
			{
				$deskripsi 	= $this->input->post('deskripsi', TRUE);
				$tanggal_posting = date('d/m/y');
				$url  = md5(uniqid());
				$data = array('id_users' 						=> $this->session->userdata('id'),
							  'tanggal_posting'					=> $tanggal_posting,
							  'deskripsi'						=> $deskripsi,
							  'uraian_pokok'					=> $this->input->post('uraian_pokok'),
							  'putusan_amar'					=> $this->input->post('putusan_amar'),
							  'pelimpahan_berkas'				=> $this->input->post('pelimpahan_berkas'),
							  'penetapan_hari_sidang'			=> $this->input->post('penetapan_hari_sidang'),
							  'penahanan'						=> $this->input->post('penahanan'),
							  'perpanjang_penahanan_I'			=> $this->input->post('perpanjang_penahanan_I'),
							  'perpanjang_penahanan_II'			=> $this->input->post('perpanjang_penahanan_II'),
							  'perpanjang_penahanan_III'		=> $this->input->post('perpanjang_penahanan_III'),
							  'putusan'							=> $this->input->post('putusan'),
							  'tanggal_pelimpahan_berkas'		=> $this->input->post('tanggal_pelimpahan_berkas'),
							  'tanggal_penetapan_hari_sidang'	=> $this->input->post('tanggal_penetapan_hari_sidang'),
							  'tanggal_penahanan'				=> $this->input->post('tanggal_penahanan'),
							  'tanggal_perpanjang_penahanan_I'	=> $this->input->post('tanggal_perpanjang_penahanan_I'),
							  'tanggal_perpanjang_penahanan_II'	=> $this->input->post('tanggal_perpanjang_penahanan_II'),
							  'tanggal_perpanjang_penahanan_III'=> $this->input->post('tanggal_perpanjang_penahanan_III'),
							  'tanggal_putusan'					=> $this->input->post('tanggal_putusan'),
							  'url'								=> $url );
					
					$this->m_pengadilan->simpan($data);	
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('pengadilan/tambah_jadwal'));			
			}
		}
	}

	
    public function hapus_jadwal($id, $url)
    {	
		$file = $this->m_pengadilan->tampil($id);
		@unlink('./uploads/pengadilan/'. $file->file_pelimpahan_berkas);
		@unlink('./uploads/pengadilan/'. $file->file_penetapan_hari_sidang);
		@unlink('./uploads/pengadilan/'. $file->file_penahanan);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_I);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_II);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_III);
		@unlink('./uploads/pengadilan/'. $file->file_putusan);

		$hapus = $this->m_pengadilan->hapus($id, $url);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('pengadilan/data_jadwal'));
		}
    }

    public function ubah_deskripsi()
    {
    	$id_data 	= $this->input->post('id_data');
    	$url 	= $this->input->post('url');
    	$data = array('deskripsi' => $this->input->post('deskripsi'));
    	$this->m_pengadilan->ubah_deskripsi($id_data, $data, $url);
    	$this->session->set_flashdata('deskripsi_diganti', '<div class="alert alert-success" role="alert">Deskripsi berhasil diganti</div>');
		redirect(base_url('pengadilan/data_jadwal'));
    }
    
    public function unduh_kepolisian()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/kepolisian/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh_kejaksaan()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/kejaksaan/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh_lapas()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/lapas/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/pengadilan/'.$this->uri->segment(3); 
    		force_download($file, NULL);
		}
		else
		{
			show_404();
		}
	
		force_download($data, null);
    }


    public function file_pelimpahan_berkas($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_pelimpahan_berkas']['name']);
        if($_FILES['file_pelimpahan_berkas']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pelimpahan_berkas', 'Pilih file pelimpahan berkas hanya word atau pdf.');
                return false;
            }
        }
    }

	public function file_penetapan_hari_sidang($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_penetapan_hari_sidang']['name']);
        if($_FILES['file_penetapan_hari_sidang']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penetapan_hari_sidang', 'Pilih file Penetapan hari sidang hanya word atau pdf.');
                return false;
            }
        }
    }

    public function file_penahanan($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_penahanan']['name']);
        if($_FILES['file_penahanan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penahanan', 'Pilih penahanan hanya word atau pdf.');
                return false;
            }
        }
    }

	public function file_perpanjang_penahanan_I($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_I']['name']);
        if($_FILES['file_perpanjang_penahanan_I']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_I', 'Pilih file Perpanjang Penahanan I hanya word atau pdf.');
                return false;
            }
        }
    }

    public function file_perpanjang_penahanan_II($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_II']['name']);
        if($_FILES['file_perpanjang_penahanan_II']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_II', 'Pilih file Perpanjang Penahanan II hanya word atau pdf.');
                return false;
            }
        }
    }

   

    public function file_perpanjang_penahanan_III($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_III']['name']);
        if($_FILES['file_perpanjang_penahanan_III']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_III', 'Pilih Perpanjang Penahanan III hanya word atau pdf.');
                return false;
            }
        }
    }


    public function file_putusan($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_putusan']['name']);
        if($_FILES['file_putusan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_putusan', 'Pilih file putusan hanya word atau pdf.');
                return false;
            }
        }
    }

}
