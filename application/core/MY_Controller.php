<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
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

class MY_Validate extends CI_Controller 
{
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
    public function p_17($str)
    {        
        $allowed_mime_type_arr = array('application/pdf','application/msword');
        $mime = get_mime_by_extension($_FILES['p_17']['name']);
        if($_FILES['p_17']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('p_17', 'Pilih P-17 hanya word atau pdf.');
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
                $this->form_validation->set_message('p_17', 'file P-17 tidak boleh kosong.');
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
}