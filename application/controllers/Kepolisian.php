<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepolisian extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kejaksaan_cobamasuk_kepolisian();
		$this->pengadilan_cobamasuk_kepolisian();
		$this->lapas_cobamasuk_kepolisian();
		$this->superadmin_cobamasuk_kepolisian();
		$this->load->helper('file');
		$this->load->model('m_kepolisian');
		$this->load->model('m_cek_validasi_data');
		
	}
	public function index()
	{
		$this->load->driver('cache', array('adapter' => 'file'));
		$cachKejaksaan = 'kejaksaan'; 
		if (!$data['kejaksaan']  = $this->m_cek_validasi_data->tampil_data_kejaksaan($cachKejaksaan))
		{
			$data['kejaksaan']  = $this->m_cek_validasi_data->tampil_data_kejaksaan();
	        $this->cache->save($cachKejaksaan, $data, 60);
		}
		$cachePengadilan = 'pengadilan';

		if (!$data['pengadilan']	= $this->m_cek_validasi_data->tampil_data_pengadilan($cachePengadilan))
		{
			
			$data['pengadilan']	= $this->m_cek_validasi_data->tampil_data_pengadilan();
	        $this->cache->save($cachePengadilan, $data, 60);
		}
		$cacheLapas = 'lapas';
		if (!$data['lapas'] = $this->m_cek_validasi_data->tampil_data_lapas($cacheLapas))
		{
			$data['lapas'] 		= $this->m_cek_validasi_data->tampil_data_lapas();
	        $this->cache->save($cacheLapas, $data, 60);
		}

		$this->load->view('pages/kepolisian/daftar_jadwal/index', $data);
	}

	public function detail_kejaksaan($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kejaksaan($url);	
		$this->load->view('pages/kepolisian/daftar_jadwal/detail_kejaksaan/index', $data);
	}

	public function detail_pengadilan($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_pengadilan($url);	
		$this->load->view('pages/kepolisian/daftar_jadwal/detail_pengadilan/index', $data);
	}

	public function detail_lapas($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_lapas($url);	
		$this->load->view('pages/kepolisian/daftar_jadwal/detail_lapas/index', $data);
	}

	
	public function data_jadwal()
	{
		$data['data'] = $this->m_kepolisian->tampil();
		$this->load->view('pages/kepolisian/data_jadwal/index', $data);
	}

	public function uraian_pasal($url)
	{
    	$data['data'] = $this->m_kepolisian->uraian_dan_cerita($url);

		$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/uraian_pasal/index', $data);
	}

	public function ubah_uraian_pasal($url)
	{
    	$this->form_validation->set_rules('editor3', 'Uraian Pasal', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			// $url = $this->input->post('url');
			$this->uraian_pasal($url);		
		}
		else
		{
			$id_data = $this->input->post('id_data');
			$uraian_pasal = $this->input->post('editor3');
			$data = array('uraian_pasal' =>  $uraian_pasal);
			$success = $this->m_kepolisian->ubah_uraian($id_data, $data);
			
			if ($success == TRUE) 
			{
				$this->session->set_flashdata('uraian_pasal_updated', '<div class="alert alert-success" role="alert">Uraian Pasal Updated</div>');	
				// $url = $this->input->post('url');
				$this->uraian_pasal($url);	
			}
		}
	}

	public function cerita_singkat($url)
	{
    	$data['data'] = $this->m_kepolisian->uraian_dan_cerita($url);
		$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/cerita_singkat/index', $data);
	}

	public function tambah_jadwal()
	{
		$this->load->view('pages/kepolisian/tambah_jadwal/index');
	}

	public function simpan()
	{
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('editor1','Uraian Pasal','required');
		$this->form_validation->set_rules('editor2','Cerita Singkat','required');
		$this->form_validation->set_rules('file_penangkapan', '', 'callback_file_penangkapan');
		$this->form_validation->set_rules('file_ijin_sita', '', 'callback_file_ijin_sita');
		$this->form_validation->set_rules('file_ijin_geledah', '', 'callback_file_ijin_geledah');
		$this->form_validation->set_rules('file_pelimpahan', '', 'callback_file_pelimpahan');
		$this->form_validation->set_rules('file_penahanan', '', 'callback_file_penahanan');
		$this->form_validation->set_rules('file_perpanjang_penahanan', '', 'callback_file_perpanjang_penahanan');


		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			return $this->tambah_jadwal();
			$this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" role="alert">Gagal di simpan!</div>');
		}
		else
		{
			$config['upload_path']          = './uploads/kepolisian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_penangkapan']['error'] <> 4 || $_FILES['file_ijin_sita']['error'] <> 4 || $_FILES['file_ijin_geledah']['error'] <> 4 || $_FILES['file_pelimpahan']['error'] <> 4 || $_FILES['file_penahanan']['error'] <> 4 || $_FILES['file_perpanjang_penahanan']['error'] <> 4) 
			{
				if (!empty($this->upload->do_upload('file_penangkapan')))
				{
					$file_penangkapan = $this->upload->data();
				}
				if (!empty($this->upload->do_upload('file_ijin_sita'))) 
				{
					$file_ijin_sita = $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_ijin_geledah'))) 
				{
					$file_ijin_geledah 			= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_pelimpahan'))) 
				{
					$file_pelimpahan 			= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_penahanan')))
				{
					$file_penahanan 			= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_perpanjang_penahanan')))
				{
					$file_perpanjang_penahanan 	= $this->upload->data(); 
				}

					$deskripsi 		= $this->input->post('deskripsi', TRUE);
					$uraian_pasal 	= $this->input->post('editor1', TRUE);
					$cerita_singkat = $this->input->post('editor2', TRUE);

					$url  = md5(uniqid());
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'deskripsi'					=> $deskripsi,
								  'uraian_pasal'				=> $uraian_pasal,
								  'cerita_singkat'				=> $cerita_singkat,
								  'penangkapan'					=> $this->input->post('penangkapan'),
								  'ijin_sita'					=> $this->input->post('ijin_sita'),
								  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
								  'pelimpahan'					=> $this->input->post('pelimpahan'),
								  'penahanan'					=> $this->input->post('penahanan'),
								  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
								  'file_penangkapan'			=> $file_penangkapan['file_name'],
								  'file_ijin_sita'				=> $file_ijin_sita['file_name'], 
								  'file_ijin_geledah'			=> $file_ijin_geledah['file_name'], 
								  'file_pelimpahan'				=> $file_pelimpahan['file_name'], 
								  'file_penahanan'				=> $file_penahanan['file_name'], 
								  'file_perpanjang_penahanan'	=> $file_perpanjang_penahanan['file_name'],  
								  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
								  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
								  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
								  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
								  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
								  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'),
								  'url'							=> $url );
					$this->m_kepolisian->simpan($data);
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('kepolisian/tambah_jadwal'));			
					
			}
			else
			{
				$deskripsi 	= $this->input->post('deskripsi', TRUE);
				$uraian_pasal 	= $this->input->post('editor1', TRUE);
				$cerita_singkat = $this->input->post('editor2', TRUE);

				$url  = md5(uniqid());
				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'deskripsi'					=> $deskripsi,
							  'uraian_pasal'				=> $uraian_pasal,
							  'cerita_singkat'				=> $cerita_singkat,
							  'penangkapan'					=> $this->input->post('penangkapan'),
							  'ijin_sita'					=> $this->input->post('ijin_sita'),
							  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
							  'pelimpahan'					=> $this->input->post('pelimpahan'),
							  'penahanan'					=> $this->input->post('penahanan'),
							  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
							  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
							  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
							  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
							  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
							  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
							  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'),
							  'url'							=> $url
							);
				$this->m_kepolisian->simpan($data);	
				$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');	
				redirect(base_url('kepolisian/tambah_jadwal'));	
				
			}
		}
	}

	public function file_penangkapan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_penangkapan']['name']);
        if($_FILES['file_penangkapan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penangkapan', 'Pilih file penangkapan hanya pdf.');
                return false;
            }
        }
    }

	public function file_ijin_sita($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_ijin_sita']['name']);
        if($_FILES['file_ijin_sita']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_ijin_sita', 'Pilih file ijin sita hanya pdf.');
                return false;
            }
        }
    }

	public function file_ijin_geledah($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_ijin_geledah']['name']);
        if($_FILES['file_ijin_geledah']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_ijin_geledah', 'Pilih file ijin geledah hanya pdf.');
                return false;
            }
        }
    }

    public function file_pelimpahan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_pelimpahan']['name']);
        if($_FILES['file_pelimpahan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pelimpahan', 'Pilih file pelimpahan hanya pdf.');
                return false;
            }
        }
    }

    public function file_penahanan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_penahanan']['name']);
        if($_FILES['file_penahanan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penahanan', 'Pilih penahanan hanya pdf.');
                return false;
            }
        }
    }

    public function file_perpanjang_penahanan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan']['name']);
        if($_FILES['file_perpanjang_penahanan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan', 'Pilih perpanjang penahanan hanya pdf.');
                return false;
            }
        }
    }


    public function lihat_detail_jadwal($url)
    {
    	$data['data'] = $this->m_kepolisian->lihat_detail_jadwal($url);
		$this->load->view('pages/kepolisian/data_jadwal/detail_jadwal/index', $data);
    }

    public function hapus_jadwal($id)
    {	
		$file = $this->m_kepolisian->tampil($id);
		@unlink('./uploads/kepolisian/'. $file->file_penangkapan);
		@unlink('./uploads/kepolisian/'. $file->file_ijin_sita);
		@unlink('./uploads/kepolisian/'. $file->file_ijin_geledah);
		@unlink('./uploads/kepolisian/'. $file->file_pelimpahan);
		@unlink('./uploads/kepolisian/'. $file->file_penahanan);
		@unlink('./uploads/kepolisian/'. $file->file_perpanjang_penahanan);


		$hapus = $this->m_kepolisian->hapus($id);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('kepolisian/data_jadwal'));
		}
    }

    public function ubah_deskripsi()
    {
    	$id_data 	= $this->input->post('id_data');
    	$data = array('deskripsi' => $this->input->post('deskripsi'));
    	$this->m_kepolisian->ubah_deskripsi($id_data, $data);
    	$this->session->set_flashdata('deskripsi_diganti', '<div class="alert alert-success" role="alert">Deskripsi berhasil diganti</div>');
		redirect(base_url('kepolisian/data_jadwal'));
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

    public function unduh_pengadilan()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/pengadilan/'.$this->uri->segment(3); 
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
    		$data = 'uploads/kepolisian/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }
}
