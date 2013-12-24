<?php
class Modules_model extends CI_Model
{

	protected $table_name = 'shop_module';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_modules()
	{
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_module_by_id($module_id)
	{
		$this->db->where('module_id', $module_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function get_module()
	{
		$module = $this->uri->segment(1);
		$this->db->where('name', $module);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

}
