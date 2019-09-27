<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_validator extends CI_Model 
{
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
                $this->form_validation->set_message('t_6', 'Pilih file T-6 hanya word atau pdf.');
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
                $this->form_validation->set_message('t_7', 'Pilih file T-7 hanya word atau pdf.');
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
                $this->form_validation->set_message('t_10', 'Pilih file T-10 hanya word atau pdf.');
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
                $this->form_validation->set_message('p_29', 'Pilih file P-29 hanya word atau pdf.');
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
}
