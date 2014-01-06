<?php
class Product_model extends CI_Model
{

	protected $table_name = 'shop_product';

	public function __construct()
	{
		parent::__construct();

	}
//PRODUCT
	public function get_top5()
	{
		$this->db->where('selected_id !=', '0');
		$this->db->order_by('selected_id', 'desc');
		$this->db->limit(5);
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_str_where_clause($array_cat_id = NULL, $array_pid = NULL, $color_id = NULL, $amt = NULL, $min = NULL, $max = NULL)
	{
		$str_where_clause = "1=1";

		if ($amt)
		{
			$str_where_clause .= " and price >= {$min} and price <= {$max}";
		}
		if ($color_id)
		{
			$arr = implode ( ', ', $color_id);
			$str_where_clause .= " and color_id in ({$arr})";
		}
		if (count($array_cat_id)>0)
		{
			$arr = implode ( ', ', $array_cat_id);
			$str_where_clause .= " and pro_id in (select pro_id from shop_product_category where cat_id in ({$arr}))";
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
		$this->db->order_by('pro_id', 'desc');
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_list_product_by_id($offset, $start, $array_pid)
	{
		$this->db->limit($offset, $start);
		if(count($array_pid) > 0)
		{
			$this->db->where_in('pro_id', $array_pid);
		}
		else
		{
			return FALSE;
		}
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
		$this->db->order_by('pro_id', 'desc');
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_color_by_pid($array_pid)
	{
		if (count($array_pid) > 0)
		{
			$this->db->select();
			$this->db->distinct();
			$this->db->where_in('pro_id', $array_pid);
			return $this->db->get($this->table_name)->result_array();
		}
		return false;
	}

	public function get_min_price($array_pid)
	{
		$this->db->select_min('price');
		if(count($array_pid)>0)
		{
			$this->db->where_in('pro_id', $array_pid);
		}
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_max_price($array_pid)
	{
		$this->db->select_max('price');
		if(count($array_pid)>0)
		{
			$this->db->where_in('pro_id', $array_pid);
		}
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_pid_by_amount($min, $max)
	{
		$this->db->where('price >=', $min);
		$this->db->where('price <=', $max);
		//echo $this->db->last_query();exit;
		return $this->db->get($this->table_name)->result_array();
	}
//PRODUCT CATEGORY
	public function find_pro_cat_record($pro_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->order_by('pro_cat_id', 'desc');
		$query = $this->db->get('shop_product_category');
		return $query->result_array();
	}

	public function get_pro_id_by_cat_id($cat_id)
	{
		$this->db->where_in('cat_id', $cat_id);
		$this->db->order_by('pro_cat_id', 'desc');
		$query = $this->db->get('shop_product_category');
		return $query->result_array();
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
//COLOR
	public function get_list_color()
	{
		return $this->db->get('shop_color')->result_array();
	}

	public function get_list_color_by_cid($array_cid)
	{
		$this->db->where_in('color_id', $array_cid);
		//echo $this->db->last_query();
		return $this->db->get('shop_color')->result_array();
	}

	public function find_color_record($color_id)
	{
		$this->db->where('color_id', $color_id);
		$query = $this->db->get('shop_color');
		return $query->result_array();
	}
}
