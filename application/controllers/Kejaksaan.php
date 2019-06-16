<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejaksaan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kepolisian_cobamasuk_kejaksaan();
		pengadilan_cobamasuk_kejaksaan();
		lapas_cobamasuk_kejaksaan();
		superadmin_cobamasuk_kejaksaan();
		
        $this->load->model('m_kepolisian');
		$this->load->model('m_kejaksaan');
		$this->load->model('m_surat');		
	}

	public function index()
	{
        $data['kepolisian'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','pages/kejaksaan/surat_polisi/content', $data);
	}

	public function riwayat_surat()
	{
		$data['data'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','riwayat_surat/content', $data);
	}

	public function detail($url)
	{
		$data['data'] 	= $this->m_surat->surat_polisi(base64_decode($url));	
        $this->template->load('pages/template/template','pages/kejaksaan/surat_polisi/detail/content', $data);
	}

    public function riwayat_balas()
    {
        $data['data'] = $this->m_surat->riwayat_balas_kj();
        $this->template->load('pages/template/template','pages/kejaksaan/riwayat_balas/content', $data);
    }

	public function form_balas($id)
	{
        $this->form_validation->set_rules('spdp', '', 'callback_spdp');
        $this->form_validation->set_rules('narkotika', '', 'callback_narkotika');
        $this->form_validation->set_rules('kejaksaan', '', 'callback_kejaksaan');
        $this->form_validation->set_rules('p_18', '', 'callback_p_18');
        $this->form_validation->set_rules('p_21', '', 'callback_p_21');
        $this->form_validation->set_rules('pelimpahan', '', 'callback_pelimpahan');
        $this->form_validation->set_rules('p_17', '', 'callback_p_17');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');

        if ($this->form_validation->run() == FALSE) 
        {
            $cek_balas = $this->m_surat->cek_balas_kejaksaan(base64_decode($id));
            $data      = $this->m_surat->cek_id(base64_decode($id));
            // cek apakah data berdasarkan id sudah dibalas
            if ($cek_balas->num_rows() > 0) 
            {
                $this->session->set_flashdata('cek', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i>Opps, Maaf!</h4>
                Surat ini Sudah dibalas!
                </div>');
                redirect('kejaksaan');
            }
            else
            {
                // cek apakah id ada, jika ada tampilkan form
                if ($data->num_rows() > 0) 
                {
                    $value['value'] = $data->row();
                    $this->template->load('pages/template/template','pages/kejaksaan/form_balas/content', $value);
                }   
                else
                {
                    redirect('kejaksaan');
                }
            }
        }
        else
        {      
            $config['upload_path']          = './uploads/kepolisian/kejaksaan';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
    
            if (!empty($this->upload->do_upload('spdp')))
            {
                $spdp = $this->upload->data();
            }
            if (!empty($this->upload->do_upload('narkotika')))
            {
                $narkotika  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('kejaksaan')))
            {
                $kejaksaan  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_18')))
            {
                $p_18   = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_21')))
            {
                $p_21   = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('pelimpahan')))
            {
                $pelimpahan     = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_17')))
            {
                $p_17   = $this->upload->data(); 
            }

            $post = $this->input->post(NULL, TRUE);    
            $data = array( 'id_polisi_kj'        => $post['id_polisi'],
                           'id_surat_kj'         => $post['id_surat'],
                           'id_users_kj'         => $this->session->userdata('id'),
                           'spdp_kj'             => $spdp['file_name'],
                           'narkotika_kj'        => $narkotika['file_name'], 
                           'kejaksaan_kj'        => $kejaksaan['file_name'], 
                           'p_18_kj'             => $p_18['file_name'], 
                           'p_21_kj'             => $p_21['file_name'],  
                           'pelimpahan_kj'       => $pelimpahan['file_name'],
                           'p_17_kj'             => $p_17['file_name']);

            $now = date('Y-m-d H:i:s');
            $notification = array('id_polisi'           => $post['id_polisi'],
                                   'id_surat_balasan'    => $post['id_surat'],
                                   'id_users_pembalas'   => $this->session->userdata('id'),
                                   'notif_balasan'       => 0,
                                   'tanggal_balas'       => $now);

            $this->m_surat->kejaksaan_balas($data, $notification, $id);  
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Berhasil dibalas</div>');
            redirect(base_url('kejaksaan'));         
        }
	}

    public function edit_balas()
    { 
        $this->form_validation->set_rules('spdp', '', 'callback_spdp|xss_clean');
        $this->form_validation->set_rules('narkotika', '', 'callback_narkotika|xss_clean');
        $this->form_validation->set_rules('kejaksaan', '', 'callback_kejaksaan|xss_clean');
        $this->form_validation->set_rules('p_18', '', 'callback_p_18|xss_clean');
        $this->form_validation->set_rules('p_21', '', 'callback_p_21|xss_clean');
        $this->form_validation->set_rules('pelimpahan', '', 'callback_pelimpahan|xss_clean');
        $this->form_validation->set_rules('p_17', '', 'callback_p_17|xss_clean');
        
        $id = $this->uri->segment(3);

        if ($this->form_validation->run() == FALSE) 
        {
            $data = $this->m_surat->cek_balas_kejaksaan(base64_decode($id));
            if($data->num_rows() == 0)
            {
                redirect('kejaksaan/riwayat_balas');
            }
            else
            {
                $value['data'] = $this->m_surat->riwayat_balas_kj(base64_decode($id));
                $this->template->load('pages/template/template','pages/kejaksaan/form_edit_balas/content', $value);
            }
        }
        else
        {
            $post = $this->input->post(NULL, TRUE);

            $config['upload_path']          = './uploads/kepolisian/kejaksaan';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

           
            if ($this->upload->do_upload('spdp'))
            {
                $spdp = $this->upload->data('file_name');
                $this->db->set('spdp_kj', $spdp);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_spdp']);
            }   
        
            if ($this->upload->do_upload('narkotika'))
            {
                $narkotika_kj = $this->upload->data('file_name');
                $this->db->set('narkotika_kj', $narkotika_kj);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_narkotikan']);
            }
        
            if ($this->upload->do_upload('kejaksaan'))
            {
                $kejaksaan = $this->upload->data('file_name');
                $this->db->set('kejaksaan_kj', $kejaksaan);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_kejaksaan']);
            }
       
            if ($this->upload->do_upload('p_18'))
            {
                $p_18 = $this->upload->data('file_name');
                $this->db->set('p_18_kj', $p_18);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_18']);
            }
       
            if ($this->upload->do_upload('p_21'))
            {
                $p_21 = $this->upload->data('file_name');
                $this->db->set('p_21_kj', $p_21);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_21']);
            }
       
            if ($this->upload->do_upload('pelimpahan'))
            {
                $pelimpahan = $this->upload->data('file_name');
                $this->db->set('pelimpahan_kj', $pelimpahan);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_pelimpahan']);
            }
           
            if ($this->upload->do_upload('p_17'))
            {
                $p_17 = $this->upload->data('file_name');
                $this->db->set('p_17_kj', $p_17);
                @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_17']);
            }
            
            $this->db->where('id_surat_kj', $post['id_surat_kj']);
            $this->db->update('tbl_balas_kejaksaan', array('id_surat_kj' => $post['id_surat_kj']));
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Surat balasan berhasil di edit!</div>');
            redirect(current_url());    
        }
    }
	public function spdp($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['spdp']['name']);
        if($_FILES['spdp']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('spdp', 'Pilih file spdp hanya word atau pdf.');
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
        	   $this->form_validation->set_message('spdp', 'file SPDP tidak boleh kosong.');
               return false;
            }
        }
    }

    public function narkotika($str)
    {  
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['narkotika']['name']);
        if($_FILES['narkotika']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('narkotika', 'Pilih file ijin geledah hanya word atau pdf.');
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
                $this->form_validation->set_message('narkotika', 'file narkotika tidak boleh kosong!');
                return false;
            }
        }
    }

    public function kejaksaan($str)
    {   
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['kejaksaan']['name']);
        if($_FILES['kejaksaan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('kejaksaan', 'Pilih file kejaksaan hanya word atau pdf.');
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
                $this->form_validation->set_message('kejaksaan', 'file kejaksaan tidak boleh kosong!');
                return false;
            }
        }
    }

    public function p_18($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['p_18']['name']);
        if($_FILES['p_18']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_18', 'Pilih P-18 hanya word atau pdf.');
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
            	$this->form_validation->set_message('p_18', 'file P-18 tidak boleh kosong!');
                return false;
            }
        }
    }

    public function p_21($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['p_21']['name']);
        if($_FILES['p_21']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_21', 'Pilih P-21 hanya word atau pdf.');
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
            	$this->form_validation->set_message('p_21', 'file P-21 tidak boleh kosong!');
                return false;
            }
        }
    }

    public function pelimpahan($str)
	{            
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['pelimpahan']['name']);
        if($_FILES['pelimpahan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('pelimpahan', 'Pilih pelimpahan hanya word atau pdf.');
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
            	$this->form_validation->set_message('pelimpahan', 'file pelimpahan tidak boleh kosong!');
                return false;
            }
        }
    }

    public function p_17($str)
    {        
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['p_17']['name']);
        if($_FILES['p_17']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_17', 'Pilih P-17 hanya word atau pdf.');
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
                $this->form_validation->set_message('p_17', 'file P-17 tidak boleh kosong!');
                return false;
            }
        }
    }

    public function hapus_balasan($id)
    {	
		$hapus = $this->m_surat->hapus_balasan_kj($id);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('kejaksaan/riwayat_balas'));
		}
    }

    public function unduh()
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
}

