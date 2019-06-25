<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejaksaan_surat extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kepolisian_cobamasuk_kejaksaan();
		pengadilan_cobamasuk_kejaksaan();
		lapas_cobamasuk_kejaksaan();
		superadmin_cobamasuk_kejaksaan();
        $this->load->model('m_kejaksaan_surat');      	
	}

	public function index()
	{
        $data['kepolisian'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','pages/kejaksaan/surat_polisi/content', $data);
	}
	public function riwayat_surat()
	{
		$data['data'] = $this->m_kejaksaan_surat->riwayat_surat();
        $this->template->load('pages/template/template','pages/kejaksaan/riwayat_surat/content', $data);
	}

    public function detail($id_surat)
    {
        $data['data'] = $this->m_kejaksaan_surat->riwayat_surat($id_surat)->row();
        $this->template->load('pages/template/template','pages/kejaksaan/riwayat_surat/detail/content', $data);
    }
    public function form_entry()
    {
        $config = array(
        array(  'field' => 'nama_tersangka',
                'label' => 'Nama tersangka',
                'rules' => 'required',
                'errors' => array('required' => 'nama tersangka tidak boleh kosong.')),
        
        array(  'field' => 'nama_jpu',
                'label' => 'Nama Jaksa Penuntut Umum',
                'rules' => 'required',
                'errors' => array('required' => 'Nama Jaksa Penuntut Umum tidak boleh kosong.')),

        array(  'field' => 'p_16',
                'label' => 'P-16',
                'rules' => 'required',
                'errors' => array('required' => 'P-16 tidak boleh kosong.')),
        
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
                'label' => 'P-29',
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
                'rules' => 'callback_ba_17'),

        array(  'field' => 'tanggal_pelimpahan_p31',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal pelimpahan P-31 tidak boleh kosong.')),

        array(  'field' => 'tanggal_pelimpahan_p32',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal pelimpahan P-32 tidak boleh kosong.')),

        array(  'field' => 'tanggal_penahanan',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal Penahanan tidak boleh kosong.'))
        );
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE) 
        {
            $this->template->load('pages/template/template','pages/kejaksaan/form_entry/content');    
        }
        else
        {
            $config['upload_path']          = './uploads/kejaksaan';
            $config['allowed_types']        = 'pdf|doc|docx|rtf';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
    
            if (!empty($this->upload->do_upload('t_6')))
            {
                $t_6 = $this->upload->data();
            }
            if (!empty($this->upload->do_upload('t_7'))) 
            {
                $t_7 = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('t_10'))) 
            {
                $t_10 = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_29'))) 
            {
                $p_29 = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_31')))
            {
                $p_31  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_32')))
            {
                $p_32  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_42')))
            {
                $p_42  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('p_48')))
            {
                $p_48  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('ba_17')))
            {
                $ba_17   = $this->upload->data(); 
            }
                $post = $this->input->post(NULL, TRUE);
                $data = array('id_users_kejaksaan'            => $this->session->userdata('id'),
                              'nama_tersangka'      => $post['nama_tersangka'],
                              'nama_jpu'            => $post['nama_jpu'],
                              'p_16'                => $post['p_16'],
                              't_6'                 => $t_6['file_name'],
                              't_7'                 => $t_7['file_name'],
                              't_10'                => $t_10['file_name'],
                              'p_29'                => $p_29['file_name'],
                              'p_31'                => $p_31['file_name'],
                              'p_32'                => $p_32['file_name'], 
                              'p_42'                => $p_42['file_name'], 
                              'p_48'                => $p_48['file_name'], 
                              'ba_17'               => $ba_17['file_name'], 
                              'tanggal_penahanan'   => $post['tanggal_penahanan'],
                              'tanggal_pelimpahan_p31' => $post['tanggal_pelimpahan_p31'],
                              'tanggal_pelimpahan_p32' => $post['tanggal_pelimpahan_p32']);

            $this->m_kejaksaan_surat->simpan($data); 
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
            redirect('Kejaksaan_surat/form_entry');            
        }
    }

    public function edit()
    {
        $config = array(
        array(  'field' => 'nama_tersangka',
                'label' => 'Nama tersangka',
                'rules' => 'required',
                'errors' => array('required' => 'nama tersangka tidak boleh kosong.')),
        
        array(  'field' => 'nama_jpu',
                'label' => 'Nama Jaksa Penuntut Umum',
                'rules' => 'required',
                'errors' => array('required' => 'Nama Jaksa Penuntut Umum tidak boleh kosong.')),

        array(  'field' => 'p_16',
                'label' => 'P-16',
                'rules' => 'required',
                'errors' => array('required' => 'P-16 tidak boleh kosong.')),
        
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
                'label' => 'P-29',
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
                'rules' => 'callback_ba_17'),

        array(  'field' => 'tanggal_pelimpahan_p31',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal pelimpahan P-31 tidak boleh kosong.')),

        array(  'field' => 'tanggal_pelimpahan_p32',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal pelimpahan P-32 tidak boleh kosong.')),

        array(  'field' => 'tanggal_penahanan',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal Penahanan tidak boleh kosong.'))
        );
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        $this->form_validation->set_rules($config);

        $id_surat = $this->uri->segment(3);

        if ($this->form_validation->run() == FALSE) 
        {
            $data = $this->m_kejaksaan_surat->riwayat_surat($id_surat);
            if($data->num_rows() == 0)
            {
                redirect(current_url());
            }
            else
            {
                $value['action'] = 'edit';
                $value['data'] = $this->m_kejaksaan_surat->riwayat_surat($id_surat)->row();
                $this->template->load('pages/template/template','pages/kejaksaan/form_edit_surat/content', $value);
            }
        }
        else
        {
            $config['upload_path']          = './uploads/kejaksaan';
            $config['allowed_types']        = 'pdf|doc|docx|rtf';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            $post = $this->input->post(NULL, TRUE);
            
            if (!empty($this->upload->do_upload('t_7')))
            {
                $t_7 = $this->upload->data('file_name');
                $this->db->set('t_7', $t_7);
                @unlink('./uploads/kejaksaan/'. $post['old_t_7']);
            }
            if (!empty($this->upload->do_upload('t_6')))
            {
                $t_6 = $this->upload->data('file_name');
                $this->db->set('t_6', $t_6);
                @unlink('./uploads/kejaksaan/'. $post['old_t_6']);
            }
            if (!empty($this->upload->do_upload('t_10')))
            {
                $t_10 = $this->upload->data('file_name');
                $this->db->set('t_10', $t_10);
                @unlink('./uploads/kejaksaan/'. $post['old_t_10']);
            }
            if (!empty($this->upload->do_upload('p_29')))
            {
                $p_29 = $this->upload->data('file_name');
                $this->db->set('p_29', $p_29);
                @unlink('./uploads/kejaksaan/'. $post['old_p_29']);
            }
            if (!empty($this->upload->do_upload('p_31')))
            {
                $p_31 = $this->upload->data('file_name');
                $this->db->set('p_31', $p_31);
                @unlink('./uploads/kejaksaan/'. $post['old_p_31']);
            }
            if (!empty($this->upload->do_upload('p_32')))
            {
                $p_32 = $this->upload->data('file_name');
                $this->db->set('p_32', $p_32);
                @unlink('./uploads/kejaksaan/'. $post['old_p_32']);
            }
            if (!empty($this->upload->do_upload('p_42')))
            {
                $p_42 = $this->upload->data('file_name');
                $this->db->set('p_42', $p_42);
                @unlink('./uploads/kejaksaan/'. $post['old_p_42']);
            }
            if (!empty($this->upload->do_upload('p_48')))
            {
                $p_48 = $this->upload->data('file_name');
                $this->db->set('p_48', $p_48);
                @unlink('./uploads/kejaksaan/'. $post['old_p_48']);
            }
            if (!empty($this->upload->do_upload('ba_17')))
            {
                $ba_17 = $this->upload->data('file_name');
                $this->db->set('ba_17', $ba_17);
                @unlink('./uploads/kejaksaan/'. $post['old_ba_17']);
            }
            $data = array('nama_tersangka'      => $post['nama_tersangka'],
                          'nama_jpu'            => $post['nama_jpu'],
                          'p_16'                => $post['p_16'], 
                          'tanggal_penahanan'   => $post['tanggal_penahanan'],
                          'tanggal_pelimpahan_p31' => $post['tanggal_pelimpahan_p31'],
                          'tanggal_pelimpahan_p32' => $post['tanggal_pelimpahan_p32']);
            $this->db->where('id_surat', base64_decode($id_surat));
            $this->db->update('tbl_kejaksaan', $data);
            // $this->m_kejaksaan_surat->edit($id_surat, $data); 
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
            redirect(current_url());            
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
                $this->form_validation->set_message('t_6', 'Pilih file spdp hanya word atau pdf.');
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
                $this->form_validation->set_message('t_7', 'Pilih file spdp hanya word atau pdf.');
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
                $this->form_validation->set_message('t_10', 'Pilih file spdp hanya word atau pdf.');
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
                $this->form_validation->set_message('p_29', 'Pilih file spdp hanya word atau pdf.');
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

    public function hapus($id_surat)
    {   
        $file = $this->m_kejaksaan_surat->riwayat_surat($id_surat)->row();
        @unlink('./uploads/kejaksaan/'. $file->t_6);
        @unlink('./uploads/kejaksaan/'. $file->t_7);
        @unlink('./uploads/kejaksaan/'. $file->t_10);
        @unlink('./uploads/kejaksaan/'. $file->p_29);
        @unlink('./uploads/kejaksaan/'. $file->p_31);
        @unlink('./uploads/kejaksaan/'. $file->p_32);
        @unlink('./uploads/kejaksaan/'. $file->p_42);
        @unlink('./uploads/kejaksaan/'. $file->p_48);
        @unlink('./uploads/kejaksaan/'. $file->ba_17);

        $hapus = $this->m_kejaksaan_surat->hapus($id_surat);
        if ($hapus = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil', 'Surat telah di hapus!');
            redirect('kejaksaan_surat/riwayat_surat');
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

