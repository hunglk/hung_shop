<?php
class Admin_model extends CI_Model
{

	protected $table_name = 'shop_user';

	public function check_login($username, $password)
	{
		$md5pass = MD5($password);
		$this->db->where('username', $username);
		$this->db->where('password', $md5pass);

		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

}

