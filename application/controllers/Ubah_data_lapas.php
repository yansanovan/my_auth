<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_data_lapas extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kejaksaan_cobamasuk_lapas();
		$this->kepolisian_cobamasuk_lapas();
		$this->pengadilan_cobamasuk_lapas();
		$this->load->helper('file');
		$this->load->model('m_lapas');

	}
	public function load_eksekusi($id)
	{	
		$cek_id = $this->m_lapas->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_lapas->tampil($id);
    		$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_eksekusi/index', $data);	
		}
	}

	public function update_file_eksekusi()
	{

		$this->form_validation->set_rules('file_eksekusi', '', 'callback_file_eksekusi');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_eksekusi($id);			
		}
		else
		{
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_eksekusi']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_eksekusi'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_eksekusi/index', $error);
				}
				else
				{
					$id  = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_eksekusi = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'eksekusi'					=> $this->input->post('eksekusi'),
								  'file_eksekusi'				=> $file_eksekusi['file_name'],
								  'tanggal_eksekusi'			=> $this->input->post('tanggal_eksekusi'));
					
					$file = $this->m_lapas->tampil($id);
					@unlink('./uploads/lapas/'. $file->file_eksekusi);
					$this->m_lapas->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->load_eksekusi($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');

				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'eksekusi'					=> $this->input->post('eksekusi'),
						   	  'tanggal_eksekusi'			=> $this->input->post('tanggal_eksekusi'));

				$this->m_lapas->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
				return $this->load_eksekusi($id);
			}
		}
	}

	public function load_isi_putusan($id)
	{		
		$cek_id = $this->m_lapas->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_lapas->tampil($id);
    		$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_isi_putusan/index', $data);
		}
	}

	public function update_file_isi_putusan()
	{

		$this->form_validation->set_rules('file_isi_putusan', '', 'callback_file_isi_putusan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_isi_putusan($id);			
		}
		else
		{
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_isi_putusan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_isi_putusan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_isi_putusan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_isi_putusan = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'isi_putusan'						=> $this->input->post('isi_putusan'),
								  'file_isi_putusan'				=> $file_isi_putusan['file_name'],
								  'tanggal_isi_putusan'				=> $this->input->post('tanggal_isi_putusan'));
					
					$file = $this->m_lapas->tampil($id);
					@unlink('./uploads/lapas/'. $file->file_isi_putusan);
					$this->m_lapas->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->load_isi_putusan($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');

				$data = array('id_users' 					=> $this->session->userdata('id'),
							  'isi_putusan'					=> $this->input->post('isi_putusan'),	  
						   	  'tanggal_isi_putusan'			=> $this->input->post('tanggal_isi_putusan'));

				$this->m_lapas->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
				return $this->load_isi_putusan($id);
			}
		}
	}

	public function load_pembebasan_bersyarat($id)
	{		
    	$cek_id = $this->m_lapas->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_lapas->tampil($id);
    		$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_pembebasan_bersyarat/index', $data);
		}
	}

	public function update_file_pembebasan_bersyarat()
	{

		$this->form_validation->set_rules('file_pembebasan_bersyarat', '', 'callback_file_pembebasan_bersyarat');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_pembebasan_bersyarat($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_pembebasan_bersyarat']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_pembebasan_bersyarat'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_pembebasan_bersyarat/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_pembebasan_bersyarat = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'pembebasan_bersyarat'		=> $this->input->post('pembebasan_bersyarat'),
								  'file_pembebasan_bersyarat'	=> $file_pembebasan_bersyarat['file_name'],
								  'tanggal_pembebasan_bersyarat'=> $this->input->post('tanggal_pembebasan_bersyarat'));
					
					$file = $this->m_lapas->tampil($id);
					@unlink('./uploads/lapas/'. $file->file_pembebasan_bersyarat);
					$this->m_lapas->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_pembebasan_bersyarat($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');

				$data = array('id_users' 				=> $this->session->userdata('id'),
							  'pembebasan_bersyarat'		=> $this->input->post('pembebasan_bersyarat'),
						   	  'tanggal_pembebasan_bersyarat'		=> $this->input->post('tanggal_pembebasan_bersyarat'));

				$this->m_lapas->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_pembebasan_bersyarat($id);
			}
		}
	}


	public function load_remisi($id)
	{		
    	$cek_id = $this->m_lapas->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_lapas->tampil($id);
    		$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_remisi/index', $data);
		}
	}

	public function update_file_remisi()
	{

		$this->form_validation->set_rules('file_remisi', '', 'callback_file_remisi');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_remisi($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_remisi']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_remisi'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_remisi/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_remisi = $this->upload->data();
					$data = array('id_users' 		=> $this->session->userdata('id'),
								  'remisi'			=> $this->input->post('remisi'),
								  'file_remisi'		=> $file_remisi['file_name'],
								  'tanggal_remisi'	=> $this->input->post('tanggal_remisi'));
					
					$file = $this->m_lapas->tampil($id);
					@unlink('./uploads/lapas/'. $file->file_remisi);
					$this->m_lapas->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_remisi($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');

				$data = array('id_users' 		=> $this->session->userdata('id'),
							  'remisi'			=> $this->input->post('remisi'),
							  'tanggal_remisi'	=> $this->input->post('tanggal_remisi'));

				$this->m_lapas->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_remisi($id);
			}
		}
	}

   public function load_bebas($id)
	{		
		$cek_id = $this->m_lapas->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_lapas->tampil($id);
	    	$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_bebas/index', $data);
		}
	}

	public function update_file_bebas()
	{

		$this->form_validation->set_rules('file_bebas', '', 'callback_file_bebas');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_bebas($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/lapas';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_bebas']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_bebas'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/lapas/data_jadwal/ubah_jadwal/file_bebas/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$url = $this->input->post('url');

					$file_bebas = $this->upload->data();
					$data = array('id_users'		=> $this->session->userdata('id'),
								  'bebas'			=> $this->input->post('bebas'),
								  'file_bebas'		=> $file_bebas['file_name'],
								  'tanggal_bebas'	=> $this->input->post('tanggal_bebas'));
					
					$file = $this->m_lapas->tampil($id);
					@unlink('./uploads/lapas/'. $file->file_bebas);
					$this->m_lapas->ubah($id, $data, $url);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_bebas($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$url = $this->input->post('url');
				
				$data = array('id_users'		=> $this->session->userdata('id'),
							  'bebas'			=> $this->input->post('bebas'),
							  'tanggal_bebas'	=> $this->input->post('tanggal_bebas'));

				$this->m_lapas->ubah($id, $data, $url);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_bebas($id);
			}
		}
	}

	//validate callback 6 files

	public function file_eksekusi($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
}
