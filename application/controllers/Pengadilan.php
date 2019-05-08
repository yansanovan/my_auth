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

    public function fetch()
    {
        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_pengadilan->update_notif();
            }
            $result = $this->m_pengadilan->fetch();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                   $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('pengadilan').'">
                              <i class="fa fa-file text-aqua"></i> 
                                  <strong>'.$value->nama_tersangka.'</strong><br />
                                <small><em>'.$value->pasal.'</em></small>
                            </a>
                          </li>
                        </ul>
                      </li>
                    ';
                }
            }
            else
            {
                $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
            }
            $result2 = $this->m_pengadilan->fetch_2();
            $count = count($result2);
            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
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
            $notification = array('id_polisi'           => $post['id_polisi'],
                                   'id_surat_balasan'    => $post['id_surat'],
                                   'id_users_pembalas'   => $this->session->userdata('id'),
                                   'notif_balasan'       => 0,
                                   'tanggal_balas'       => $now);

            $this->m_surat->pengadilan_balas($data, $notification, $id);  
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

}
