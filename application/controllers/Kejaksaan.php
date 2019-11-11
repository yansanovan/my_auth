<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejaksaan extends MY_Validate
{
    private $max_size =  1000000; //format byte
 
	function __construct()
	{
		parent::__construct();
        check_session_prosecutor();
	}

	public function index()
	{
        $data['kepolisian'] = $this->m_surat->surat_polisi();
        $this->template->load('pages/template/template','pages/kejaksaan/surat_polisi/content', $data);
	}

    public function file_reply_spdp($str)
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/jpg');
        $mime = get_mime_by_extension($_FILES['file_reply_spdp']['name']);
        if($_FILES['file_reply_spdp']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                if($_FILES['file_reply_spdp']['size'] > $this->max_size) {
                    $this->form_validation->set_message('file_reply_spdp', 'This file exceeds max size 1MB.');
                    return false;
                }
                else
                {
                    return true;
                }   
            }
            else
            {
                $this->form_validation->set_message('file_reply_spdp', 'Select only jpg/png');
                return FALSE;
            }
        }
        else
        {               
            $this->form_validation->set_message('file_reply_spdp', 'The File  field is required');
            return FALSE;
        }
    }

    public function create_reply_spdp()
    {
        $this->form_validation->set_rules('reply_spdp', 'Reply Spdp', 'required');
        $this->form_validation->set_rules('file_reply_spdp', 'File', 'callback_file_reply_spdp','trim|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $result = array('reply_spdp' => form_error('reply_spdp'), 
                           'file_reply_spdp' => form_error('file_reply_spdp'),
                           'hash' => $this->security->get_csrf_hash()      
                        );     
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
        else
        {
            $config['upload_path']="./assets/reply_Spdp";
            $config['allowed_types']='gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);

            $result = array('hash' => $this->security->get_csrf_hash());       
            $post   = $this->input->post(NULL, TRUE);          

            if($this->upload->do_upload('file_reply_spdp'))
            {
                $data = array('upload_data' => $this->upload->data('file_name'));
                $result = array('success' => 'Data has been inserted', 
                                'newToken' => $this->security->get_csrf_hash());
            }
            else
            {
               $result = array('file_reply_spdp' => 'Opps, Something error');
            }
            $url = bin2hex(openssl_random_pseudo_bytes(32));
            $insert = array('id_spdp' =>  $post['id_spdp'],
                            'id_police' => $post['id_police'],
                            'id_judicary' =>  $this->session->userdata('id'),
                            'message' => $post['reply_spdp'], 
                            'file' => $data['upload_data'], 
                            'url_notification' => $url, 
                            'status_read' => 'unread');
            $this->db->set('date', 'NOW()', FALSE);
            $this->db->insert('tbl_reply_spdp', $insert);

            $update =  array('status_reply' => '1');
            $this->db->where('id',  $post['id_spdp']);
            $this->db->update('tbl_police', $update);

            // insert notification
            $notification = array('id_users' => $this->session->userdata('id'),
                                  'type'     => 'reply spdp',
                                  'message'  => $post['reply_spdp'],
                                  'url'      => $url, 
                                  'status'   => 'unread');
            $this->db->insert('notification', $notification);  

            $this->load->view('vendor/autoload.php');
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
                );
                $pusher = new Pusher\Pusher(
                '30c7051b6b50d432b7b9',
                'a7448f51e726240fe5df',
                '779476',
                $options
            );
            $data['message'] = 'success_police';
            $pusher->trigger('my-channel', 'my-event', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
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
    public function form_entry()
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
            $this->template->load('pages/template/template','pages/kejaksaan/form_entry/content');    
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
                $biasa  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('biasa')))
            {
                $biasa  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('narkotika')))
            {
                $narkotika  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('kejaksaan')))
            {
                $kejaksaan  = $this->upload->data(); 
            }
            if (!empty($this->upload->do_upload('pengadilan')))
            {
                $pengadilan     = $this->upload->data(); 
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
                $post = $this->input->post(NULL, TRUE);
                $url  = md5(uniqid());
                $data = array('id_users'            => $this->session->userdata('id'),
                              'nama_tersangka'      => $post['nama_tersangka'],
                              'pasal'               => $post['pasal'],
                              'no_sprindik'         => $post['no_sprindik'],
                              'no_lp'               => $post['no_lp'],
                              'spdp'                => $spdp['file_name'],
                              'ijin_geledah'        => $ijin_geledah['file_name'],
                              'setuju_geledah'      => $setuju_geledah['file_name'],
                              'khusus'              => $khusus['file_name'],
                              'biasa'               => $biasa['file_name'],
                              'narkotika'           => $narkotika['file_name'], 
                              'kejaksaan'           => $kejaksaan['file_name'], 
                              'pengadilan'          => $pengadilan['file_name'], 
                              'p_18'                => $p_18['file_name'], 
                              'p_21'                => $p_21['file_name'],  
                              'pelimpahan'          => $pelimpahan['file_name'],
                              'url'                 => $url );

            $this->m_kepolisian->simpan($data); 
            $this->m_pesan->generatePesan('berhasil', 'Surat berhasil di simpan dan terkirim!');
            redirect(base_url('kepolisian/form'));          
        }
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
                $this->m_pesan->generatePesan('cek', 'Surat ini sudah dibalas!');
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
            else
            {
                $this->m_pesan->generatePesan('gagal', 'file terlalu besar!');
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
            $this->m_pesan->generatePesan('berhasil', 'Surat telah dibalas!');
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
            $this->m_pesan->generatePesan('berhasil', 'Surat balasan telah di update!');
            redirect(current_url());    
        }
    }

    public function hapus_balasan($id)
    {	
		$hapus = $this->m_surat->hapus_balasan_kj($id);
		if ($hapus = TRUE) 
		{
            $this->m_pesan->generatePesan('berhasil', 'Surat balasan telah dihapus!');
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

