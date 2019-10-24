<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_is_logged();	
	}

	public function index()
	{
		$session_id	   = $this->session->userdata('id');
		$data['users'] = $this->m_profile->ambil_users($session_id)->row();
        $this->template->load('pages/template/template','pages/profile/content', $data);
	}

	public function check_user() 
	{        
		$username = $this->input->post('username');
	    if($this->input->post('id'))
	    {
	        $id = $this->input->post('id');
	    }
	    else
	    {
	        $id = '';
	    }
	    $result = $this->m_profile->check_is_unique($id, $username);
	    if($result == 0)
	    {
	        return true;
	    }
	    else 
	    {
	        $this->form_validation->set_message('check_user', 'Upps! Username already taken, choose other!');
	        return false;
	    }
	}

	public function change_password()
	{
		$data['users'] = $this->m_profile->ambil_users($this->session->userdata('id'))->row();
		$post 	  = $this->input->post(NULL, TRUE);
		
		$this->form_validation->set_rules('username', 'username', 'required|callback_check_user');
		if ($post['password_lama']) {
			$this->form_validation->set_rules('password_baru','<b>Password Baru</b>', 'required|trim|min_length[8]');
			$this->form_validation->set_rules('password_confirm','<b>password_confirm</b>', 'required|trim|matches[password_baru]|min_length[8]');
		}
		if ($post['password_baru']) 
		{
			$this->form_validation->set_rules('password_lama','Password Lama', 'required');
			$this->form_validation->set_rules('password_baru','<b>Password Baru</b>', 'required|trim|min_length[8]');
		}
		if ($post['password_confirm']) 
		{
			$this->form_validation->set_rules('password_confirm','<b>password_confirm</b>', 'required|trim|matches[password_baru]|min_length[8]');
		}
        $this->form_validation->set_error_delimiters('<p class="validate" style="color:red;"><i class="fa fa-exclamation-circle"></i> ','</p>');
		if ($this->form_validation->run() === FALSE ) 
		{
	        $this->template->load('pages/template/template','pages/profile/content', $data);
		}
		else
		{
			$users = $this->m_profile->check_users($post['email']);
			if ($users->num_rows() > 0) 
			{
				$password = $users->row();
				$this->m_profile->change_password($post, $password);
				$this->m_pesan->generatePesan('berhasil', 'Profile telah di update!');
				redirect('profile');
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
                $config['allowed_types'] = 'gif|jpg|png';
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
                    $data['error_msg'] = $this->upload->display_errors();
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