<?php
class Product_model extends CI_Model
{

	protected $table_name = 'shop_product';

	public function __construct()
	{
		parent::__construct();
	}
//PRODUCT
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
//IMAGE
	public function get_image_url($image_id)
	{
		$this->db->where('image_id', $image_id);
		$query = $this->db->get('shop_image');
		return $query->result_array();
	}

	public function find_image_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->order_by('image_id', 'desc');
		$query = $this->db->get('shop_image');
		return $query->result_array();
	}

	public function add_image($data)
	{
		$this->db->insert('shop_image', $data);
	}

	public function delete_image($image_id)
	{
		$this->db->where('image_id', $image_id);
		$this->db->delete('shop_image');
	}

}
