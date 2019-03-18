<?php

class M_hashed extends CI_Model
{

	public function hash_string_password($password)
	{
		$hashed_string_password = password_hash($password, PASSWORD_BCRYPT, ['cost' =>11]);
		return $hashed_string_password;
	}

	public function hash_verify_password($password, $hashed_password)
	{
		$hashed_string_password = password_verify($password, $hashed_password);
		return $hashed_string_password;
	}
}