<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kepolisian_cobamasuk_pengadilan();
		kejaksaan_cobamasuk_pengadilan();
		lapas_cobamasuk_pengadilan();
		superadmin_cobamasuk_pengadilan();
		$this->load->helper('file');
		$this->load->model('m_kepolisian');
		$this->load->model('m_pengadilan');
		$this->load->model('m_surat');
		// $this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$data['pengadilan'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','pages/pengadilan/surat_polisi/content', $data);
	}

	public function detail($url)
	{
		$data['data'] 	= $this->m_surat->surat_polisi($url);	
        $this->template->load('pages/template/template','pages/pengadilan/surat_polisi/detail/content', $data);
	}

    public function detail_balas($id)
    {
        $data['value'] = $this->m_surat->riwayat_balas_pn($id);
        $this->template->load('pages/template/template','pages/pengadilan/riwayat_balas/detail/content', $data);
    }

	public function riwayat_balas()
    {
        $data['data'] = $this->m_surat->riwayat_balas_pn();
        $this->template->load('pages/template/template','pages/pengadilan/riwayat_balas/content', $data);
    }

	public function form_balas($id)
	{
        $this->form_validation->set_rules('setuju_geledah', '', 'callback_setuju_geledah');
        $this->form_validation->set_rules('ijin_geledah', '', 'callback_ijin_geledah');
        $this->form_validation->set_rules('khusus', '', 'callback_khusus');
        $this->form_validation->set_rules('biasa', '', 'callback_biasa');
        $this->form_validation->set_rules('pengadilan', '', 'callback_pengadilan');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        

        if ($this->form_validation->run() == FALSE) 
        {
            $cek_balas = $this->m_surat->cek_balas_pengadilan(base64_decode($id));
            $data = $this->m_surat->cek_id(base64_decode($id));

            if ($cek_balas->num_rows() > 0) 
            {
            $this->session->set_flashdata('cek', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i>Opps, Maaf!</h4>
            Surat ini Sudah dibalas!
            </div>');
                redirect('pengadilan');
            }
            else
            {
                if ($data->num_rows() > 0) 
                {
                    $value['value'] = $data->row();
                    $this->template->load('pages/template/template','pages/pengadilan/form_balas/content', $value);
                }   
                else
                {
                    redirect('pengadilan');
                }
            }
        }
        else
        {
          
            $config['upload_path']          = './uploads/kepolisian/pengadilan';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
    
            if (!empty($this->upload->do_upload('setuju_geledah')))
            {   

                $setuju_geledah = $this->upload->data();
            }
            if (!empty($this->upload->do_upload('ijin_geledah'))) 
            {
                $ijin_geledah = $this->upload->data(); 
            }
            
            if (!empty($this->upload->do_upload('khusus')))
            {
                $khusus  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('biasa')))
            {
                $biasa  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('pengadilan')))
            {
                $pengadilan   = $this->upload->data(); 
            }

            $post = $this->input->post(NULL, TRUE);    
            $data = array( 'id_polisi_pn'           => $post['id_polisi'],
                           'id_surat_pn'            => $post['id_surat'],
                           'id_users_pn'            => $this->session->userdata('id'),
                           'ijin_geledah_pn'        => $ijin_geledah['file_name'],
                           'setuju_geledah_pn'      => $setuju_geledah['file_name'],
                           'khusus_pn'              => $khusus['file_name'],
                           'biasa_pn'               => $biasa['file_name'],
                           'pengadilan_pn'          => $pengadilan['file_name']);

            $now = date('Y-m-d H:i:s');
            $notification = array( 'id_polisi'           => $post['id_polisi'],
                                   'id_surat_balasan'    => $post['id_surat'],
                                   'id_users_pembalas'   => $this->session->userdata('id'),
                                   'notif_balasan'       => 0,
                                   'tanggal_balas'       => $now);

            $this->m_surat->pengadilan_balas($data, $notification, $id);  
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            Surat Berhasil Dibalas!
          </div>');
            redirect(base_url('pengadilan'));         
        }
    }

    public function edit_balas()
    { 
        $this->form_validation->set_rules('setuju_geledah', '', 'callback_setuju_geledah');
        $this->form_validation->set_rules('ijin_geledah', '', 'callback_ijin_geledah');
        $this->form_validation->set_rules('khusus', '', 'callback_khusus');
        $this->form_validation->set_rules('biasa', '', 'callback_biasa');
        $this->form_validation->set_rules('pengadilan', '', 'callback_pengadilan');
        $this->form_validation->set_error_delimiters('<span style="color:red;">','</span>');
        
        $id = $this->uri->segment(3);

        if ($this->form_validation->run() == FALSE) 
        {
            $data = $this->m_surat->cek_balas_pengadilan(base64_decode($id));
            if($data->num_rows() == 0)
            {
                redirect('pengadilan/riwayat_balas');
            }
            else
            {
                $value['data'] = $this->m_surat->riwayat_balas_pn(base64_decode($id));
                $this->template->load('pages/template/template','pages/pengadilan/form_edit_balas/content', $value);
            }
        }
        else
        {
            $post = $this->input->post(NULL, TRUE);

            $config['upload_path']          = './uploads/kepolisian/pengadilan';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            
            if ($_FILES['ijin_geledah']['name'])
            {
                if ($this->upload->do_upload('ijin_geledah'))
                {
                    $ijin_geledah = $this->upload->data('file_name');
                    $this->db->set('ijin_geledah_pn', $ijin_geledah);
                    @unlink('./uploads/kepolisian/pengadilan/'. $post['old_ijin_geledah']);
                }  
            }
            
            if ($_FILES['setuju_geledah']['name']) 
            {
                if ($this->upload->do_upload('setuju_geledah'))
                {
                    $setuju_geledah = $this->upload->data('file_name');
                    $this->db->set('setuju_geledah_pn', $setuju_geledah);
                    @unlink('./uploads/kepolisian/pengadilan/'. $post['old_setuju_geledah']);
                }
            }

            if ($_FILES['khusus']['name']) 
            {
                if ($this->upload->do_upload('khusus'))
                {
                    $khusus = $this->upload->data('file_name');
                    $this->db->set('khusus_pn', $khusus);
                    @unlink('./uploads/kepolisian/pengadilan/'. $post['old_khusus']);
                }
            }

            if ($_FILES['biasa']['name']) 
            {
                if ($this->upload->do_upload('biasa'))
                {
                    $biasa = $this->upload->data('file_name');
                    $this->db->set('biasa_pn', $biasa);
                    @unlink('./uploads/kepolisian/pengadilan/'. $post['old_biasa']);
                }
            }

            if ($_FILES['pengadilan']['name']) 
            {
                if ($this->upload->do_upload('pengadilan'))
                {
                    $pengadilan = $this->upload->data('file_name');
                    $this->db->set('pengadilan_pn', $pengadilan);
                    @unlink('./uploads/kepolisian/pengadilan/'. $post['old_pengadilan']);
                }
            }              
            $this->db->where('id_surat_pn', $post['id_surat_pn']);
            $this->db->update('tbl_balas_pengadilan', array('id_surat_pn' => $post['id_surat_pn']));
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Surat balasan berhasil di edit!</div>');
            redirect(current_url());  
        }
    }
    
    public function ijin_geledah($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['ijin_geledah']['name']);
        if($_FILES['ijin_geledah']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ijin_geledah', 'Pilih file ijin geledah hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if($this->input->post('edit'))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ijin_geledah', 'file ijin geledah tidak boleh kosong.');
                return false;
            }
        }
    }

    public function setuju_geledah($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['setuju_geledah']['name']);
        if($_FILES['setuju_geledah']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('setuju_geledah', 'Pilih file setuju geledah hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if($this->input->post('edit'))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('setuju_geledah', 'file setuju geledah tidak boleh kosong.');
                return false;
            }
        }
    }
    
    public function khusus($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['khusus']['name']);
        if($_FILES['khusus']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('khusus', 'Pilih khusus hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if($this->input->post('edit'))
            {
                return true;
            }
            else
            {

                $this->form_validation->set_message('khusus', 'file khusus tidak boleh kosong.');
                return false;
            }
        }
    }

    public function biasa($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['biasa']['name']);
        if($_FILES['biasa']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('biasa', 'Pilih biasa hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if($this->input->post('edit'))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('biasa', 'file biasa tidak boleh kosong.');
                return false;
            }
        }
    }

    public function pengadilan($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['pengadilan']['name']);
        if($_FILES['pengadilan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('pengadilan', 'Pilih file pengadilan hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            if($this->input->post('edit'))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('pengadilan', 'file pengadilan tidak boleh kosong.');
                return false;
            }
        }
    }

    public function hapus_balasan($id)
    {   
        $file = $this->m_surat->riwayat_balas_pn($id);

        @unlink('./uploads/kepolisian/pengadilan/'. $file->ijin_geledah_pn);
        @unlink('./uploads/kepolisian/pengadilan/'. $file->setuju_geledah_pn);
        @unlink('./uploads/kepolisian/pengadilan/'. $file->khusus_pn);
        @unlink('./uploads/kepolisian/pengadilan/'. $file->biasa_pn);
        @unlink('./uploads/kepolisian/pengadilan/'. $file->pengadilan_pn);

        $hapus = $this->m_surat->hapus_balasan_pn($id);

        if ($hapus = TRUE) 
        {
            $this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
            redirect('pengadilan/riwayat_balas');
        }
    }
    
    public function unduh_kepolisian()
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

    public function unduh_kejaksaan()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/kejaksaan/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh_lapas()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/lapas/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/pengadilan/'.$this->uri->segment(3); 
    		force_download($file, NULL);
		}
		else
		{
			show_404();
		}
	
		force_download($data, null);
    }

}
