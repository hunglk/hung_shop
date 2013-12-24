<?php
class Permision_model extends CI_Model
{

	protected $table_name = 'shop_permision';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_permision()
	{
		return $this->db->get($this->table_name)->result_array();
	}

	public function add_permision($data)
	{
		$this->db->insert($this->table_name, $data);
	}

	public function update_permision($pm_id, $data)
	{
		$this->db->where('pm_id', $pm_id);
		$this->db->update($this->table_name, $data);
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
		$this->load->Model("modules_model");
		$module_id = $this->modules_model->get_module()[0]['module_id'];
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

}
