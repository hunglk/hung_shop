<?php
class Image_model extends CI_Model
{

	protected $table_name = 'tbl_image';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_image_url($image_id)
	{
		$this->db->where('image_id', $image_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function find_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->order_by("image_id", "desc");
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function add_image($data)
	{
		$this->db->insert($this->table_name, $data);
	}

	public function delete($image_id)
	{
		$this->db->where('image_id', $image_id);
		$this->db->delete($this->table_name);
	}

}
