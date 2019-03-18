<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_data_kepolisian extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kejaksaan_cobamasuk_ubah_data_kepolisian();
		$this->pengadilan_cobamasuk_ubah_datakepolisian();
		$this->lapas_cobamasuk_ubah_data_kepolisian();
		$this->load->helper('file');
		$this->load->model('m_kepolisian');
	}
	public function index($id)
	{		
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
			$data['data'] = $this->m_kepolisian->tampil($id);
			$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_penangkapan/index', $data);
		}
	}

	public function update_file_penangkapan()
	{

		$this->form_validation->set_rules('file_penangkapan', '', 'callback_file_penangkapan');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->index($id);			
		}
		else
		{
			$config['upload_path']          = './uploads/kepolisian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
			if ($_FILES['file_penangkapan']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_penangkapan'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_penangkapan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_penangkapan = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_penangkapan'			=> $file_penangkapan['file_name'],
								  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_penangkapan);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasi di simpan</div>');
					return $this->index($id);			

				}
			}
			else
			{
					$id = $this->input->post('id_data');
					$data = array('id_users' 					=> $this->session->userdata('id'),
							   	   'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'));

					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">Berhasil di simpan</div>');
					return $this->index($id);

			}
		}
	}

	public function load_ijin_sita($id)
	{	
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{	
    		$data['data'] = $this->m_kepolisian->tampil($id);
    		$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_ijin_sita/index', $data);
		}
	}

	public function update_file_ijin_sita()
	{

		$this->form_validation->set_rules('file_ijin_sita', '', 'callback_file_ijin_sita');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_ijin_sita($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kepolisian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_ijin_sita']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_ijin_sita'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_ijin_sita/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_ijin_sita = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_ijin_sita'				=> $file_ijin_sita['file_name'],
								  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_ijin_sita);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_ijin_sita($id);			

				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 					=> $this->session->userdata('id'),
						   	   'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'));

				$this->m_kepolisian->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_ijin_sita($id);

			}
		}
	}

    public function load_ijin_geledah($id)
	{	
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
	    	$data['data'] = $this->m_kepolisian->tampil($id);
	    	$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_ijin_geledah/index', $data);
		}
	}

	public function update_file_ijin_geledah()
	{

		$this->form_validation->set_rules('file_ijin_geledah', '', 'callback_file_ijin_geledah');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"alert-dismissible fade show role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) 
		{
			$id = $this->input->post('id_data');
			return $this->load_ijin_geledah($id);			
		}
		else
		{
				
			$config['upload_path']          = './uploads/kepolisian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($_FILES['file_ijin_geledah']['error'] <> 4)
			{
				if (!$this->upload->do_upload('file_ijin_geledah'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_ijin_geledah/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_ijin_geledah = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_ijin_geledah'			=> $file_ijin_geledah['file_name'],
								  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_ijin_geledah);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_ijin_geledah($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 					=> $this->session->userdata('id'),
						   	   'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'));

				$this->m_kepolisian->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_ijin_geledah($id);

			}
		}
	}

	public function load_pelimpahan($id)
	{	
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
	    	$data['data'] = $this->m_kepolisian->tampil($id);
	    	$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_pelimpahan/index', $data);
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
				
			$config['upload_path']          = './uploads/kepolisian';
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
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_pelimpahan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_pelimpahan = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_pelimpahan'				=> $file_pelimpahan['file_name'],
								  'tanggal_pelimpahan'		=> $this->input->post('tanggal_pelimpahan'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_pelimpahan);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_pelimpahan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 				=> $this->session->userdata('id'),
						   	  'tanggal_pelimpahan'		=> $this->input->post('tanggal_pelimpahan'));

				$this->m_kepolisian->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_pelimpahan($id);

			}
		}
	}

	public function load_penahanan($id)
	{	
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
	    	$data['data'] = $this->m_kepolisian->tampil($id);
	    	$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_penahanan/index', $data);
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
				
			$config['upload_path']          = './uploads/kepolisian';
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
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_penahanan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_penahanan = $this->upload->data();
					$data = array('id_users' 					=> $this->session->userdata('id'),
								  'file_penahanan'				=> $file_penahanan['file_name'],
								  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_penahanan);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_penahanan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 				=> $this->session->userdata('id'),
						   	  'tanggal_penahanan'		=> $this->input->post('tanggal_penahanan'));

				$this->m_kepolisian->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_penahanan($id);

			}
		}
	}
	

	public function load_perpanjang_penahanan($id)
	{	
		$cek_id = $this->m_kepolisian->cek_id($id);
		if ($cek_id->num_rows() == 0) 
		{
			show_404();
		}
		else
		{		
    		$data['data'] = $this->m_kepolisian->tampil($id);
    		$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_perpanjang_penahanan/index', $data);
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
				
			$config['upload_path']          = './uploads/kepolisian';
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
					$this->load->view('pages/kepolisian/data_jadwal/ubah_jadwal/file_perpanjang_penahanan/index', $error);
				}
				else
				{
					$id = $this->input->post('id_data');
					$file_perpanjang_penahanan = $this->upload->data();
					$data = array('id_users' 						=> $this->session->userdata('id'),
								  'file_perpanjang_penahanan'		=> $file_perpanjang_penahanan['file_name'],
								  'tanggal_perpanjang_penahanan'	=> $this->input->post('tanggal_perpanjang_penahanan'));
					
					$file = $this->m_kepolisian->tampil($id);
					@unlink('./uploads/kepolisian/'. $file->file_perpanjang_penahanan);
					$this->m_kepolisian->ubah($id, $data);
					$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
					return $this->load_perpanjang_penahanan($id);			
				}
			}
			else
			{
				$id = $this->input->post('id_data');
				$data = array('id_users' 						=> $this->session->userdata('id'),
						   	  'tanggal_perpanjang_penahanan'	=> $this->input->post('tanggal_perpanjang_penahanan'));

				$this->m_kepolisian->ubah($id, $data);
				$this->session->set_flashdata('berhasil_diubah', '<div class="alert alert-success" role="alert">File di simpan</div>');
				return $this->load_perpanjang_penahanan($id);

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
        // else
        // {
        //     $this->form_validation->set_message('file_ijin_sita', 'Silahkan pilih file');
        //     return false;
        // }
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


    // public function simpan()
	// {
	// 	$config['upload_path']          = './uploads/kepolisian';
	// 	$config['allowed_types']        = 'pdf';
	// 	$config['max_size']             = 0;
	// 	$config['max_width']            = 0;
	// 	$config['max_height']           = 0;

	// 	$this->load->library('upload', $config);
	// 	if ($_FILES['file_penangkapan']['name']  || $_FILES['file_ijin_sita']['name']  || $_FILES['file_ijin_geledah']['name']  || $_FILES['file_pelimpahan']['name']  || $_FILES['file_penahanan']['name']  || $_FILES['file_perpanjang_penahanan']['name'] ) 
	// 	{
	// 		if (!empty($this->upload->do_upload('file_penangkapan')))
	// 		{
	// 			$file_penangkapan = $this->upload->data();
	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);

	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_penangkapan'			=> $file_penangkapan['file_name'],  
	// 						  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 						  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 						  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 						  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 						  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 						  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'));

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->file_penangkapan);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal'));  
	// 		}
	// 		if (!empty($this->upload->do_upload('file_ijin_sita'))) 
	// 		{
	// 			$file_ijin_sita = $this->upload->data(); 
	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);
				
	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_ijin_sita'				=> $file_ijin_sita['file_name'],  
	// 						  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 						  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 						  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 						  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 						  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 						  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'));

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->file_ijin_sita);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal'));  
	// 		}
	// 		if (!empty($this->upload->do_upload('file_ijin_geledah'))) 
	// 		{
	// 			$file_ijin_geledah 			= $this->upload->data(); 
	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);
				
	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_ijin_geledah'			=> $file_ijin_geledah['file_name'],  
	// 						  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 						  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 						  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 						  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 						  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 						  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'));

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->ijin_geledah);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal'));  
	// 		}
	// 		if (!empty($this->upload->do_upload('file_pelimpahan'))) 
	// 		{
	// 			$file_pelimpahan 			= $this->upload->data();
	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);
				
	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_pelimpahan'				=> $file_pelimpahan['file_name'],  
	// 						  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 						  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 						  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 						  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 						  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 						  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'));

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->pelimpahan);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal'));  
	// 		}
	// 		if (!empty($this->upload->do_upload('file_penahanan')))
	// 		{
	// 			$file_penahanan 			= $this->upload->data();

	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);
				
	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_penahanan'				=> $file_penahanan['file_name']  
	// 						);

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->file_penahanan);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal')); 

	// 		}
	// 		if (!empty($this->upload->do_upload('file_perpanjang_penahanan')))
	// 		{
	// 			$file_perpanjang_penahanan 	= $this->upload->data(); 
	// 			$id 	= $this->input->post('id_data', TRUE);
	// 			$deskripsi 	= $this->input->post('deskripsi', TRUE);
				
	// 			$data = array('id_users' 					=> $this->session->userdata('id'),
	// 						  'deskripsi'					=> $deskripsi,
	// 						  'penangkapan'					=> $this->input->post('penangkapan'),
	// 						  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 						  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 						  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 						  'penahanan'					=> $this->input->post('penahanan'),
	// 						  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 						  'file_perpanjang_penahanan'	=> $file_perpanjang_penahanan['file_name'],  
	// 						  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 						  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 						  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 						  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 						  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 						  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan'));

	// 			$file = $this->m_kepolisian->tampil($id);

	// 			@unlink('./uploads/kepolisian/'. $file->file_perpanjang_penahanan);

	// 			$this->m_kepolisian->ubah($id, $data);
	// 			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');
	// 			redirect(base_url('kepolisian/data_jadwal'));	
	// 		}

	// 	}
	// 	else
	// 	{
	// 		// $file_penangkapan = $this->upload->do_upload('file_perpanjang_penahanan');
	// 		$id 	= $this->input->post('id_data', TRUE);	
	// 		$deskripsi 	= $this->input->post('deskripsi', TRUE);
	// 		$url  = md5(uniqid());
	// 		$data = array('id_users' 					=> $this->session->userdata('id'),
	// 					  'deskripsi'					=> $deskripsi,
	// 					  'penangkapan'					=> $this->input->post('penangkapan'),
	// 					  'ijin_sita'					=> $this->input->post('ijin_sita'),
	// 					  'ijin_geledah'				=> $this->input->post('ijin_geledah'),
	// 					  'pelimpahan'					=> $this->input->post('pelimpahan'),
	// 					  'penahanan'					=> $this->input->post('penahanan'),
	// 					  'perpanjang_penahanan'		=> $this->input->post('perpanjang_penahanan'),
	// 					  'tanggal_penangkapan'			=> $this->input->post('tanggal_penangkapan'),
	// 					  'tanggal_ijin_sita'			=> $this->input->post('tanggal_ijin_sita'),
	// 					  'tanggal_ijin_geledah'		=> $this->input->post('tanggal_ijin_geledah'),
	// 					  'tanggal_pelimpahan'			=> $this->input->post('tanggal_pelimpahan'),
	// 					  'tanggal_penahanan'			=> $this->input->post('tanggal_penahanan'),
	// 					  'tanggal_perpanjang_penahanan'=> $this->input->post('tanggal_perpanjang_penahanan')
	// 					);
	// 		$this->m_kepolisian->ubah($id,$data);	
	// 		$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di simpan</div>');	
	// 		redirect(base_url('kepolisian/data_jadwal'));		
	// 	}
		
	// }
}
