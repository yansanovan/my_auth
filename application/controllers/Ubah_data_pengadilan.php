<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_data_pengadilan extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kepolisian_cobamasuk_pengadilan();
		$this->lapas_cobamasuk_pengadilan();
		$this->load->helper('file');
		$this->load->model('m_pengadilan');

	}
	public function load_pelimpahan_berkas($id)
	{		
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
	    	$data['data'] = $this->m_pengadilan->tampil($id);
	    	$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_pelimpahan_berkas/index', $data);
		}
	}

	public function update_file_pelimpahan_berkas()
	{

		$this->form_validation->set_rules('file_pelimpahan_berkas', '', 'callback_file_pelimpahan_berkas');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_pelimpahan_berkas($id);			
		}
		else
		{
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_pelimpahan_berkas']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_pelimpahan_berkas'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_pelimpahan_berkas/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_pelimpahan_berkas = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'pelimpahan_berkas'			=> $this->input->post('pelimpahan_berkas'),
								  'file_pelimpahan_berkas'		=> $file_pelimpahan_berkas['file_name'],
								  'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_pelimpahan_berkas);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->load_pelimpahan_berkas($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');	
				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'pelimpahan_berkas'			=> $this->input->post('pelimpahan_berkas'),
						   	  'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
				return $this->load_pelimpahan_berkas($id);
			}
		}
	}

	public function load_penetapan_hari_sidang($id)
	{		
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_penetapan_hari_sidang/index', $data);
		}
	}

	public function update_file_penetapan_hari_sidang()
	{

		$this->form_validation->set_rules('file_penetapan_hari_sidang', '', 'callback_file_penetapan_hari_sidang');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_penetapan_hari_sidang($id);			
		}
		else
		{
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_penetapan_hari_sidang']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_penetapan_hari_sidang'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_penetapan_hari_sidang/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_penetapan_hari_sidang = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'penetapan_hari_sidang'		=> $this->input->post('penetapan_hari_sidang'),
								  'file_penetapan_hari_sidang'	=> $file_penetapan_hari_sidang['file_name'],
								  'tanggal_penetapan_hari_sidang'	=> $this->input->post('tanggal_penetapan_hari_sidang'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_penetapan_hari_sidang);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->load_penetapan_hari_sidang($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');	
				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'penetapan_hari_sidang'		=> $this->input->post('penetapan_hari_sidang'),
						   	  'tanggal_penetapan_hari_sidang'	=> $this->input->post('tanggal_penetapan_hari_sidang'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
				return $this->load_penetapan_hari_sidang($id);
			}
		}
	}

	public function load_penahanan($id)
	{	
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_penahanan/index', $data);
		}
	}

	public function update_file_penahanan()
	{

		$this->form_validation->set_rules('file_penahanan', '', 'callback_file_penahanan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_penahanan($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_penahanan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_penahanan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_penahanan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_penahanan = $this->upload->data();
					$data = array('id_users' 				=> $this->session->userdata('id'),
								  'penahanan'				=> $this->input->post('penahanan'),
								  'file_penahanan'			=> $file_penahanan['file_name'],
								  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_penahanan);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_penahanan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');
				$data = array('id_users' 				=> $this->session->userdata('id'),
							  'penahanan'				=> $this->input->post('penahanan'),
						   	  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_penahanan($id);
			}
		}
	}


	public function load_perpanjang_penahanan_I($id)
	{		
    	$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_I/index', $data);
		}
	}

	public function update_file_perpanjang_penahanan_I()
	{

		$this->form_validation->set_rules('file_perpanjang_penahanan_I', '', 'callback_file_perpanjang_penahanan_I');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_perpanjang_penahanan_I($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_perpanjang_penahanan_I']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_perpanjang_penahanan_I'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_I/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_perpanjang_penahanan_I = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'perpanjang_penahanan_I'			=> $this->input->post('perpanjang_penahanan_I'),
								  'file_perpanjang_penahanan_I'		=> $file_perpanjang_penahanan_I['file_name'],
								  'tanggal_perpanjang_penahanan_I'	=> $this->input->post('tanggal_perpanjang_penahanan_I'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_I);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_perpanjang_penahanan_I($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');	
				$data = array('id_users' 						=> $this->session->userdata('id'),
							  'perpanjang_penahanan_I'			=> $this->input->post('perpanjang_penahanan_I'),
						   	  'tanggal_perpanjang_penahanan_I'	=> $this->input->post('tanggal_perpanjang_penahanan_I'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_perpanjang_penahanan_I($id);
			}
		}
	}

   public function load_perpanjang_penahanan_II($id)
	{	
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_II/index', $data);
		}
	}

	public function update_file_perpanjang_penahanan_II()
	{

		$this->form_validation->set_rules('file_perpanjang_penahanan_II', '', 'callback_file_perpanjang_penahanan_II');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_perpanjang_penahanan_II($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_perpanjang_penahanan_II']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_perpanjang_penahanan_II'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_II/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_perpanjang_penahanan_II = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'perpanjang_penahanan_II'			=> $this->input->post('perpanjang_penahanan_II'),
								  'file_perpanjang_penahanan_II'		=> $file_perpanjang_penahanan_II['file_name'],
								  'tanggal_perpanjang_penahanan_II'	=> $this->input->post('tanggal_perpanjang_penahanan_II'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_II);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_perpanjang_penahanan_II($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');
				$data = array('id_users' 						=> $this->session->userdata('id'),
							  'perpanjang_penahanan_II'			=> $this->input->post('perpanjang_penahanan_II'),
						   	  'tanggal_perpanjang_penahanan_II'	=> $this->input->post('tanggal_perpanjang_penahanan_II'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_perpanjang_penahanan_II($id);
			}
		}
	}

	public function load_perpanjang_penahanan_III($id)
	{
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_III/index', $data);
		}
	}

	public function update_file_perpanjang_penahanan_III()
	{

		$this->form_validation->set_rules('file_perpanjang_penahanan_III', '', 'callback_file_perpanjang_penahanan_III');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_perpanjang_penahanan_III($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_perpanjang_penahanan_III']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_perpanjang_penahanan_III'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan_III/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_perpanjang_penahanan_III = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'perpanjang_penahanan_III'			=> $this->input->post('perpanjang_penahanan_III'),
								  'file_perpanjang_penahanan_III'		=> $file_perpanjang_penahanan_III['file_name'],
								  'tanggal_perpanjang_penahanan_III'	=> $this->input->post('tanggal_perpanjang_penahanan_III'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_III);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_perpanjang_penahanan_III($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');
				$data = array('id_users' 						=> $this->session->userdata('id'),
							  'perpanjang_penahanan_III'			=> $this->input->post('perpanjang_penahanan_III'),
						   	  'tanggal_perpanjang_penahanan_III'	=> $this->input->post('tanggal_perpanjang_penahanan_III'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_perpanjang_penahanan_III($id);
			}
		}
	}

	public function load_putusan($id)
	{	
		$cek_id = $this->m_pengadilan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_pengadilan->tampil($id);
    		$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_putusan/index', $data);
		}
	}

	public function update_file_putusan()
	{

		$this->form_validation->set_rules('file_putusan', '', 'callback_file_putusan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_putusan($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/pengadilan';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_putusan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_putusan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/pengadilan/data_jadwal/ubah_jadwal/file_putusan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');
					$file_putusan = $this->upload->data();
					$data = array('id_users'			=> $this->session->userdata('id'),
								  'putusan'				=> $this->input->post('putusan'),
								  'file_putusan'		=> $file_putusan['file_name'],
								  'tanggal_putusan'		=> $this->input->post('tanggal_putusan'));
					
					$file = $this->m_pengadilan->tampil($id);
					@unlink('./uploads/pengadilan/'. $file->file_putusan);
					$this->m_pengadilan->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_putusan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');
				$data = array('id_users'			=> $this->session->userdata('id'),
							  'putusan'				=> $this->input->post('putusan'),
							  'tanggal_putusan'		=> $this->input->post('tanggal_putusan'));

				$this->m_pengadilan->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_putusan($id);
			}
		}
	}


	// callback validate 7 files//

	public function file_pelimpahan_berkas($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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

	public function file_penetapan_hari_sidang($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['file_penetapan_hari_sidang']['name']);
        if($_FILES['file_penetapan_hari_sidang']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penetapan_hari_sidang', 'Pilih file penetapan hari sidang hanya pdf.');
                return false;
            }
        }
    }

    public function file_penahanan($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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


    public function file_perpanjang_penahanan_I($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_I']['name']);
        if($_FILES['file_perpanjang_penahanan_I']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_I', 'Pilih perpanjang penahanan I hanya pdf.');
                return false;
            }
        }
    }

    public function file_perpanjang_penahanan_II($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_II']['name']);
        if($_FILES['file_perpanjang_penahanan_II']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_II', 'Pilih file perpanjang penahanan II  hanya pdf.');
                return false;
            }
        }
    }

     public function file_perpanjang_penahanan_III($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_III']['name']);
        if($_FILES['file_perpanjang_penahanan_III']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_III', 'Pilih file perpanjang penahanan III  hanya pdf.');
                return false;
            }
        }
    }

    public function file_putusan($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['file_putusan']['name']);
        if($_FILES['file_putusan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_putusan', 'Pilih file putusan hanya pdf.');
                return false;
            }
        }
    }
}
