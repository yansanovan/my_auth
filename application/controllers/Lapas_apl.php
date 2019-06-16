<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapas_apl extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kejaksaan_cobamasuk_lapas();
		kepolisian_cobamasuk_lapas();
		pengadilan_cobamasuk_lapas();
		superadmin_cobamasuk_lapas();
		
		$this->load->model('m_bon');
        $this->load->model('m_apl_balas');
	}
	public function index()
	{
        $data['data'] = $this->m_apl_balas->apl();
        $this->template->load('pages/template/template','pages/lapas/apl_masuk/content', $data);
	}

    public function form_balas($id)
	{
		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh Kosong!'));
        $this->form_validation->set_rules('file_apl_balasan', '', 'callback_file_apl_balasan');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
        if ($this->form_validation->run() == FALSE) 
        {
            // cek apakah data berdasarkan id sudah dibalas di table balas apl
            $cek_balas = $this->m_apl_balas->cek_balas_apl(base64_decode($id));
            
            $value = $this->m_apl_balas->apl(base64_decode($id));

            if ($cek_balas->num_rows() > 0) 
            {
                $this->m_pesan->generatePesan('cek', 'APL ini sudah dibalas');
                redirect('lapas_apl');
            }
            else
            {
                if ($value->num_rows() > 0) 
                {
                    $data['data'] = $value->row();
                    $this->template->load('pages/template/template','pages/lapas/form_balas_apl/content', $data);
                }   
                else
                {
                    redirect(current_url());
                }
            }
        }
        else
        {
          
            $config['upload_path']          = './uploads/lapas/apl';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
    
            if (!empty($this->upload->do_upload('file_apl_balasan')))
            {
                $file_apl_balasan = $this->upload->data();
            }
            $post = $this->input->post(NULL, TRUE);    
            $data = array( 'id_apl_balasan'      => $post['id'],
                           'id_users_apl'        => $post['id_users_apl'],
                           'id_users_lapas'      => $this->session->userdata('id'),
                           'file_apl_balasan'    => $file_apl_balasan['file_name']); 

            $this->m_apl_balas->balas_apl($data, $id);  
            $this->m_pesan->generatePesan('berhasil', 'APL berhasil dibalas');
            // $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">APL berhasil dibalas</div>');
            redirect('lapas_apl');         
        }
	}

    public function riwayat_balas_apl()
    {
        $data['data'] = $this->m_apl_balas->riwayat_balas_apl();
        $this->template->load('pages/template/template','pages/lapas/riwayat_balas_apl/content', $data);
    }


    public function hapus_apl_balasan($id)
    {   
        $file = $this->m_apl_balas->apl($id);
        @unlink('./uploads/lapas/apl/'. $file->file_apl_balasan);

        $hapus = $this->m_apl_balas->hapus_apl_balasan($id);
        if ($hapus = TRUE) 
        {
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">Bon terhapus</div>');
            redirect('lapas_apl/riwayat_balas_apl');
        }
    }

	public function file_apl_balasan($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_apl_balasan']['name']);
        if($_FILES['file_apl_balasan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_apl_balasan', 'Pilih file balas APL hanya word atau pdf.');
                return false;
            }
        }
        else
        {
        	$this->form_validation->set_message('file_apl_balasan', 'file balas APL tidak boleh kosong.');
            return false;
        }
    }

    public function unduh()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/bon/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }
}
