<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan_surat extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kepolisian_cobamasuk_pengadilan();
		kejaksaan_cobamasuk_pengadilan();
		lapas_cobamasuk_pengadilan();
		superadmin_cobamasuk_pengadilan();
		$this->load->model('m_pengadilan_surat');
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

    public function t_6($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['t_6']['name']);
        if($_FILES['t_6']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('t_6', 'Pilih file T-6 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('t_6', 'file T-6 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function t_7($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['t_7']['name']);
        if($_FILES['t_7']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('t_7', 'Pilih file T-7 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
                   $this->form_validation->set_message('t_7', 'file T-7 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function t_10($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['t_10']['name']);
        if($_FILES['t_10']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('t_10', 'Pilih file T-10 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('t_10', 'file T-10 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function p_29($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['p_29']['name']);
        if($_FILES['p_29']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_29', 'Pilih file P-29 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('p_29', 'file P-29 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function p_31($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['p_31']['name']);
        if($_FILES['p_31']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_31', 'Pilih file P-31 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('p_31', 'file P-31 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function p_32($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['p_32']['name']);
        if($_FILES['p_32']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_32', 'Pilih file P-32 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('p_32', 'file P-32 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function p_42($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['p_42']['name']);
        if($_FILES['p_42']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_42', 'Pilih file P-42 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('p_42', 'file P-42 tidak boleh kosong.');
               return false;
            }
        }
    }

    public function p_48($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['p_48']['name']);
        if($_FILES['p_48']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_48', 'Pilih file P-48 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('p_48', 'file P-48 tidak boleh kosong.');
               return false;
            }
        }
    }
     
    public function ba_17($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['ba_17']['name']);
        if($_FILES['ba_17']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ba_17', 'Pilih file BA-17 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
               $this->form_validation->set_message('ba_17', 'file BA-17 tidak boleh kosong.');
               return false;
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
