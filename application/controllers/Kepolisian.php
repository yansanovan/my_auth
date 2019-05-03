<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepolisian extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->kejaksaan_cobamasuk_kepolisian();
		$this->pengadilan_cobamasuk_kepolisian();
		$this->lapas_cobamasuk_kepolisian();
		$this->superadmin_cobamasuk_kepolisian();
		$this->load->helper('file');
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
        $this->template->load('pages/template/template','pages/kepolisian/form/content');
	}

	public function simpan()
	{

		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh Kosong!'));
		$this->form_validation->set_rules('pasal','Pasal','required', array('required' => 'pasal tidak boleh kosong!'));
		$this->form_validation->set_rules('no_sprindik','No Sprindik','required', array('required' => 'No Sprindik tidak boleh kosong!'));
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

		if ($this->form_validation->run() == FALSE) 
		{
			$this->form();
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
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">Surat berhasil di simpan dan terkirim!</div>');
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
            $this->session->set_flashdata('terhapus', '<div class="alert alert-success" role="alert">Surat terhapus</div>');
            redirect(base_url('kepolisian/riwayat_surat'));
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', 
                                          array('required' => 'Nama tersangka tidak Boleh Kosong!'));
        $this->form_validation->set_rules('pasal','Pasal','required', array('required' => 'pasal tidak boleh kosong!'));
        $this->form_validation->set_rules('no_sprindik','No Sprindik','required', array('required' => 'No Sprindik tidak boleh kosong!'));
        $this->form_validation->set_rules('ganti_spdp', '', 'callback_ganti_spdp');
        $this->form_validation->set_rules('ganti_ijin_geledah', '', 'callback_ganti_ijin_geledah');
        $this->form_validation->set_rules('ganti_setuju_geledah', '', 'callback_ganti_setuju_geledah');
        $this->form_validation->set_rules('ganti_khusus', '', 'callback_ganti_khusus');
        $this->form_validation->set_rules('ganti_biasa', '', 'callback_ganti_biasa');
        $this->form_validation->set_rules('ganti_narkotika', '', 'callback_ganti_narkotika');
        $this->form_validation->set_rules('ganti_kejaksaan', '', 'callback_ganti_kejaksaan');
        $this->form_validation->set_rules('ganti_pengadilan', '', 'callback_ganti_pengadilan');
        $this->form_validation->set_rules('ganti_p_18', '', 'callback_ganti_p_18');
        $this->form_validation->set_rules('ganti_p_21', '', 'callback_ganti_p_21');
        $this->form_validation->set_rules('ganti_pelimpahan', '', 'callback_ganti_pelimpahan');

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
            $post                 = $this->input->post(NULL, TRUE);
            $ganti_spdp           = $_FILES['ganti_spdp']['name'];
            $ganti_ijin_geledah   = $_FILES['ganti_ijin_geledah']['name'];
            $ganti_setuju_geledah = $_FILES['ganti_setuju_geledah']['name'];
            $ganti_khusus         = $_FILES['ganti_khusus']['name'];
            $ganti_biasa          = $_FILES['ganti_biasa']['name'];
            $ganti_narkotika      = $_FILES['ganti_narkotika']['name'];
            $ganti_kejaksaan      = $_FILES['ganti_kejaksaan']['name'];
            $ganti_pengadilan     = $_FILES['ganti_pengadilan']['name'];
            $ganti_p_18           = $_FILES['ganti_p_18']['name'];
            $ganti_p_21           = $_FILES['ganti_p_21']['name'];
            $ganti_pelimpahan     = $_FILES['ganti_pelimpahan']['name'];

            $config['upload_path']          = './uploads/kepolisian';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if ($ganti_spdp) 
            {
                if ($this->upload->do_upload('ganti_spdp'))
                {
                    $ganti_spdp = $this->upload->data('file_name');
                    $this->db->set('spdp', $ganti_spdp);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_spdp']);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_ijin_geledah) 
            {
                if ($this->upload->do_upload('ganti_ijin_geledah'))
                {
                    $ganti_ijin_geledah     = $this->upload->data('file_name');
                    $this->db->set('ijin_geledah', $ganti_ijin_geledah);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_ijin_geledah']);
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_setuju_geledah) 
            {
                if ($this->upload->do_upload('ganti_setuju_geledah'))
                {
                    $ganti_setuju_geledah = $this->upload->data('file_name');
                    $this->db->set('setuju_geledah', $ganti_setuju_geledah);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_setuju_geledah']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_khusus) 
            {
                if ($this->upload->do_upload('ganti_khusus'))
                {
                    $ganti_khusus = $this->upload->data('file_name');
                    $this->db->set('khusus', $ganti_khusus);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_khusus']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_biasa) 
            {
                if ($this->upload->do_upload('ganti_biasa'))
                {
                    $ganti_biasa = $this->upload->data('file_name');
                    $this->db->set('biasa', $ganti_biasa);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_biasa']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_narkotika) 
            {
                if ($this->upload->do_upload('ganti_narkotika'))
                {
                    $ganti_setuju_geledah = $this->upload->data('file_name');
                    $this->db->set('narkotika', $ganti_narkotika);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_narkotika']);   
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_kejaksaan) 
            {
                if ($this->upload->do_upload('ganti_kejaksaan'))
                {
                    $ganti_kejaksaan = $this->upload->data('file_name');
                    $this->db->set('kejaksaan', $ganti_kejaksaan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_kejaksaan']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_pengadilan) 
            {
                if ($this->upload->do_upload('ganti_pengadilan'))
                {
                    $ganti_pengadilan = $this->upload->data('file_name');
                    $this->db->set('pengadilan', $ganti_pengadilan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_pengadilan']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_p_18) 
            {
                if ($this->upload->do_upload('ganti_p_18'))
                {
                    $ganti_p_18 = $this->upload->data('file_name');
                    $this->db->set('p_18', $ganti_p_18);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_p18']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_p_21) 
            {
                if ($this->upload->do_upload('ganti_p_21'))
                {
                    $ganti_p_21 = $this->upload->data('file_name');
                    $this->db->set('p_21', $ganti_p_21);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_p_21']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            if ($ganti_pelimpahan) 
            {
                if ($this->upload->do_upload('ganti_pelimpahan'))
                {
                    $ganti_pelimpahan = $this->upload->data('file_name');
                    $this->db->set('pelimpahan', $ganti_pelimpahan);
                    unlink(FCPATH.'/uploads/kepolisian/'.$post['old_pelimpahan']);   
                }
                else
                {

                    $error = array('error' => $this->upload->display_errors());      
                    $this->load->view('pages/kepolisian/riwayat_surat', $error);
                }
            }

            $this->db->set('nama_tersangka', $post['nama_tersangka']);
            $this->db->set('pasal', $post['pasal']);
            $this->db->set('no_sprindik', $post['no_sprindik']);
            $this->db->where('id_data', $id);
            $this->db->update('tbl_kepolisian', $data);
            $this->session->set_flashdata('berhasil','<div class="alert alert-success" role="alert">Surat Berhasil di edit</div>');

            $url = base_url('kepolisian/edit/'.$id);
            redirect($url);          
            
        }
    }

    // callback edit file
    public function ganti_spdp($str)
    {
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_spdp']['name']);
        if($_FILES['ganti_spdp']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_spdp', 'Pilih file spdp hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_ijin_geledah($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_ijin_geledah']['name']);
        if($_FILES['ganti_ijin_geledah']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_ijin_geledah', 'Pilih file ijin geledah hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_setuju_geledah($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_setuju_geledah']['name']);
        if($_FILES['ganti_setuju_geledah']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_setuju_geledah', 'Pilih file setuju geledah hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }


    public function ganti_khusus($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_khusus']['name']);
        if($_FILES['ganti_khusus']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_khusus', 'Pilih file khusus hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }


    public function ganti_biasa($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_biasa']['name']);
        if($_FILES['ganti_biasa']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_biasa', 'Pilih file biasa hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }


    public function ganti_narkotika($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_narkotika']['name']);
        if($_FILES['ganti_narkotika']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_narkotika', 'Pilih file narkotika hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_kejaksaan($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_kejaksaan']['name']);
        if($_FILES['ganti_kejaksaan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_kejaksaan', 'Pilih file kejaksaan hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_pengadilan($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_pengadilan']['name']);
        if($_FILES['ganti_pengadilan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_pengadilan', 'Pilih file pengadilan hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_p_18($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_p_18']['name']);
        if($_FILES['ganti_p_18']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_p_18', 'Pilih file P-18 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_p_21($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_p_21']['name']);
        if($_FILES['ganti_p_21']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_p_21', 'Pilih file P-21 hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    public function ganti_pelimpahan($str)
    {
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['ganti_pelimpahan']['name']);
        if($_FILES['ganti_pelimpahan']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('ganti_pelimpahan', 'Pilih file pelimpahan hanya word atau pdf.');
                return false;
            }
        }
        else
        {
            return true;
        }
    }
    // end callback edit



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
        	$this->form_validation->set_message('spdp', 'file SPDP tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('ijin_geledah', 'file ijin geledah tidak boleh kosong!');
            return false;
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
            $this->form_validation->set_message('setuju_geledah', 'file Setuju geledah tidak boleh kosong!');
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
                $this->form_validation->set_message('khusus', 'Pilih file khusus hanya word atau pdf.');
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
        	$this->form_validation->set_message('narkotika', 'file narkotika tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('kejaksaan', 'file kejaksaan tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('pengadilan', 'file pengadilan tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('p_18', 'file P-18 tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('p_21', 'file P-21 tidak boleh kosong!');
            return false;
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
        	$this->form_validation->set_message('pelimpahan', 'file pelimpahan tidak boleh kosong!');
            return false;
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
