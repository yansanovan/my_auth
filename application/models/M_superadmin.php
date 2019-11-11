<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_superadmin extends CI_Model 
{
	public function tampil_users($id = NULL)
	{
		if ($id != NULL)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('tbl_users');
			return $query->row();
		}
		$this->db->where('id !=', 5);
		$query = $this->db->get('tbl_users');
		return $query->result();
	}

	function check_unique_user_email($id = '', $email) {
        $this->db->where('email', $email);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tbl_users')->num_rows();
    }

	public function cek_id($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('tbl_users');
		return $query;
	}

	public function store($data)
	{
		$this->db->insert('tbl_users', $data);
		return true;
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_users', $data);
		return true;
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_users');
		return true;
	}
}
