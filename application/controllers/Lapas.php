<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapas extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_is_logged();
		kepolisian_coba_masuk();
		kejaksaan_coba_masuk();
        superadmin_coba_masuk();
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
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
        if ($this->form_validation->run() == FALSE) 
        {
            // cek apakah data berdasarkan id sudah dibalas di table balas bon
            $cek_balas = $this->m_lapas->cek_balas(base64_decode($id));
            
            $value = $this->m_lapas->cek_id(base64_decode($id));

            if ($cek_balas->num_rows() > 0) 
            {
                $this->m_pesan->generatePesan('cek', 'Maaf! Bon ini sudah di balas!');
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
            $data = array( 'id_bon_balasan'        		 => $post['id_bon'],
                           'id_users_pemohon_balasan'    => $post['id_users_pemohon'],
                           'id_users_lapas'              => $this->session->userdata('id'),
                           'file_pengajuan_bon'	         => $file_pengajuan_bon['file_name']);

            $this->m_lapas->balas_bon($data, $id);  
            $this->m_pesan->generatePesan('berhasil', 'Bon telah dibalas!');
            redirect('lapas');         
        }
	}

    public function riwayat_balas_bon()
    {
        $data['data'] = $this->m_lapas->riwayat_balas_bon();
        $this->template->load('pages/template/template','pages/lapas/riwayat_balas_bon/content', $data);
    }

    public function edit($id)
    {
        
        $this->form_validation->set_rules('file_edit_balas_bon', '', 'callback_file_edit_balas_bon');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
        if ($this->form_validation->run() == FALSE) 
        {
            // cek apakah data berdasarkan id sudah dibalas di table balas bon
            $cek_balas = $this->m_lapas->cek_balas(base64_decode($id));

            if ($cek_balas->num_rows() > 0) 
            {
                $data['data'] = $cek_balas->row();
                $data['action'] = "edit";
                $this->template->load('pages/template/template','pages/lapas/form_edit/content', $data);
            }
            else
            {
                redirect(current_url());
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

            $post = $this->input->post(NULL, TRUE);    
            
            if (!empty($this->upload->do_upload('file_edit_balas_bon')))
            {
                $file_pengajuan_bon = $this->upload->data('file_name');
                $this->db->set('file_pengajuan_bon', $file_pengajuan_bon);
                @unlink('./uploads/lapas/bon/'. $post['old_bon_balasan']);
            }
            $data = array('tanggal_balas_bon' => $post['tanggal_balas_bon']);
            $this->db->where('id_bon_balasan', base64_decode($id));
            $this->db->update('tbl_balas_bon', $data);
            $this->m_pesan->generatePesan('berhasil', 'Bon ini telah di update!');
            redirect(current_url());
        }
    }

    public function hapus_bon_balas($id)
    {   
        $file = $this->m_lapas->bon($id);
        @unlink('./uploads/lapas/bon/'. $file->file_pengajuan_bon);

        $hapus = $this->m_lapas->hapus_bon_balas($id);
        if ($hapus = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil', 'Bon telah dihapus!');
            redirect('lapas/riwayat_balas_bon');
        }
    }

    public function file_edit_balas_bon($str)
    {         
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_edit_balas_bon']['name']);
        if($_FILES['file_edit_balas_bon']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_edit_balas_bon', 'Pilih file balas bon hanya word atau pdf.');
                return false;
            }
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
                $this->form_validation->set_message('file_pengajuan_bon', 'Pilih file balas bon hanya word atau pdf.');
                return false;
            }
        }
        else
        {
        	$this->form_validation->set_message('file_pengajuan_bon', 'file balas bon tidak boleh kosong.');
            return false;
        }
    }
    public function surat_polisi()
    {
        $data['kepolisian'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','pages/lapas/surat_polisi/content', $data);
    }

    public function detail_surat_polisi($url)
    {
        $data['data']   = $this->m_surat->surat_polisi(base64_decode($url));    
        $this->template->load('pages/template/template','pages/lapas/surat_polisi/detail/content', $data);
    }


    public function surat_kejaksaan()
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan();
        $this->template->load('pages/template/template','pages/lapas/surat_kejaksaan/content', $data);
    }

    public function detail_surat_kejaksaan($id_surat)
    {
        $data['data'] = $this->m_pengadilan_surat->surat_kejaksaan(base64_decode($id_surat))->row();
        $this->template->load('pages/template/template','pages/lapas/surat_kejaksaan/detail/content', $data);
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

    public function unduh_riwayat()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/lapas/bon/'.$this->uri->segment(3); 
        }
        else
        {
            show_404();
        }
        force_download($data, null);
    }

    public function unduh_surat_polisi()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/kepolisian/'.$this->uri->segment(3); 
        }
        else
        {
            show_404();
        }
    
        force_download($data, null);
    }

    public function unduh_surat_kejaksaan()
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
