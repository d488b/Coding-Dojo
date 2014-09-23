<?php

class User extends CI_Model
{
	public function insert_user($user)
	{
		$this->db->insert('users', $user);
	}

	public function login($user)
	{
		$temp = $this->db->select('*')->where('email', $user['email'])->get('users')->row();
		$password = $this->encrypt->decode($temp->password);
		if($password == $user['password'])
		{
			return $temp;
		}
		return null;
	}
}