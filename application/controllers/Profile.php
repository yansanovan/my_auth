<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_coba_loggin();	
		$this->load->model('m_hashed');
		$this->load->model('m_profile');
	}

	public function index()
	{
		$session_id	   = $this->session->userdata('id');
		$data['users'] = $this->m_profile->ambil_users($session_id)->row();

        $this->template->load('pages/template/template','pages/profile/content', $data);

	}

	public function change_password()
	{
		$session_id	   = $this->session->userdata('id');
		$data['users'] = $this->m_profile->ambil_users($session_id)->row();
		
		$this->form_validation->set_rules('password_lama','<b>Password Lama</b>', 'required', array('required' => 'Masukan Password Lama!'));
		$this->form_validation->set_rules('password_baru','<b>Password Baru</b>', 'required|trim|min_length[8]', array('required' => 'Masukan Password Baru!'));
		$this->form_validation->set_rules('password_confirm','<b>password_confirm</b>', 'required|trim|matches[password_baru]|min_length[8]', array('required' => 'Confirm Password Tidak boleh kosong!'));

        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
			

		if ($this->form_validation->run() === FALSE ) 
		{
	        $this->template->load('pages/template/template','pages/profile/content', $data);
		}
		else
		{
			$post 	  = $this->input->post(NULL, TRUE);
			$userdata = $this->m_profile->cek_users($post['email']);
			if ($userdata->num_rows() > 0) 
			{
				foreach($userdata->result() as $value) 
				{
					if ($this->m_hashed->hash_verify_password($post['password_lama'], $value->password))
					{
						$this->m_profile->ubah_password($post['id'], $post['password_baru']);
						$this->m_pesan->generatePesan('berhasil', 'Password telah di update!');
						redirect('profile');
					}
					else
					{
						$this->m_pesan->generatePesan('salah', 'Password lama tidak sama!');
						redirect('profile');
					}
				}
			}
			else
			{
				redirect('profile');
			}
		}
	}

	public function upload()
	{
		$session_id	   = $this->session->userdata('id');
        $data = array();

        if($this->input->post('uploadFile'))
        {
            $this->form_validation->set_rules('file', '', 'callback_file_check');
	        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');

            if($this->form_validation->run() == TRUE)
            {
                $config['upload_path']   = './asset/img/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = 1024;
                $this->load->library('upload', $config);
                if($this->upload->do_upload('file'))
                {
					$value = $this->m_profile->ambil_users($session_id)->row();

                	$old_image = $value->image;
                	if ($old_image != 'default.jpg') 
                	{
	                    @unlink('./asset/img/'. $old_image);
                	}
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    $this->db->where('id', $session_id);
                    $this->db->set('image', $uploadedFile);
                    $this->db->update('tbl_users');
                    $data['success_msg'] = 'Gambar berhasil di update.';
                }
                else
                {
                    $data['error_msg'] = 'Gambar Terlalu besar';
                }
            }
        }
        
		
		$data['users'] = $this->m_profile->ambil_users($session_id)->row();
        $this->template->load('pages/template/template','pages/profile/content', $data);
    }
    
    public function file_check($str)
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/jpg');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Pilih hanya gif/jpg/png file.');
                return false;
            }
        }
        else
        {
            $this->form_validation->set_message('file_check', 'Silahkan Pilih gambar.');
            return false;
        }
    }
}