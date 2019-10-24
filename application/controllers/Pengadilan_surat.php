<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan_surat extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_is_logged();
        kepolisian_coba_masuk();
		kejaksaan_coba_masuk();
        lapas_coba_masuk();
        superadmin_coba_masuk();
	}

	public function index()
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan();
        $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/content', $data);
    }

    public function detail($id_surat)
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan(base64_decode($id_surat))->row();
        $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/detail/content', $data);
    }

    public function riwayat_balas()
    {
        $data['data'] = $this->m_pengadilan_surat->riwayat_balas();
        $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/riwayat_balas/content', $data);
    }

    public function validate()
    {
         $config = array(
                array(  'field' => 't_6',
                        'label' => '',
                        'rules' => 'callback_t_6'),

                array(  'field' => 't_7',
                        'label' => '',
                        'rules' => 'callback_t_7'),

                array(  'field' => 't_10',
                        'label' => 'T-10',
                        'rules' => 'callback_t_10'),

                array(  'field' => 'p_29',
                        'label' => '',
                        'rules' => 'callback_p_29'),

                array(  'field' => 'p_31',
                        'label' => '',
                        'rules' => 'callback_p_31'),

                array(  'field' => 'p_32',
                        'label' => '',
                        'rules' => 'callback_p_32'),

                array(  'field' => 'p_42',
                        'label' => '',
                        'rules' => 'callback_p_42'),

                array(  'field' => 'p_48',
                        'label' => '',
                        'rules' => 'callback_p_48'),

                array(  'field' => 'ba_17',
                        'label' => '',
                        'rules' => 'callback_ba_17'));
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        $this->form_validation->set_rules($config);

        return true;
    }

    public function form_balas($id_surat_balas)
	{
    	$this->validate();

        if ($this->form_validation->run() == FALSE) 
        {
            $cek_balas = $this->m_pengadilan_surat->cek_balas_surat(base64_decode($id_surat_balas));
            $data = $this->m_pengadilan_surat->surat_kejaksaan(base64_decode($id_surat_balas));
            if ($cek_balas->num_rows() > 0) 
            {
                $this->m_pesan->generatePesan('cek','Maaf surat ini sudah dibalas');
                redirect('pengadilan_surat');
            }
            else
            {
                if ($data->num_rows() > 0) 
                {
                    $value['value'] = $data->row();
                    $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/form_balas/content', $value);
                }   
                else
                {
                    redirect('pengadilan_surat');
                }
            }
        }
        else
        {
	        $query = $this->m_pengadilan_surat->simpan($id_surat_balas); 
            if ($query == true) {
	            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
	            redirect('pengadilan_surat');          
            }
    	}
    }

    public function edit()
    {
        $this->validate();
        $id_surat = $this->uri->segment(3);

        if ($this->form_validation->run() == FALSE) 
        {
            $data = $this->m_pengadilan_surat->riwayat_balas(base64_decode($id_surat));
            if($data->num_rows() == 0)
            {
                redirect('pengadilan_surat/riwayat_balas');
            }
            else
            {
                $value['action'] = 'edit';
                $value['value'] = $this->m_pengadilan_surat->riwayat_balas(base64_decode($id_surat))->row();
                $this->template->load('pages/template/template','pages/pengadilan/surat_kejaksaan/form_edit/content', $value);
            }
        }
        else
        {
            $update = $this->m_pengadilan_surat->edit();
            if ($update) {
                $this->m_pesan->generatePesan('berhasil', 'Surat belasan telah di update!');
                redirect(current_url());            
            }
        }
    }


    public function hapus($id)
    {   
        $file = $this->m_pengadilan_surat->riwayat_balas(base64_decode($id))->row();

        @unlink('./uploads/pengadilan/'. $file->t_6);
        @unlink('./uploads/pengadilan/'. $file->t_7);
        @unlink('./uploads/pengadilan/'. $file->t_10);
        @unlink('./uploads/pengadilan/'. $file->p_29);
        @unlink('./uploads/pengadilan/'. $file->p_31);
        @unlink('./uploads/pengadilan/'. $file->p_32);
        @unlink('./uploads/pengadilan/'. $file->p_42);
        @unlink('./uploads/pengadilan/'. $file->p_48);
        @unlink('./uploads/pengadilan/'. $file->ba_17);


        $hapus = $this->m_pengadilan_surat->hapus(base64_decode($id));

        if ($hapus = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil','Surat balasan telah dihapus');
            redirect('pengadilan_surat/riwayat_balas');
        }
    }

    public function unduh()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/kejaksaan/'.$this->uri->segment(3); 
            force_download($file, NULL);
        }
        else
        {
            show_404();
        }
    
        force_download($data, null);
    }
}
