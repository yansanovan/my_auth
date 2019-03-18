<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_data_kejaksaan extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kepolisian_cobamasuk_kejaksaan();
		$this->pengadilan_cobamasuk_kejaksaan();
		$this->lapas_cobamasuk_kejaksaan();
		$this->load->helper('file');
		$this->load->model('m_kejaksaan');

	}
	public function load_pelimpahan_berkas($id)
	{	
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_pelimpahan_berkas/index', $data);
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
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_pelimpahan_berkas']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_pelimpahan_berkas'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_pelimpahan_berkas/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_pelimpahan_berkas = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_pelimpahan_berkas'		=> $file_pelimpahan_berkas['file_name'],
								  'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_pelimpahan_berkas);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->load_pelimpahan_berkas($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 					=> $this->session->userdata('id'),
						   	   'tanggal_pelimpahan_berkas'	=> $this->input->post('tanggal_pelimpahan_berkas'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
				return $this->load_pelimpahan_berkas($id);

			}
		}
	}

	public function load_tahap_I($id)
	{		
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
	    	$data['data'] = $this->m_kejaksaan->tampil($id);
	    	$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_tahap_I/index', $data);
		}
	}

	public function update_file_tahap_I()
	{

		$this->form_validation->set_rules('file_tahap_I', '', 'callback_file_tahap_I');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_tahap_I($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_tahap_I']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_tahap_I'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_tahap_I/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_tahap_I = $this->upload->data();
					$data = array('id_users' 				=> $this->session->userdata('id'),
								  'file_tahap_I'			=> $file_tahap_I['file_name'],
								  'tanggal_tahap_I'			=> $this->input->post('tanggal_tahap_I'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_tahap_I);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_tahap_I($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 					=> $this->session->userdata('id'),
						   	   'tanggal_tahap_I'			=> $this->input->post('tanggal_tahap_I'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_tahap_I($id);

			}
		}
	}

    public function load_tahap_II($id)
	{	
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_tahap_II/index', $data);
		}
	}

	public function update_file_tahap_II()
	{

		$this->form_validation->set_rules('file_tahap_II', '', 'callback_file_tahap_II');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_tahap_II($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_tahap_II']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_tahap_II'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_tahap_II/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_tahap_II = $this->upload->data();
					$data = array('id_users' 				=> $this->session->userdata('id'),
								  'file_tahap_II'			=> $file_tahap_II['file_name'],
								  'tanggal_tahap_II'		=> $this->input->post('tanggal_tahap_II'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_tahap_II);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_tahap_II($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 				=> $this->session->userdata('id'),
						   	   'tanggal_tahap_II'		=> $this->input->post('tanggal_tahap_II'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_tahap_II($id);

			}
		}
	}

	public function load_pelimpahan($id)
	{	
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_pelimpahan/index', $data);
		}
	}

	public function update_file_pelimpahan()
	{

		$this->form_validation->set_rules('file_pelimpahan', '', 'callback_file_pelimpahan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_pelimpahan($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_pelimpahan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_pelimpahan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_pelimpahan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_pelimpahan = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_pelimpahan'				=> $file_pelimpahan['file_name'],
								  'tanggal_pelimpahan'		=> $this->input->post('tanggal_pelimpahan'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_pelimpahan);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_pelimpahan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 				=> $this->session->userdata('id'),
						   	  'tanggal_pelimpahan'		=> $this->input->post('tanggal_pelimpahan'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_pelimpahan($id);

			}
		}
	}

	public function load_penahanan($id)
	{	
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_penahanan/index', $data);
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
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_penahanan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_penahanan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_penahanan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_penahanan = $this->upload->data();
					$data = array('id_users' 				=> $this->session->userdata('id'),
								  'file_penahanan'			=> $file_penahanan['file_name'],
								  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_penahanan);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_penahanan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 				=> $this->session->userdata('id'),
						   	  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_penahanan($id);
			}
		}
	}
	

	public function load_perpanjang_penahanan($id)
	{		
    	$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan/index', $data);
		}
	}

	public function update_file_perpanjang_penahanan()
	{

		$this->form_validation->set_rules('file_perpanjang_penahanan', '', 'callback_file_perpanjang_penahanan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_perpanjang_penahanan($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_perpanjang_penahanan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_perpanjang_penahanan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_perpanjang_penahanan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_perpanjang_penahanan = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'file_perpanjang_penahanan'		=> $file_perpanjang_penahanan['file_name'],
								  'tanggal_perpanjang_penahanan'	=> $this->input->post('tanggal_perpanjang_penahanan'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_perpanjang_penahanan);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_perpanjang_penahanan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 						=> $this->session->userdata('id'),
						   	  'tanggal_perpanjang_penahanan'	=> $this->input->post('tanggal_perpanjang_penahanan'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_perpanjang_penahanan($id);

			}
		}
	}

	public function load_eksekusi_putusan($id)
	{
		$cek_id = $this->m_kejaksaan->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
    		$data['data'] = $this->m_kejaksaan->tampil($id);
    		$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_eksekusi_putusan/index', $data);
		}
	}

	public function update_file_eksekusi_putusan()
	{

		$this->form_validation->set_rules('file_eksekusi_putusan', '', 'callback_file_eksekusi_putusan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_eksekusi_putusan($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kejaksaan';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_eksekusi_putusan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_eksekusi_putusan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kejaksaan/data_jadwal/ubah_jadwal/file_eksekusi_putusan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_eksekusi_putusan = $this->upload->data();
					$data = array('id_users' 				 => $this->session->userdata('id'),
								  'file_eksekusi_putusan'	 => $file_eksekusi_putusan['file_name'],
								  'tanggal_eksekusi_putusan' => $this->input->post('tanggal_eksekusi_putusan'));
					
					$file = $this->m_kejaksaan->tampil($id);
					@unlink('./uploads/kejaksaan/'. $file->file_eksekusi);
					$this->m_kejaksaan->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_eksekusi_putusan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 					=> $this->session->userdata('id'),
						   	  'tanggal_eksekusi_putusan'	=> $this->input->post('tanggal_eksekusi_putusan'));

				$this->m_kejaksaan->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_eksekusi_putusan($id);
			}
		}
	}


	// callback validate 7 files//

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
                $this->form_validation->set_message('file_tahap_I', 'Pilih file tahap I  hanya pdf.');
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
                $this->form_validation->set_message('file_tahap_II', 'Pilih file tahap II geledah hanya pdf.');
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
}
