<?php
class User_model extends CI_Model
{

	protected $table_name = 'shop_user';

	public function __construct()
	{
		parent::__construct();
	}

	public function check_login($username, $password)
	{
		$md5pass = md5($password);
		$this->db->where('username', $username);
		$this->db->where('password', $md5pass);

		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function get_list_user($offset, $start)
	{
		$this->db->limit($offset, $start);
		$this->db->order_by('user_id', 'desc');
		return $this->db->get($this->table_name)->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function add_user($data)
	{
		$this->db->insert($this->table_name, $this->db->escape($data));
	}

	public function find_record($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function update_user($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update($this->table_name, $this->db->escape($data));
	}

	public function delete($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->table_name);
	}
}
