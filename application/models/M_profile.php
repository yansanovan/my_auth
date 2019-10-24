<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model 
{

	public function ambil_users($session_id)
	{
		$this->db->where('id', $session_id);
		$user = $this->db->get('tbl_users');
		return $user;
	}

	public function check_users($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		return $query;
	}

	public function change_password($post, $password)
	{
		$param['username'] = $post['username']; 
		if (!empty($post['password_baru'])) {
			$check = password_verify($post['password_lama'], $password->password);
			if ($check) 
			{
				$param['password'] =  password_hash($post['password_baru'], PASSWORD_BCRYPT, ['cost' =>11]);
			}
			else
			{
				$this->m_pesan->generatePesan('salah', 'Password lama tidak sama!');
				redirect('profile');
			}
		}
		$this->db->where('id', $post['id']);
		$this->db->update('tbl_users', $param);
		return true;
	}

	function check_is_unique($id = '', $username) 
	{
        $this->db->where('username', $username);
        if($id) 
        {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tbl_users')->num_rows();
    }
}
