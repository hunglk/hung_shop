<?php
class Permision_model extends CI_Model
{

	protected $table_name = 'shop_permision';

	public function __construct()
	{
		parent::__construct();
	}
//PERMISION
	public function get_list_permision()
	{
		return $this->db->get($this->table_name)->result_array();
	}

	public function add_permision($data)
	{
		$this->db->insert($this->table_name, $this->db->escape($data));
	}

	public function update_permision($pm_id, $data)
	{
		$this->db->where('pm_id', $pm_id);
		$this->db->update($this->table_name, $this->db->escape($data));
	}

	public function find_record($pm_id)
	{
		$this->db->where('pm_id', $pm_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function delete($pm_id)
	{
		$this->db->where('pm_id', $pm_id);
		$this->db->delete($this->table_name);
	}

	public function get_permison()
	{
		$module_id = $this->get_module()[0]['module_id'];
		$group_user_id = $this->session->userdata('group_user_id');

		$this->db->where('module_id', $module_id);
		$this->db->where('id_group_user', $group_user_id);
		$query = $this->db->get($this->table_name);

		$return = $query->result_array();
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
//MODULES
	public function get_list_modules()
	{
		return $this->db->get('shop_module')->result_array();
	}

	public function get_module_by_id($module_id)
	{
		$this->db->where('module_id', $module_id);
		$query = $this->db->get('shop_module');
		return $query->result_array();
	}

	public function get_module()
	{
		$module = $this->uri->segment(1);
		$this->db->where('name', $module);
		$query = $this->db->get('shop_module');
		return $query->result_array();
	}
//GROUP_MODEL
	public function get_groupuser_by_id($group_user_id)
	{
		$this->db->where('group_user_id', $group_user_id);
		$query = $this->db->get('shop_group_user');
		return $query->result_array();
	}

	public function get_list_group_user()
	{
		return $this->db->get('shop_group_user')->result_array();
	}

}
