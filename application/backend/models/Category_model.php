<?php
class Category_model extends CI_Model
{

	protected $table_name = 'shop_category';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_records($whereclause = NULL)
	{
		if (isset($whereclause))
		{
			$this->db->where($whereclause, NULL, FALSE);
		}

		$query = $this->db->get($this->table_name);
		$result = $query->result_array();
		if ($result)
		{
			return $result;
		}
		return FALSE;
	}

	public function get_child_cats($parent_cat)
	{
		$child_cats = $this->category_model->get_records('parent_id = ' . $parent_cat['cat_id']);
		if ($child_cats !== FALSE)
		{
			foreach ($child_cats as $key => $cat)
			{
				$child_cats[$key]['child_cats'] = $this->get_child_cats($cat);
			}
		}
		return $child_cats;
	}

	public function get_list_category()
	{
		return $this->db->get($this->table_name)->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function get_parent()
	{
		$this->db->where('parent_id', '0');
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function get_child_by_parent_id($parent_id)
	{
		$this->db->where('parent_id', $parent_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function find_record($cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function find_record_by_parent_id($parent_id)
	{
		$this->db->where('parent_id', $parent_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function add_category($data)
	{
		$this->db->insert($this->table_name, $this->db->escape($data));
	}

	public function update_category($cat_id, $data)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->update($this->table_name, $this->db->escape($data));
	}

	public function update_array_category($array_pid, $data)
	{
		$this->db->where_in('cat_id', $array_pid);
		$this->db->update($this->table_name, $this->db->escape($data));
	}

	public function delete($cat_id)
	{
		//update
		$record = $this->find_record($cat_id);
		$parent_id = $record[0]['parent_id'];


		if ($this->find_record_by_parent_id($cat_id))
		{
			$record_by_parent_id = $this->find_record_by_parent_id($cat_id);
			$array_pid = array();
			foreach ($record_by_parent_id as $pid)
			{
				$array_pid[] = $pid['cat_id'];
			}

			$data = array(
				'parent_id' => $parent_id
			);
			$this->update_array_category($array_pid, $data);
		}
		//delete
		$this->db->where('cat_id', $cat_id);
		$this->db->delete($this->table_name);
	}

}
