<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/jakarta');
	}
	public function findUser($email)
	{
		$this->db->select('users.*, users.id as id_session, role.*, role.role as role_name, users_on_role.*');
		$this->db->from('users');
		$this->db->join('users_on_role', 'users_on_role.user_id = users.id', 'left');
		$this->db->join('role', 'role.id = users_on_role.role_id', 'left');
		$this->db->where('users.email', $email);
		return $this->db->get();
	}

	public function _check_token($token)
	{
		$this->db->where('forgotten_password_token', $token);
		return $this->db->get('users'); 
	}

	public function _forgotten_password_token($token, $email)
	{
		$this->db->where('email', $email);
	    $this->db->update('users', array('forgotten_password_token' => $token, 'forgotten_password_time' => NOW()));
		if ($this->db->affected_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function change_password($token)
	{
		$this->form_validation->set_rules('new_password', 'Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm New Password ', 'trim|required|matches[new_password]');
		$this->form_validation->set_error_delimiters('<strong><span class="help-block auth_validate"><i class="fa fa-times-circle-o"></i>','</span></strong>');

		if ($this->form_validation->run() === TRUE) 
		{
			$password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
			$this->db->where('forgotten_password_token', $token);
			$this->db->update('users', ['password' => $password, 'forgotten_password_token' => NULL, 'forgotten_password_time' => NULL]);
			$this->m_message->generateMessage('success', 'Password successfully changed');
			redirect('login');
		}
		else
		{
			return false;
		}
	}

	public function get_user()
	{
		$this->db->select('users.*, users.id as id_users, role.*, users_on_role.*');
		$this->db->from('users');
		$this->db->join('users_on_role', 'users_on_role.user_id = users.id', 'left');
		$this->db->join('role', 'role.id = users_on_role.role_id', 'left');
		$this->db->where('users.id !=', 1);
		return $this->db->get();
	}

	public function findUserById($id)
	{
		$this->db->select('users.*, users.id as id_users, role.*, users_on_role.*');
		$this->db->from('users');
		$this->db->join('users_on_role', 'users_on_role.user_id = users.id', 'left');
		$this->db->join('role', 'role.id = users_on_role.role_id', 'left');
		$this->db->where('users.id', $id);
		return $this->db->get();
	}

	public function get_role($get = null)
	{
		if ($get == "role") 
		{
			$this->db->select('*');
			$this->db->from('role');
			$this->db->where('role !=', 'admin');
			$query = $this->db->get();
			return $query->result_array();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('role');
			$this->db->where('role !=', 'admin');
			$query = $this->db->get();
			foreach($query->result() as $row)
			{	
				$array[''] = 'choose role';
				$array[$row->id] = $row->role;
				return $array;
			}
			// return $array;
		}
	}

	public function create_user($data)
	{
		$role = $this->auth->users();
	 	$this->db->insert('users', $data);
		$role_id   = $this->input->post('role');
	 	$user_id   = $this->db->insert_id();
	 	$this->db->insert('users_on_role', ['role_id' => $role_id, 'user_id'=> $user_id, 'created_at' => date('Y-m-d H:i:s')]);
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);
		if ($update) 
		{
			$this->db->where('user_id', $this->uri->segment(3));
			$this->db->update('users_on_role', ['role_id'=> $this->input->post('role')]);
		}

	}

	public function check_unique_user_email($id = '', $email) 
	{
        $this->db->where('email', $email);
        if($id) 
        {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('users')->num_rows();
    }
	
	public function delete_user($id)
	{
		$this->db->delete('users', ['id'=> $id]);
		$this->delete_users_on_role($id);
	}

	public function delete_users_on_role($id)
	{
		return $this->db->delete('users_on_role', ['user_id'=> $id]);
	}

	public function create_role($data)
	{
	 	$this->db->insert('role', $data);
	}

	public function update_role($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('role', array('role' => $data));
	}

	public function check_role_unique($id = '', $role) 
	{
        $this->db->where('role', $role);
        if($id) 
        {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('role')->num_rows();
    }

	public function delete_role($id)
	{
		$this->db->delete('role', ['id'=> $id]);
	}
}

/* End of file authentication.php */
/* Location: ./application/models/authentication.php */