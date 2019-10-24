<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan extends MY_Validate 
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
        $this->template->load('pages/template/template','pages/pengadilan/surat_polisi/riwayat_balas/content', $data);
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
                $this->m_pesan->generatePesan('cek','Maaf surat ini sudah dibalas');
                redirect('pengadilan');
            }
            else
            {
                if ($data->num_rows() > 0) 
                {
                    $value['value'] = $data->row();
                    $this->template->load('pages/template/template','pages/pengadilan/surat_polisi/form_balas/content', $value);
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
            $this->m_pesan->generatePesan('berhasil','Surat telah berhasil dibalas');
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
                $this->template->load('pages/template/template','pages/pengadilan/surat_polisi/form_edit_balas/content', $value);
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
            $this->m_pesan->generatePesan('berhasil','Surat balasan telah di update');
            redirect(current_url());  
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
            $this->m_pesan->generatePesan('berhasil','Surat balasan telah dihapus');
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
    		$data = 'uploads/kepolisian/'.$this->uri->segment(3); 
    		force_download($file, NULL);
		}
		else
		{
			show_404();
		}
	
		force_download($data, null);
    }

}
