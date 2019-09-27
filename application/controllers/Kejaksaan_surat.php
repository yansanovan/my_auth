<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejaksaan_surat extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
        kepolisian_coba_masuk();
        pengadilan_coba_masuk();
        lapas_coba_masuk();
        superadmin_coba_masuk();
	}

	public function index()
	{
        $data['data'] = $this->m_kejaksaan_surat->surat_balasan_pengadilan()->result();
        $this->template->load('pages/template/template','pages/kejaksaan/surat_pengadilan/content', $data);
	}
    
	public function riwayat_surat()
	{
		$data['data'] = $this->m_kejaksaan_surat->riwayat_surat();
        $this->template->load('pages/template/template','pages/kejaksaan/riwayat_surat/content', $data);
	}

    public function detail($id_surat)
    {
        $data['data'] = $this->m_kejaksaan_surat->detail_balasan(base64_decode($id_surat))->row();
        $this->template->load('pages/template/template','pages/kejaksaan/surat_pengadilan/detail/content', $data);
    }

    public function validate()
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
                'errors' => array('required' => 'Tgl P-31 tidak boleh kosong.')),

        array(  'field' => 'tanggal_pelimpahan_p32',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tgl P-32 tidak boleh kosong.')),

        array(  'field' => 'tanggal_penahanan',
                'label' => 'Tanggal Penahanan',
                'rules' => 'required',
                'errors' => array('required' => 'Tgl Penahanan tidak boleh kosong.'))
        );

        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        $this->form_validation->set_rules($config);
        return true;
    }

    public function form_entry()
    {   
        $this->validate();
        
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
                              't_6'                 => $t_6['file_name'],
                              't_7'                 => $t_7['file_name'],
                              't_10'                => $t_10['file_name'],
                              'p_29'                => $p_29['file_name'],
                              'p_31'                => $p_31['file_name'],
                              'p_32'                => $p_32['file_name'], 
                              'p_42'                => $p_42['file_name'], 
                              'p_48'                => $p_48['file_name'], 
                              'ba_17'               => $ba_17['file_name'], 
                              'tanggal_posting'     => date('Y-m-d'),
                              'tanggal_penahanan'   => $post['tanggal_penahanan'],
                              'tanggal_pelimpahan_p31' => $post['tanggal_pelimpahan_p31'],
                              'tanggal_pelimpahan_p32' => $post['tanggal_pelimpahan_p32']);

            $this->m_kejaksaan_surat->simpan($data); 
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
            redirect('kejaksaan_surat/form_entry');            
        }
    }

    public function edit()
    {
        $this->validate();
        $id_surat = $this->uri->segment(3); 
        if ($this->form_validation->run() == FALSE) 
        {
            $data = $this->m_kejaksaan_surat->riwayat_surat($id_surat);
            if($data->num_rows() == 0)
            {
                redirect('kejaksaan_surat/riwayat_surat');
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
            $this->m_kejaksaan_surat->edit($id_surat);
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
            redirect(current_url());            
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

    public function download()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/pengadilan/'.$this->uri->segment(3); 
        }
        else
        {
            show_404();
        }
    
        force_download($data, null);
    }
}

