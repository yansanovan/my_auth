<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apl extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		superadmin_coba_masuk();
	}

	public function index()
	{
		$data['data'] = $this->m_apl->apl_balasan();
        $this->template->load('pages/template/template','pages/apl/apl_balasan/content', $data);
	}

	public function form_apl()
	{
		$data['page'] = 'ENTRY';
		$data['action'] = 'add';
        $this->template->load('pages/template/template','pages/apl/form_apl/content', $data);
	}

	public function riwayat_apl()
	{
		$data['data'] = $this->m_apl->riwayat_apl();
        $this->template->load('pages/template/template','pages/apl/riwayat_apl/content', $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->m_apl->riwayat_apl(base64_decode($id));
		$data['page'] = 'EDIT';
		$data['action'] = 'edit';
        $this->template->load('pages/template/template','pages/apl/form_apl/content', $data);
	}

	public function proses()
	{
		if ($this->input->post('add')) {
			
		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh kosong.'));
		$this->form_validation->set_rules('file_apl', '', 'callback_file_apl');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
		
			if ($this->form_validation->run() == FALSE) 
			{
				$this->form_apl();
			}
			else
			{
				$config['upload_path']          = './uploads/apl';
				$config['allowed_types']        = 'pdf|doc|docx';
				$config['max_size']             = 0;
				$config['max_width']            = 0;
				$config['max_height']           = 0;

				$this->load->library('upload', $config);
		
				if (!empty($this->upload->do_upload('file_apl')))
				{
					$file_apl = $this->upload->data();
				}
				
					$post = $this->input->post(NULL, TRUE);
					$data = array('id_users_apl' 			=> $this->session->userdata('id'),
								  'nama_tersangka'			=> $post['nama_tersangka'],
								  'file_apl'				=> $file_apl['file_name']);

				$this->m_apl->simpan($data);
	            $this->m_pesan->generatePesan('berhasil', 'Apl telah di simpan dan terkirim!');
				redirect('apl/form_apl');			
			}
		}
		if ($this->input->post('edit')) {
			$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh kosong.'));
			$this->form_validation->set_rules('file_apl', '', 'callback_file_apl');
        	$this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');

			if ($this->form_validation->run() == FALSE) 
			{
				$this->edit($this->input->post('id_apl'));
			}
			else
			{
				$config['upload_path']          = './uploads/apl';
				$config['allowed_types']        = 'pdf|doc|docx';
				$config['max_size']             = 0;
				$config['max_width']            = 0;
				$config['max_height']           = 0;

				$this->load->library('upload', $config);
				
				$post = $this->input->post(NULL, TRUE);
		
                if (!empty($this->upload->do_upload('file_apl')))
                {
					$file_apl = $this->upload->data('file_name');
                    $this->db->set('file_apl', $file_apl);
                    @unlink('./uploads/apl/'. $post['file_lama']);
                }
	      
				$data = array('nama_tersangka' => $post['nama_tersangka']);
				$this->m_apl->ubah($data);	
	            $this->m_pesan->generatePesan('berhasil', 'Apl telah di update!');
				redirect(base_url('apl/edit/'.base64_encode($post['id_apl'])));
			}
		}
	}

	public function file_apl($str)
	{
        if ($this->input->post('edit')) 
        {
        	$allowed_mime_type_arr = array('application/pdf', 'application/msword');
	        $mime = get_mime_by_extension($_FILES['file_apl']['name']);
        
	        if($_FILES['file_apl']['name'])
	        {
	            if(in_array($mime, $allowed_mime_type_arr))
	            {
	                return true;
	            }
	            else
	            {
	                $this->form_validation->set_message('file_apl', 'Pilih file pengajuan bon hanya word atau pdf.');
	                return false;
	            }
	        }
        }
        else if ($this->input->post('add')) 
        {
	        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
	        $mime = get_mime_by_extension($_FILES['file_apl']['name']);
	        if($_FILES['file_apl']['name'])
	        {
	            if(in_array($mime, $allowed_mime_type_arr))
	            {
	                return true;
	            }
	            else
	            {
	                $this->form_validation->set_message('file_apl', 'Pilih file APL hanya word atau pdf.');
	                return false;
	            }
	        }
        	$this->form_validation->set_message('file_apl', 'File APL tidak boleh kosong.');
            return false;
        }
    }

    public function get_autocomplete()
	{
		$get = $this->input->get('term', TRUE);
		if (isset($get)) {
		  	$result = $this->m_apl->autocomplete_apl($get);
		   	if (count($result) > 0) 
		   	{
		    	foreach ($result as $row)
		     		
		     	$arr_result[] = array(
					'label'	=> $row->nama_tersangka
				);
		     	echo json_encode($arr_result);	
		   	}
		}
	}	

	public function hapus($id)
    {   
        $file = $this->m_apl->apl($id);
		@unlink('./uploads/apl/'. $file->file_apl);

        $hapus = $this->m_apl->hapus($id);
        if ($hapus = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil', 'Apl telah di hapus');
            redirect('apl/riwayat_apl');
        }
    }
    
    public function unduh()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/apl/'.$this->uri->segment(3); 
        }
        else
        {
            show_404();
        }
        force_download($data, null);
    }

}