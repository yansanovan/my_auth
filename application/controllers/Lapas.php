<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapas extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kejaksaan_cobamasuk_lapas();
		$this->kepolisian_cobamasuk_lapas();
		$this->pengadilan_cobamasuk_lapas();
		$this->superadmin_cobamasuk_lapas();
		$this->load->helper('file');
		$this->load->model('m_lapas');
		$this->load->model('m_cek_validasi_data');
	}
	public function index()
	{
		$data['kepolisian'] = $this->m_cek_validasi_data->tampil_data_kepolisian();
		$data['kejaksaan']  = $this->m_cek_validasi_data->tampil_data_kejaksaan();
		$data['pengadilan']	= $this->m_cek_validasi_data->tampil_data_pengadilan();
		$this->load->view('pages/lapas/daftar_jadwal/index', $data);
	}

	public function detail_kepolisian($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kepolisian($url);	
		$this->load->view('pages/lapas/daftar_jadwal/detail_kepolisian/index', $data);
	}

	public function detail_kejaksaan($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kejaksaan($url);	
		$this->load->view('pages/lapas/daftar_jadwal/detail_kejaksaan/index', $data);
	}

	public function detail_pengadilan($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_pengadilan($url);	
		$this->load->view('pages/lapas/daftar_jadwal/detail_pengadilan/index', $data);
	}

	public function data_jadwal()
	{
		$data['data'] = $this->m_lapas->tampil();
		$this->load->view('pages/lapas/data_jadwal/index', $data);
	}

	public function tambah_jadwal()
	{
		//  cek kepolisian, kejaksaan, pengadilan kosong atau tidak
		$kepolisian = $this->m_cek_validasi_data->tampil_data_kepolisian();
		$kejaksaan  = $this->m_cek_validasi_data->tampil_data_kejaksaan();
		$pengadilan = $this->m_cek_validasi_data->tampil_data_pengadilan();

		
		foreach ($kepolisian as $key => $data) 
		{	
			if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_penangkapan == NULL || $data->file_ijin_sita == NULL || $data->file_ijin_geledah == NULL || $data->file_pelimpahan == NULL || $data->file_penahanan == NULL || $data->file_perpanjang_penahanan == NULL || $data->tanggal_penangkapan == 0000-00-00 || $data->tanggal_ijin_sita == 0000-00-00 || $data->tanggal_ijin_geledah == 0000-00-00 || $data->tanggal_pelimpahan == 0000-00-00 || $data->tanggal_penahanan == 0000-00-00 || $data->tanggal_perpanjang_penahanan == 0000-00-00 ) 
			{
				redirect('lapas/data_kosong');
			}
		}
		foreach ($kejaksaan as $key => $data) 
		{	
			if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_pelimpahan_berkas == NULL || $data->file_tahap_I == NULL || $data->file_tahap_II == NULL || $data->file_pelimpahan == NULL || $data->file_penahanan == NULL || $data->file_perpanjang_penahanan == NULL || $data->file_eksekusi_putusan == NULL || $data->tanggal_pelimpahan_berkas == 0000-00-00 || $data->tanggal_tahap_I == 0000-00-00 || $data->tanggal_tahap_II == 0000-00-00 || $data->tanggal_pelimpahan == 0000-00-00 || $data->tanggal_perpanjang_penahanan == 0000-00-00 || $data->tanggal_eksekusi_putusan == 0000-00-00 ) 
			{
				redirect('lapas/data_kosong');
			}
		}
		foreach ($pengadilan as $key => $data) 
		{	
			if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_pelimpahan_berkas == NULL || $data->file_penetapan_hari_sidang == NULL  ||  $data->file_penahanan == NULL || $data->file_perpanjang_penahanan_I == NULL || $data->file_perpanjang_penahanan_II == NULL || $data->file_perpanjang_penahanan_III == NULL || $data->file_putusan == NULL || $data->tanggal_pelimpahan_berkas == 0000-00-00 || $data->tanggal_penetapan_hari_sidang == 0000-00-00 ||  $data->tanggal_penahanan == 0000-00-00 || $data->tanggal_perpanjang_penahanan_I == 0000-00-00 || $data->tanggal_perpanjang_penahanan_II == 0000-00-00 || $data->tanggal_perpanjang_penahanan_III == 0000-00-00 || $data->tanggal_putusan == 0000-00-00) 
			{
				redirect('lapas/data_kosong');
			}
		}
	
		
		$jumlah_kejaksaan  = count($kejaksaan);
		$jumlah_kepolisian = count($kepolisian);
		$jumlah_pengadilan = count($pengadilan);
		if ($jumlah_kepolisian == 0) 
		{
			redirect('lapas/data_kosong');
		}
		elseif ($jumlah_kepolisian == 0) {
			redirect('lapas/data_kosong');
			
		}
		elseif ($jumlah_pengadilan == 0) {
			redirect('lapas/data_kosong');
		}
		else
		{
			$this->load->view('pages/lapas/tambah_jadwal/index');
				
		}
	
	}

	public function data_kosong()
	{
		$this->load->view('pages/template/header');	
		$this->load->view('pages/template/sidebar');			
		$this->load->view('pages/akses_crud/akses_crud');
		$this->load->view('pages/template/footer');		
	}

	public function simpan()
	{
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('file_eksekusi', '', 'callback_file_eksekusi');
		$this->form_validation->set_rules('file_isi_putusan', '', 'callback_file_isi_putusan');
		$this->form_validation->set_rules('file_pembebasan_bersyarat', '', 'callback_file_pembebasan_bersyarat');
		$this->form_validation->set_rules('file_remisi', '', 'callback_file_remisi');
		$this->form_validation->set_rules('file_bebas', '', 'callback_file_bebas');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			return $this->tambah_jadwal();
			$this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" role="alert">Gagal di simpan!</div>');
		}
		else
		{
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_eksekusi']['error'] <> 4 || $_FILES['file_isi_putusan']['error'] <> 4 || $_FILES['file_pembebasan_bersyarat']['error'] <> 4 || $_FILES['file_remisi']['error'] <> 4 || $_FILES['file_bebas']['error'] <> 4) 
			{
				if (!empty($this->upload->do_upload('file_eksekusi')))
				{
					$file_eksekusi 		 = $this->upload->data();
				}
				if (!empty($this->upload->do_upload('file_isi_putusan'))) 
				{
					$file_isi_putusan 	 = $this->upload->data(); 
				}
				
				if (!empty($this->upload->do_upload('file_pembebasan_bersyarat')))
				{
					$file_pembebasan_bersyarat 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_remisi')))
				{
					$file_remisi 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_bebas')))
				{
					$file_bebas 	= $this->upload->data(); 
				}

					$deskripsi 	= $this->input->post('deskripsi', TRUE);
					$url  = md5(uniqid());
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'deskripsi'						=> $deskripsi,
								  'eksekusi'						=> $this->input->post('eksekusi'),
								  'isi_putusan'						=> $this->input->post('isi_putusan'),
								  'pembebasan_bersyarat'			=> $this->input->post('pembebasan_bersyarat'),
								  'remisi'							=> $this->input->post('remisi'),
								  'bebas'							=> $this->input->post('bebas'),
								  'file_eksekusi'					=> $file_eksekusi['file_name'],
								  'file_isi_putusan'				=> $file_isi_putusan['file_name'], 
								  'file_pembebasan_bersyarat'		=> $file_pembebasan_bersyarat['file_name'], 
								  'file_remisi'						=> $file_remisi['file_name'], 
								  'file_bebas'						=> $file_bebas['file_name'],
								  'tanggal_eksekusi'				=> $this->input->post('tanggal_eksekusi'),
								  'tanggal_isi_putusan'				=> $this->input->post('tanggal_isi_putusan'),
								  'tanggal_pembebasan_bersyarat'	=> $this->input->post('tanggal_pembebasan_bersyarat'),
								  'tanggal_remisi'					=> $this->input->post('tanggal_remisi'),
								  'tanggal_bebas'					=> $this->input->post('tanggal_bebas'),
								  'url'								=> $url );
					
					$this->m_lapas->simpan($data);	
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('lapas/tambah_jadwal'));			
					
			}
			else
			{
				$deskripsi 	= $this->input->post('deskripsi', TRUE);
				$url  = md5(uniqid());
				$data = array('id_users' 						=> $this->session->userdata('id'),
								  'deskripsi'						=> $deskripsi,
								  'eksekusi'						=> $this->input->post('eksekusi'),
								  'isi_putusan'						=> $this->input->post('isi_putusan'),
								  'pembebasan_bersyarat'			=> $this->input->post('pembebasan_bersyarat'),
								  'remisi'							=> $this->input->post('remisi'),
								  'bebas'							=> $this->input->post('bebas'),
								  'tanggal_eksekusi'				=> $this->input->post('tanggal_eksekusi'),
								  'tanggal_isi_putusan'				=> $this->input->post('tanggal_isi_putusan'),
								  'tanggal_pembebasan_bersyarat'	=> $this->input->post('tanggal_pembebasan_bersyarat'),
								  'tanggal_remisi'					=> $this->input->post('tanggal_remisi'),
								  'tanggal_bebas'					=> $this->input->post('tanggal_bebas'),
								  'url'								=> $url );
					
					$this->m_lapas->simpan($data);	
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('lapas/tambah_jadwal'));			
			}
		}
	}

	public function file_eksekusi($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_eksekusi']['name']);
        if($_FILES['file_eksekusi']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_eksekusi', 'Pilih file eksekusi hanya pdf.');
                return false;
            }
        }
    }

	public function file_isi_putusan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_isi_putusan']['name']);
        if($_FILES['file_isi_putusan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_isi_putusan', 'Pilih file isi putusan hanya pdf.');
                return false;
            }
        }
    }

    public function file_pembebasan_bersyarat($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_pembebasan_bersyarat']['name']);
        if($_FILES['file_pembebasan_bersyarat']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pembebasan_bersyarat', 'Pilih file pembebasan bersyarat hanya pdf.');
                return false;
            }
        }
    }

	public function file_remisi($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_remisi']['name']);
        if($_FILES['file_remisi']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_remisi', 'Pilih file remisi hanya pdf.');
                return false;
            }
        }
    }

    public function file_bebas($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_bebas']['name']);
        if($_FILES['file_bebas']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_bebas', 'Pilih file bebas hanya pdf.');
                return false;
            }
        }
    }

	public function lihat_detail_jadwal($url)
    {
    	$data['data'] = $this->m_lapas->lihat_detail_jadwal($url);
		$this->load->view('pages/lapas/data_jadwal/detail_jadwal/index', $data);
    }

    public function hapus_jadwal($id)
    {	
		$file = $this->m_lapas->tampil($id);
		@unlink('./uploads/lapas/'. $file->file_eksekusi);
		@unlink('./uploads/lapas/'. $file->file_isi_putusan);
		@unlink('./uploads/lapas/'. $file->file_pembebasan_bersyarat);
		@unlink('./uploads/lapas/'. $file->file_remisi);
		@unlink('./uploads/lapas/'. $file->file_bebas);


		$hapus = $this->m_lapas->hapus($id);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('lapas/data_jadwal'));
		}
    }

    public function ubah_deskripsi()
    {
    	$id_data 	= $this->input->post('id_data');
    	$data = array('deskripsi' => $this->input->post('deskripsi'));
    	$this->m_lapas->ubah_deskripsi($id_data, $data);
    	$this->session->set_flashdata('deskripsi_diganti', '<div class="alert alert-success" role="alert">Deskripsi berhasil diganti</div>');
		redirect(base_url('lapas/data_jadwal'));
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
    
    public function unduh()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/lapas/'.$this->uri->segment(3); 
    		force_download($file, NULL);
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }
}
