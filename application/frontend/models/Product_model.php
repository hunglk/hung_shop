<?php
class Product_model extends CI_Model
{

	protected $table_name = 'tbl_product';

	public function __construct()
	{
		parent::__construct();

	}
//PRODUCT
	public function get_top4()
	{
		$this->db->where('status', '1');
		$this->db->limit(4);
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_str_where_clause($catid = NULL, $array_pid = NULL, $color_id = NULL, $amt = NULL, $min = NULL, $max = NULL)
	{
		$str_where_clause = "1=1";
		if (count($array_pid) > 0)
		{
			$str_where_clause .= " and pro_id in (select pro_id from tbl_product_category where cat_id={$catid})";
		}
		if ($color_id)
		{
			$str_where_clause .= " and color_id = {$color_id}";
		}
		if (strlen($amt)>0)
		{
			$str_where_clause .= " and price >= {$min} and price <= {$max}";
		}
		return $str_where_clause;
	}

	public function get_records_limit($whereClause = NULL, $limit = NULL, $start = NULL)
	{
		$this->db->order_by('pro_id', 'desc');
		if (isset($limit))
		{
			$this->db->limit($limit, $start);
		}
		if (isset($whereClause))
		{
			$this->db->where($whereClause, NULL, FALSE);
		}
		$query = $this->db->get($this->table_name);
		$result = $query->result_array();

		if ($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function count_records_limt($whereClause = NULL)
	{
		$this->db->order_by('pro_id', 'desc');
		if (isset($whereClause))
		{
			$this->db->where($whereClause, NULL, FALSE);
		}
		return $this->db->count_all_results($this->table_name);
	}

	public function get_list_product($offset, $start)
	{
		$this->db->limit($offset, $start);
		$this->db->order_by("pro_id", "desc");
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_list_product_by_id($offset, $start, $array_pid)
	{
		$this->db->limit($offset, $start);
		$this->db->where_in('pro_id', $array_pid);
		return $this->db->get($this->table_name)->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function count_by_cat_id($array_pid)
	{
		$this->db->where_in('pro_id', $array_pid);
		$total_sold = $this->db->count_all_results();
	}

	public function find_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function count_search($keyword)
	{
		$this->db->select();
		$this->db->like('name', $keyword);
		return $this->db->count_all_results($this->table_name);
	}

	public function get_search($keyword, $offset, $start)
	{
		$this->db->select();
		$this->db->like('name', $keyword);
		$this->db->limit($offset, $start);
		$this->db->order_by("pro_id", "desc");
		return $this->db->get($this->table_name)->result_array();
	}
//IMAGE
	public function get_image_url($image_id)
	{
		$this->db->where('image_id', $image_id);
		$query = $this->db->get('tbl_image');
		return $query->result_array();
	}

	public function find_image_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->order_by("image_id", "desc");
		$query = $this->db->get('tbl_image');
		return $query->result_array();
	}
//COLOR
	public function get_list_color()
	{
		return $this->db->get('tbl_color')->result_array();
	}

	public function find_color_record($color_id)
	{
		$this->db->where('color_id', $color_id);
		$query = $this->db->get('tbl_color');
		return $query->result_array();
	}
}
