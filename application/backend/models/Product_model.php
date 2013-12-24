<?php
class Product_model extends CI_Model
{

	protected $table_name = 'tbl_product';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_product($offset, $start)
	{
		$this->db->limit($offset, $start);
		$this->db->order_by("pro_id", "desc");
		return $this->db->get($this->table_name)->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function find_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function add_product($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	public function update_product($pro_id, $data)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->update($this->table_name, $data);
	}

	public function delete($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->delete($this->table_name);
	}
}
