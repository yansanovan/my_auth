<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepolisian extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();
		kejaksaan_cobamasuk_kepolisian();
		pengadilan_cobamasuk_kepolisian();
		lapas_cobamasuk_kepolisian();
		superadmin_cobamasuk_kepolisian();
		
		$this->load->model('m_kepolisian');
		$this->load->model('m_surat');
		$this->load->helper('date');
	}
	public function index()
	{	
		$data['data']  = $this->m_surat->get_balasan();
        $this->template->load('pages/template/template','pages/kepolisian/balasan/content', $data);
    }

	public function riwayat_surat()
	{
		$data['data'] = $this->m_kepolisian->tampil();
        $this->template->load('pages/template/template','pages/kepolisian/riwayat_surat/content', $data);
	}
    
    public function detail($url)
    {
        $data['data'] = $this->m_kepolisian->detail($url);
        $this->template->load('pages/template/template','pages/kepolisian/riwayat_surat/detail/content', $data);
    }

    public function detail_balas($id)
    {
        $data['username_kj']  = $this->m_surat->get_username($id);
        $data['username_pn']  = $this->m_surat->get_username_pn($id);
        $data['data'] = $this->m_surat->get_balasan($id);
        $this->template->load('pages/template/template','pages/kepolisian/balasan/detail/content', $data);
    }

	public function form()
	{
		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh kosong.'));
		$this->form_validation->set_rules('pasal','Pasal','required', array('required' => 'pasal tidak boleh kosong.'));
		$this->form_validation->set_rules('no_sprindik','No Sprindik','required', array('required' => 'No Sprindik tidak boleh kosong.'));
        $this->form_validation->set_rules('no_lp','No LP','required', array('required' => 'No LP tidak boleh kosong.'));
		$this->form_validation->set_rules('spdp', '', 'callback_spdp');
		$this->form_validation->set_rules('ijin_geledah', '', 'callback_ijin_geledah');
		$this->form_validation->set_rules('setuju_geledah', '', 'callback_setuju_geledah');
		$this->form_validation->set_rules('khusus', '', 'callback_khusus');
		$this->form_validation->set_rules('biasa', '', 'callback_biasa');
		$this->form_validation->set_rules('narkotika', '', 'callback_narkotika');
		$this->form_validation->set_rules('kejaksaan', '', 'callback_kejaksaan');
		$this->form_validation->set_rules('pengadilan', '', 'callback_pengadilan');
		$this->form_validation->set_rules('p_18', '', 'callback_p_18');
		$this->form_validation->set_rules('p_21', '', 'callback_p_21');
		$this->form_validation->set_rules('pelimpahan', '', 'callback_pelimpahan');

        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
        
		if ($this->form_validation->run() == FALSE) 
		{
            $this->template->load('pages/template/template','pages/kepolisian/form/content');    
		}
		else
		{
			$config['upload_path']          = './uploads/kepolisian';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
	
			if (!empty($this->upload->do_upload('spdp')))
			{
				$spdp = $this->upload->data();
			}
			if (!empty($this->upload->do_upload('ijin_geledah'))) 
			{
				$ijin_geledah = $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('setuju_geledah'))) 
			{
				$setuju_geledah = $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('khusus'))) 
			{
				$khusus = $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('biasa')))
			{
				$biasa 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('biasa')))
			{
				$biasa 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('narkotika')))
			{
				$narkotika 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('kejaksaan')))
			{
				$kejaksaan 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('pengadilan')))
			{
				$pengadilan 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('p_18')))
			{
				$p_18 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('p_21')))
			{
				$p_21 	= $this->upload->data(); 
			}
			if (!empty($this->upload->do_upload('pelimpahan')))
			{
				$pelimpahan 	= $this->upload->data(); 
			}
				$post = $this->input->post(NULL, TRUE);
				$url  = md5(uniqid());
				$data = array('id_users' 			=> $this->session->userdata('id'),
							  'nama_tersangka'		=> $post['nama_tersangka'],
							  'pasal'				=> $post['pasal'],
							  'no_sprindik'			=> $post['no_sprindik'],
                              'no_lp'               => $post['no_lp'],
							  'spdp'				=> $spdp['file_name'],
							  'ijin_geledah'		=> $ijin_geledah['file_name'],
							  'setuju_geledah'		=> $setuju_geledah['file_name'],
							  'khusus'				=> $khusus['file_name'],
							  'biasa'				=> $biasa['file_name'],
							  'narkotika'			=> $narkotika['file_name'], 
							  'kejaksaan'			=> $kejaksaan['file_name'], 
							  'pengadilan'			=> $pengadilan['file_name'], 
							  'p_18'				=> $p_18['file_name'], 
							  'p_21'				=> $p_21['file_name'],  
							  'pelimpahan'			=> $pelimpahan['file_name'],
							  'url'					=> $url );

			$this->m_kepolisian->simpan($data);	
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
			redirect(base_url('kepolisian/form'));			
		}
	}

    public function hapus($id)
    {   
        $file = $this->m_kepolisian->tampil($id);
        @unlink('./uploads/kepolisian/'. $file->spdp);
        @unlink('./uploads/kepolisian/'. $file->ijin_geledah);
        @unlink('./uploads/kepolisian/'. $file->setuju_geledah);
        @unlink('./uploads/kepolisian/'. $file->khusus);
        @unlink('./uploads/kepolisian/'. $file->biasa);
        @unlink('./uploads/kepolisian/'. $file->narkotika);
        @unlink('./uploads/kepolisian/'. $file->narkotika);
        @unlink('./uploads/kepolisian/'. $file->kejaksaan);
        @unlink('./uploads/kepolisian/'. $file->pengadilan);
        @unlink('./uploads/kepolisian/'. $file->p_18);
        @unlink('./uploads/kepolisian/'. $file->p_21);
        @unlink('./uploads/kepolisian/'. $file->pelimpahan);

        $hapus = $this->m_kepolisian->hapus($id);
        if ($hapus = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil', 'Surat telah di hapus!');
            redirect(base_url('kepolisian/riwayat_surat'));
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', 
                                          array('required' => 'Nama tersangka tidak Boleh Kosong!'));
        $this->form_validation->set_rules('pasal','Pasal','required', array('required' => 'pasal tidak boleh kosong!'));
        $this->form_validation->set_rules('no_sprindik','No Sprindik','required', array('required' => 'No Sprindik tidak boleh kosong!'));
        $this->form_validation->set_rules('no_lp','No LP','required', array('required' => 'No LP tidak boleh kosong.'));
        $this->form_validation->set_rules('spdp', '', 'callback_spdp');
        $this->form_validation->set_rules('ijin_geledah', '', 'callback_ijin_geledah');
        $this->form_validation->set_rules('setuju_geledah', '', 'callback_setuju_geledah');
        $this->form_validation->set_rules('khusus', '', 'callback_khusus');
        $this->form_validation->set_rules('biasa', '', 'callback_biasa');
        $this->form_validation->set_rules('narkotika', '', 'callback_narkotika');
        $this->form_validation->set_rules('kejaksaan', '', 'callback_kejaksaan');
        $this->form_validation->set_rules('pengadilan', '', 'callback_pengadilan');
        $this->form_validation->set_rules('p_18', '', 'callback_p_18');
        $this->form_validation->set_rules('p_21', '', 'callback_p_21');
        $this->form_validation->set_rules('pelimpahan', '', 'callback_pelimpahan');
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');

        if ($this->form_validation->run() == FALSE) 
        {
            $cek = $this->m_kepolisian->cek_id($id);
            if ($cek->num_rows() == 0) 
            {
                show_404();
            }
            else
            {
                $data['data'] = $this->m_kepolisian->cek_id($id)->result();
                $this->template->load('pages/template/template','pages/kepolisian/edit/content', $data);
            }
        }
        else
        {
            $post           = $this->input->post(NULL, TRUE);
            $spdp           = $_FILES['spdp']['name'];
            $ijin_geledah   = $_FILES['ijin_geledah']['name'];
            $setuju_geledah = $_FILES['setuju_geledah']['name'];
            $khusus         = $_FILES['khusus']['name'];
            $biasa          = $_FILES['biasa']['name'];
            $narkotika      = $_FILES['narkotika']['name'];
            $kejaksaan      = $_FILES['kejaksaan']['name'];
            $pengadilan     = $_FILES['pengadilan']['name'];
            $p_18           = $_FILES['p_18']['name'];
            $p_21           = $_FILES['p_21']['name'];
            $pelimpahan     = $_FILES['pelimpahan']['name'];

            $config['upload_path']          = './uploads/kepolisian';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if ($spdp) 
            {
                if ($this->upload->do_upload('spdp'))
                {
                    $spdp = $this->upload->data('file_name');
                    $this->db->set('spdp', $spdp);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_spdp']);
                }
            }

            if ($ijin_geledah) 
            {
                if ($this->upload->do_upload('ijin_geledah'))
                {
                    $ijin_geledah     = $this->upload->data('file_name');
                    $this->db->set('ijin_geledah', $ijin_geledah);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_ijin_geledah']);
                }
            }

            if ($setuju_geledah) 
            {
                if ($this->upload->do_upload('setuju_geledah'))
                {
                    $setuju_geledah = $this->upload->data('file_name');
                    $this->db->set('setuju_geledah', $setuju_geledah);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_setuju_geledah']);   
                }
            }

            if ($khusus) 
            {
                if ($this->upload->do_upload('khusus'))
                {
                    $khusus = $this->upload->data('file_name');
                    $this->db->set('khusus', $khusus);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_khusus']);   
                }
            }

            if ($biasa) 
            {
                if ($this->upload->do_upload('biasa'))
                {
                    $biasa = $this->upload->data('file_name');
                    $this->db->set('biasa', $biasa);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_biasa']);   
                }
            }

            if ($narkotika) 
            {
                if ($this->upload->do_upload('narkotika'))
                {
                    $setuju_geledah = $this->upload->data('file_name');
                    $this->db->set('narkotika', $narkotika);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_narkotika']);   
                }
            }

            if ($kejaksaan) 
            {
                if ($this->upload->do_upload('kejaksaan'))
                {
                    $kejaksaan = $this->upload->data('file_name');
                    $this->db->set('kejaksaan', $kejaksaan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_kejaksaan']);   
                }
            }

            if ($pengadilan) 
            {
                if ($this->upload->do_upload('pengadilan'))
                {
                    $pengadilan = $this->upload->data('file_name');
                    $this->db->set('pengadilan', $pengadilan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_pengadilan']);   
                }
            }

            if ($p_18) 
            {
                if ($this->upload->do_upload('p_18'))
                {
                    $p_18 = $this->upload->data('file_name');
                    $this->db->set('p_18', $p_18);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_p18']);   
                }
            }

            if ($p_21) 
            {
                if ($this->upload->do_upload('p_21'))
                {
                    $p_21 = $this->upload->data('file_name');
                    $this->db->set('p_21', $p_21);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_p_21']);   
                }
            }

            if ($pelimpahan) 
            {
                if ($this->upload->do_upload('pelimpahan'))
                {
                    $pelimpahan = $this->upload->data('file_name');
                    $this->db->set('pelimpahan', $pelimpahan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_pelimpahan']);   
                }
            }

            $this->db->set('nama_tersangka', $post['nama_tersangka']);
            $this->db->set('pasal', $post['pasal']);
            $this->db->set('no_sprindik', $post['no_sprindik']);
            $this->db->set('no_lp', $post['no_lp']);
            $this->db->where('id_data', $id);
            $this->db->update('tbl_kepolisian', $data);
            $this->m_pesan->generatePesan('berhasil', 'Surat telah di update!');
            redirect(current_url());         
        }
    }

    // callback save file
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

	public function ijin_geledah($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
            if ($this->input->post('edit')) 
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
        $allowed_mime_type_arr = array('application/pdf','application/msword');
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
            if ($this->input->post('edit')) 
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('setuju_geledah', 'file Setuju geledah tidak boleh kosong.');
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
                $this->form_validation->set_message('khusus', 'Pilih file khusus hanya word atau pdf.');
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
            if ($this->input->post('edit')) 
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

    public function narkotika($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['narkotika']['name']);
        if($_FILES['narkotika']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('narkotika', 'Pilih narkotika hanya word atau pdf.');
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
                $this->form_validation->set_message('narkotika', 'file narkotika tidak boleh kosong.');
                return false;
            }
        }
    }

    public function kejaksaan($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['kejaksaan']['name']);
        if($_FILES['kejaksaan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('kejaksaan', 'Pilih kejaksaan hanya word atau pdf.');
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
                $this->form_validation->set_message('kejaksaan', 'file kejaksaan tidak boleh kosong.');
                return false;
            }
        }
    }

    public function pengadilan($str)
	{
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['pengadilan']['name']);
        if($_FILES['pengadilan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('pengadilan', 'Pilih pengadilan hanya word atau pdf.');
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
                $this->form_validation->set_message('pengadilan', 'file pengadilan tidak boleh kosong.');
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
                $this->form_validation->set_message('p_18', 'file P-18 tidak boleh kosong.');
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
                $this->form_validation->set_message('p_21', 'file P-21 tidak boleh kosong.');
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
                $this->form_validation->set_message('pelimpahan', 'file pelimpahan tidak boleh kosong.');
                return false;
            }
        }
    }
  
    public function unduh_kj()
    {
    	$this->load->helper('download');
		if($this->uri->segment(3))
		{
    		$data = 'uploads/kepolisian/kejaksaan/'.$this->uri->segment(3); 
		}
		else
		{
			show_404();
		}
		force_download($data, null);
    }

    public function unduh_pn()
    {
        $this->load->helper('download');
        if($this->uri->segment(3))
        {
            $data = 'uploads/kepolisian/pengadilan/'.$this->uri->segment(3); 
        }
        else
        {
            show_404();
        }
        force_download($data, null);
    }
}
