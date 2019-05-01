<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kepolisian_cobamasuk_pengadilan();
		$this->kejaksaan_cobamasuk_pengadilan();
		$this->lapas_cobamasuk_pengadilan();
		$this->superadmin_cobamasuk_pengadilan();
		$this->load->helper('file');
		$this->load->model('m_kepolisian');
		$this->load->model('m_pengadilan');
		$this->load->model('m_surat');
		// $this->output->enable_profiler(TRUE);
		
	}
	public function index()
	{
		$data['pengadilan'] = $this->m_surat->surat_polisi();
		$this->load->view('pages/pengadilan/surat_polisi/index', $data);
	}

	public function detail($url)
	{
		$data['data'] 	= $this->m_surat->surat_polisi($url);	
		$this->load->view('pages/pengadilan/surat_polisi/detail/index', $data);
	}

    public function detail_balas($id)
    {
        $data['value'] = $this->m_surat->riwayat_balas_pn($id);
        $this->load->view('pages/pengadilan/riwayat_balas/detail/index', $data);
    }


	public function riwayat_balas()
    {
        $data['data'] = $this->m_surat->riwayat_balas_pn();
        $this->load->view('pages/pengadilan/riwayat_balas/index', $data);
    }


	public function form_balas($id)
	{
        $this->form_validation->set_rules('setuju_geledah', '', 'callback_setuju_geledah');
        $this->form_validation->set_rules('ijin_geledah', '', 'callback_ijin_geledah');
        $this->form_validation->set_rules('khusus', '', 'callback_khusus');
        $this->form_validation->set_rules('biasa', '', 'callback_biasa');
        $this->form_validation->set_rules('pengadilan', '', 'callback_pengadilan');
        $this->form_validation->set_error_delimiters('<span style="color:red;">','</span>');


        if ($this->form_validation->run() == FALSE) 
        {
            $cek_balas = $this->m_surat->cek_balas_pengadilan($id);
            $data = $this->m_surat->cek_id($id);

            if ($cek_balas->num_rows() > 0) 
            {
            $this->session->set_flashdata('cek', '<div class="alert alert-danger" role="alert">Opps! Surat sudah dibalas!</div>');
                redirect('pengadilan');
            }
            else
            {
                if ($data->num_rows() > 0) 
                {
                    $value['value'] = $data->row();
                    $this->load->view('pages/pengadilan/form_balas/index', $value);
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
            $data = array( 'id_surat_pn'            => $post['id_surat'],
                           'id_users_pn'            => $this->session->userdata('id'),
                           'ijin_geledah_pn'        => $ijin_geledah['file_name'],
                           'setuju_geledah_pn'      => $setuju_geledah['file_name'],
                           'khusus_pn'              => $khusus['file_name'],
                           'biasa_pn'               => $biasa['file_name'],
                           'pengadilan_pn'          => $pengadilan['file_name']);

            $this->m_surat->pengadilan_balas($data, $id);  
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">berhasil di balas</div>');
            redirect(base_url('pengadilan'));         
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
            $this->form_validation->set_message('ijin_geledah', 'file ijin geledah tidak boleh kosong!');
            return false;
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
            $this->form_validation->set_message('setuju_geledah', 'file setuju geledah tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('khusus', 'file khusus tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('biasa', 'file biasa tidak boleh kosong!');
            return false;
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
            $this->form_validation->set_message('pengadilan', 'file pengadilan tidak boleh kosong!');
            return false;
        }
    }


	
    public function hapus_jadwal($id, $url)
    {	
		$file = $this->m_pengadilan->tampil($id);
		@unlink('./uploads/pengadilan/'. $file->file_pelimpahan_berkas);
		@unlink('./uploads/pengadilan/'. $file->file_penetapan_hari_sidang);
		@unlink('./uploads/pengadilan/'. $file->file_penahanan);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_I);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_II);
		@unlink('./uploads/pengadilan/'. $file->file_perpanjang_penahanan_III);
		@unlink('./uploads/pengadilan/'. $file->file_putusan);

		$hapus = $this->m_pengadilan->hapus($id, $url);
		if ($hapus = TRUE) 
		{
			$this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Jadwal terhapus</div>');
			redirect(base_url('pengadilan/data_jadwal'));
		}
    }

    public function ubah_deskripsi()
    {
    	$id_data 	= $this->input->post('id_data');
    	$url 	= $this->input->post('url');
    	$data = array('deskripsi' => $this->input->post('deskripsi'));
    	$this->m_pengadilan->ubah_deskripsi($id_data, $data, $url);
    	$this->session->set_flashdata('deskripsi_diganti', '<div class="alert alert-success" role="alert">Deskripsi berhasil diganti</div>');
		redirect(base_url('pengadilan/data_jadwal'));
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


    public function file_pelimpahan_berkas($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_pelimpahan_berkas']['name']);
        if($_FILES['file_pelimpahan_berkas']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pelimpahan_berkas', 'Pilih file pelimpahan berkas hanya word atau pdf.');
                return false;
            }
        }
    }

	public function file_penetapan_hari_sidang($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_penetapan_hari_sidang']['name']);
        if($_FILES['file_penetapan_hari_sidang']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penetapan_hari_sidang', 'Pilih file Penetapan hari sidang hanya word atau pdf.');
                return false;
            }
        }
    }

    public function file_penahanan($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_penahanan']['name']);
        if($_FILES['file_penahanan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_penahanan', 'Pilih penahanan hanya word atau pdf.');
                return false;
            }
        }
    }

	public function file_perpanjang_penahanan_I($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_I']['name']);
        if($_FILES['file_perpanjang_penahanan_I']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_I', 'Pilih file Perpanjang Penahanan I hanya word atau pdf.');
                return false;
            }
        }
    }

    public function file_perpanjang_penahanan_II($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_II']['name']);
        if($_FILES['file_perpanjang_penahanan_II']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_II', 'Pilih file Perpanjang Penahanan II hanya word atau pdf.');
                return false;
            }
        }
    }

   

    public function file_perpanjang_penahanan_III($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_perpanjang_penahanan_III']['name']);
        if($_FILES['file_perpanjang_penahanan_III']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_perpanjang_penahanan_III', 'Pilih Perpanjang Penahanan III hanya word atau pdf.');
                return false;
            }
        }
    }


    public function file_putusan($str)
	{
         $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_putusan']['name']);
        if($_FILES['file_putusan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_putusan', 'Pilih file putusan hanya word atau pdf.');
                return false;
            }
        }
    }

}
