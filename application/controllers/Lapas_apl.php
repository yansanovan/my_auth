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
        $this->load->model('m_apl');
	}
	public function index()
	{
        $data['data'] = $this->m_apl->apl();
        $this->template->load('pages/template/template','pages/lapas/apl_masuk/content', $data);
	}

    public function form_balas($id)
	{
		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh Kosong!'));
        $this->form_validation->set_rules('file_pengajuan_apl', '', 'callback_file_pengajuan_apl');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
        if ($this->form_validation->run() == FALSE) 
        {
            // cek apakah data berdasarkan id sudah dibalas di table balas bon
            $cek_balas = $this->m_apl->cek_balas($id);
            
            $value = $this->m_apl->cek_id($id);

            if ($cek_balas->num_rows() > 0) 
            {
                 $this->session->set_flashdata('cek', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i>Opps, Maaf!</h4>
                Bon ini Sudah dibalas!
                </div>');
                redirect('lapas');
            }
            else
            {
                // cek apakah id data ada di table bon, jika ada tampilkan form
                if ($value->num_rows() > 0) 
                {
                    $data['data'] = $value->row();
                    $this->template->load('pages/template/template','pages/lapas/form_balas/content', $data);
                }   
                else
                {
                    redirect('lapas');
                }
            }
        }
        else
        {
          
            $config['upload_path']          = './uploads/lapas/bon';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
    
            if (!empty($this->upload->do_upload('file_pengajuan_apl')))
            {
                $file_pengajuan_apl = $this->upload->data();
            }
            $post = $this->input->post(NULL, TRUE);    
            $data = array( 'id_bon_balasan'        		 => $post['id_bon'],
                           'id_users_pemohon_balasan'    => $post['id_users_pemohon'],
                           'id_users_lapas'              => $this->session->userdata('id'),
                           'file_pengajuan_apl'	         => $file_pengajuan_apl['file_name'], 
                           'keterangan'                  => $post['keterangan']);

            $this->m_apl->balas_bon($data, $id);  
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Bon berhasil dibalas</div>');
            redirect('lapas');         
        }
	}

    public function riwayat_balas()
    {
        $data['data'] = $this->m_apl->riwayat_balas();
        $this->template->load('pages/template/template','pages/lapas/riwayat_balas_apl/content', $data);
    }


	public function file_pengajuan_apl($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_pengajuan_apl']['name']);
        if($_FILES['file_pengajuan_apl']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pengajuan_apl', 'Pilih file balas bon hanya word atau pdf.');
                return false;
            }
        }
        else
        {
        	$this->form_validation->set_message('file_pengajuan_apl', 'file balas bon tidak boleh kosong.');
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
