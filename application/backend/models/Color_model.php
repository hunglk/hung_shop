<?php
class Color_model extends CI_Model
{

	protected $table_name = 'shop_color';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_color()
	{
		return $this->db->get($this->table_name)->result_array();
	}

	public function find_record($color_id)
	{
		$this->db->where('color_id', $color_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function add_color($data)
	{
		$this->db->insert($this->table_name, $this->db->escape($data));
	}

	public function update_color($color_id, $data)
	{
		$this->db->where('color_id', $color_id);
		$this->db->update($this->table_name, $this->db->escape($data));
	}

	public function delete($color_id)
	{
		$this->db->where('color_id', $color_id);
		$this->db->delete($this->table_name);
	}
}
