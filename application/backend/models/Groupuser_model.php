<?php
class Groupuser_model extends CI_Model
{

	protected $table_name = 'shop_group_user';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_groupuser_by_id($group_user_id)
	{
		$this->db->where('group_user_id', $group_user_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function get_list_group_user()
	{
		return $this->db->get($this->table_name)->result_array();
	}

}
