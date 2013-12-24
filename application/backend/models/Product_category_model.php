<?php
class Product_category_model extends CI_Model
{

	protected $table_name = 'shop_product_category';

	public function __construct()
	{
		parent::__construct();
	}

	public function find_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->order_by("pro_cat_id", "desc");
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function add_product_category($data)
	{
		$this->db->insert($this->table_name, $data);
	}

	public function delete($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->delete($this->table_name);
	}

}
