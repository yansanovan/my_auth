<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejaksaan extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kepolisian_cobamasuk_kejaksaan();
		$this->pengadilan_cobamasuk_kejaksaan();
		$this->lapas_cobamasuk_kejaksaan();
		$this->superadmin_cobamasuk_kejaksaan();
		$this->load->helper('file');
		$this->load->model('m_kejaksaan');
		$this->load->model('m_cek_validasi_data');
	}
	public function index()
	{

		$data['kepolisian'] = $this->m_cek_validasi_data->tampil_data_kepolisian();
		$data['pengadilan']	= $this->m_cek_validasi_data->tampil_data_pengadilan();
		$data['lapas'] 		= $this->m_cek_validasi_data->tampil_data_lapas();

		$this->load->view('pages/kejaksaan/daftar_jadwal/index', $data);
	}

	public function detail_kepolisian($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_kepolisian($url);	
		$this->load->view('pages/kejaksaan/daftar_jadwal/detail_kepolisian/index', $data);
	}

	public function detail_pengadilan($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_pengadilan($url);	
		$this->load->view('pages/kejaksaan/daftar_jadwal/detail_pengadilan/index', $data);
	}

	public function detail_lapas($url)
	{
		$data['data'] 	= $this->m_cek_validasi_data->tampil_data_lapas($url);	
		$this->load->view('pages/kejaksaan/daftar_jadwal/detail_lapas/index', $data);
	}


	public function data_jadwal()
	{
		$data['data'] = $this->m_kejaksaan->tampil();
		$this->load->view('pages/kejaksaan/data_jadwal/index', $data);
	}

	public function lihat_detail_jadwal($url)
    {
    	$data['data'] = $this->m_kejaksaan->lihat_detail_jadwal($url);
		$this->load->view('pages/kejaksaan/data_jadwal/detail_jadwal/index', $data);
    }

    public function uraian_pasal_kepolisian($url)
    {
    	$data['data'] = $this->m_cek_validasi_data->uraian_pasal_dan_cerita_singkat($url);
		$this->load->view('pages/kejaksaan/daftar_jadwal/detail_kepolisian/uraian_pasal/index', $data);
    }

    public function cerita_singkat($url)
    {
    	$data['data'] = $this->m_cek_validasi_data->uraian_pasal_dan_cerita_singkat($url);
		$this->load->view('pages/kejaksaan/daftar_jadwal/detail_kepolisian/cerita_singkat/index', $data);
    }

	public function tambah_jadwal()
	{
		$value = $this->m_cek_validasi_data->tampil_data_kepolisian();
		
		$jumlah = count($value);
		if ($jumlah == 0) 
		{
			redirect('kejaksaan/data_kosong');
		}
		else
		{
			$this->load->view('pages/kejaksaan/tambah_jadwal/index');			
		}
		foreach ($value as $key => $data) 
		{	
			if ($data->id_data == NULL || $data->id_users == NULL || $data->deskripsi == NULL || $data->file_penangkapan == NULL || $data->file_ijin_sita == NULL || $data->file_ijin_geledah == NULL || $data->file_pelimpahan == NULL || $data->file_penahanan == NULL || $data->file_perpanjang_penahanan == NULL || $data->tanggal_penangkapan == 0000-00-00 || $data->tanggal_ijin_sita == 0000-00-00 || $data->tanggal_ijin_geledah == 0000-00-00 || $data->tanggal_pelimpahan == 0000-00-00 || $data->tanggal_penahanan == 0000-00-00 || $data->tanggal_perpanjang_penahanan == 0000-00-00 ) 
			{
				redirect('kejaksaan/data_kosong');
			}
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
		$this->form_validation->set_rules('file_pelimpahan_berkas', '', 'callback_file_pelimpahan_berkas');
		$this->form_validation->set_rules('file_tahap_I', '', 'callback_file_tahap_I');
		$this->form_validation->set_rules('file_tahap_II', '', 'callback_file_tahap_II');
		$this->form_validation->set_rules('file_pelimpahan', '', 'callback_file_pelimpahan');
		$this->form_validation->set_rules('file_penahanan', '', 'callback_file_penahanan');
		$this->form_validation->set_rules('file_perpanjang_penahanan', '', 'callback_file_perpanjang_penahanan');
		$this->form_validation->set_rules('file_eksekusi_putusan', '', 'callback_file_eksekusi_putusan');


		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			return $this->tambah_jadwal();
			$this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" role="alert">Gagal di simpan!</div>');
		}
		else
		{
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_pelimpahan_berkas']['error'] <> 4 || $_FILES['file_tahap_I']['error'] <> 4 || $_FILES['file_tahap_II']['error'] <> 4 || $_FILES['file_pelimpahan']['error'] <> 4 || $_FILES['file_penahanan']['error'] <> 4 || $_FILES['file_perpanjang_penahanan']['error'] <> 4  || $_FILES['file_eksekusi_putusan']['error'] <> 4) 
			{
				if (!empty($this->upload->do_upload('file_pelimpahan_berkas')))
				{
					$file_pelimpahan_berkas = $this->upload->data();
				}
				if (!empty($this->upload->do_upload('file_tahap_I'))) 
				{
					$file_tahap_I 		= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_tahap_II'))) 
				{
					$file_tahap_II 		= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_pelimpahan'))) 
				{
					$file_pelimpahan 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_penahanan')))
				{
					$file_penahanan 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_perpanjang_penahanan')))
				{
					$file_perpanjang_penahanan 	= $this->upload->data(); 
				}
				if (!empty($this->upload->do_upload('file_eksekusi_putusan')))
				{
					$file_eksekusi_putusan 	= $this->upload->data(); 
				}

					$deskripsi 	= $this->input->post('deskripsi', TRUE);
					$url  = md5(uniqid());
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'deskripsi'					=> $deskripsi,
								  'pelimpahan_berkas'			=> $this->input->post('pelimpahan_berkas'),
								  'tahap_I'						=> $this->input->post('tahap_I'),
								  'tahap_II'					=> $this->input->post('tahap_II'),
								  'pelimpahan'					=> $this->input->post('pelimpahan'),
								  'penahanan'					=> $this->input->post('penahanan'),
								  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
								  'eksekusi_putusan'			=> $this->input->post('eksekusi_putusan'),
								  'file_pelimpahan_berkas'		=> $file_pelimpahan_berkas['file_name'],
								  'file_tahap_I'				=> $file_tahap_I['file_name'], 
								  'file_tahap_II'				=> $file_tahap_II['file_name'], 
								  'file_pelimpahan'				=> $file_pelimpahan['file_name'], 
								  'file_penahanan'				=> $file_penahanan['file_name'], 
								  'file_perpanjang_penahanan'	=> $file_perpanjang_penahanan['file_name'],
								  'file_eksekusi_putusan'		=> $file_eksekusi_putusan['file_name'],    
								  'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'),
								  'tanggal_tahap_I'				=> $this->input->post('tanggal_tahap_I'),
								  'tanggal_tahap_II'			=> $this->input->post('tanggal_tahap_II'),
								  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
								  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
								  'tanggal_perpanjang_penahanan' => $this->input->post('tanggal_perpanjang_penahanan'),
								  'tanggal_eksekusi_putusan'	=> $this->input->post('tanggal_eksekusi_putusan'),
								  'url'							=> $url );
					
					$this->m_kejaksaan->simpan($data);	
					$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
					redirect(base_url('kejaksaan/tambah_jadwal'));			
					
			}
			else
			{
				$deskripsi 	= $this->input->post('deskripsi', TRUE);
				$url  = md5(uniqid());
				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'deskripsi'					=> $deskripsi,
							  'pelimpahan_berkas'			=> $this->input->post('pelimpahan_berkas'),
							  'tahap_I'						=> $this->input->post('tahap_I'),
							  'tahap_II'					=> $this->input->post('tahap_II'),
							  'pelimpahan'					=> $this->input->post('pelimpahan'),
							  'penahanan'					=> $this->input->post('penahanan'),
							  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
							  'eksekusi_putusan'			=> $this->input->post('eksekusi_putusan'),
							  'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'),
							  'tanggal_tahap_I'				=> $this->input->post('tanggal_tahap_I'),
							  'tanggal_tahap_II'			=> $this->input->post('tanggal_tahap_II'),
							  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
							  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
							  'tanggal_perpanjang_penahanan' => $this->input->post('tanggal_perpanjang_penahanan'),
							  'tanggal_eksekusi_putusan'	=> $this->input->post('tanggal_eksekusi_putusan'),
							  'url'							=> $url );
				$this->m_kejaksaan->simpan($data);	
				$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');	
				redirect(base_url('kejaksaan/tambah_jadwal'));	
				
			}
		}
	}

	public function file_pelimpahan_berkas($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_pelimpahan_berkas']['name']);
        if($_FILES['file_pelimpahan_berkas']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pelimpahan_berkas', 'Pilih file pelimpahan berkas hanya pdf.');
                return false;
            }
        }
    }

	public function file_tahap_I($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_tahap_I']['name']);
        if($_FILES['file_tahap_I']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_tahap_I', 'Pilih file tahap I hanya pdf.');
                return false;
            }
        }
    }

	public function file_tahap_II($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_tahap_II']['name']);
        if($_FILES['file_tahap_II']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_tahap_II', 'Pilih file tahap_II hanya pdf.');
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

    public function file_eksekusi_putusan($str)
	{
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['file_eksekusi_putusan']['name']);
        if($_FILES['file_eksekusi_putusan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_eksekusi_putusan', 'Pilih file eksekusi putusan hanya pdf.');
                return false;
            }
        }
    }

    public function ubah_deskripsi()
    {
    	$id_data 	= $this->input->post('id_data');
    	$data = array('deskripsi' => $this->input->post('deskripsi'));
    	$this->m_kejaksaan->ubah_deskripsi($id_data, $data);
    	$this->session->set_flashdata('deskripsi_diganti', '<div class="alert alert-success" role="alert">Deskripsi berhasil diganti</div>');
		redirect(base_url('kejaksaan/data_jadwal'));
    }

    public function hapus_jadwal($id)
    {	
		$file = $this->m_kejaksaan->tampil($id);
		@unlink('./uploads/kejaksaan/'. $file->file_pelimpahan_berkas);
		@unlink('./uploads/kejaksaan/'. $file->file_tahap_I);
		@unlink('./uploads/kejaksaan/'. $file->file_tahap_II);
		@unlink('./uploads/kejaksaan/'. $file->file_pelimpahan);
		@unlink('./uploads/kejaksaan/'. $file->file_penahanan);
		@unlink('./uploads/kejaksaan/'. $file->file_perpanjang_penahanan);
		@unlink('./uploads/kejaksaan/'. $file->file_eksekusi_putusan);


		$hapus = $this->m_kejaksaan->hapus($id);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('kejaksaan/data_jadwal'));
		}
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
    		$data = 'uploads/kejaksaan/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
	
		force_download($data, null);
    }
}
