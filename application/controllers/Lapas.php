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
		$this->load->model('m_bon');
		$this->output->enable_profiler(FALSE);
		
	}
	public function index()
	{
		$data['data'] = $this->m_lapas->bon();
        $this->template->load('pages/template/template','pages/lapas/bon_masuk/content', $data);
	}

    public function form_balas($id)
	{
		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh Kosong!'));
        $this->form_validation->set_rules('file_pengajuan_bon', '', 'callback_file_pengajuan_bon');
        $this->form_validation->set_error_delimiters('<span style="color:red;">','</span>');


        if ($this->form_validation->run() == FALSE) 
        {
            // cek apakah data berdasarkan id sudah dibalas di table balas bon
            $cek_balas = $this->m_lapas->cek_balas($id);
            
            $value = $this->m_lapas->cek_id($id);

            if ($cek_balas->num_rows() > 0) 
            {
            $this->session->set_flashdata('cek', '<div class="alert alert-danger" role="alert">Opps! Bon sudah dibalas!</div>');
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
    
            if (!empty($this->upload->do_upload('file_pengajuan_bon')))
            {
                $file_pengajuan_bon = $this->upload->data();
            }
            $post = $this->input->post(NULL, TRUE);    
            $data = array( 'id_bon'        		 => $post['id_bon'],
                           'id_users_lapas'      => $this->session->userdata('id'),
                           'id_users_pemohon'    => $post['id_users_pemohon'],
                           'nama_tersangka'      => $post['nama_tersangka'],
                           'file_pengajuan_bon'	 => $file_pengajuan_bon['file_name'], 
                           'keterangan'          => $post['keterangan']);

            $this->m_lapas->balas_bon($data, $id);  
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Bon berhasil dibalas</div>');
            redirect('lapas');         
        }
	}

	public function file_pengajuan_bon($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_pengajuan_bon']['name']);
        if($_FILES['file_pengajuan_bon']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pengajuan_bon', 'Pilih file pengajuan bon hanya word atau pdf.');
                return false;
            }
        }
        else
        {
        	$this->form_validation->set_message('file_pengajuan_bon', 'file pengajuan bon tidak boleh kosong!');
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
