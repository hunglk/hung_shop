<?php
class Roles extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('permision_model');
	}

	public function index()
	{
		$roles = $this->permision_model->get_list_permision();
		foreach ($roles as $key => $role)
		{
			$roles[$key]['group_user'] = $this->permision_model->get_groupuser_by_id($role['group_user_id']);
			$roles[$key]['module'] = $this->permision_model->get_module_by_id($role['module_id']);
		}
		$data['roles'] = $roles;
		$this->template->parse_view('content', 'admin/roles/index', $data);
		$this->template->render();
	}

	public function create()
	{
		$data['create'] = TRUE;
		$data['modules'] = $this->permision_model->get_list_modules();
		$data['groupusers'] = $this->permision_model->get_list_group_user();

		$this->template->parse_view('content', 'admin/roles/form', $data);
		$this->template->render();
	}

	public function edit($pm_id)
	{
		$data['create'] = FALSE;
		$data['role'] = $this->permision_model->find_record($pm_id);

		$data['modules'] = $this->permision_model->get_list_modules();
		$data['groupusers'] = $this->permision_model->get_list_group_user();
		$this->template->parse_view('content', 'admin/roles/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$pm_id = (int) $this->input->post('id');
		$this->permision_model->delete($pm_id);
		redirect('roles/index');
	}

	public function save()
	{
		$this->form_validation->set_rules('group_user_id', 'Roles', 'required');
		$this->form_validation->set_rules('module_id', 'Modules', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if ($this->input->post('id'))
			{
				$pm_id = (int) $this->input->post('id');
				$this->edit($pm_id);
			}
			else
			{
				$this->create();
			}
		}
		else
		{
			$group_user_id = (int) $this->input->post('group_user_id');
			$module_id = (int) $this->input->post('module_id');

			$data = array(
				'group_user_id' => $group_user_id,
				'module_id' => $module_id
			);
			if ($this->input->post('id'))
			{
				$pm_id = (int) $this->input->post('id');
				$this->permision_model->update_permision($pm_id, $data);
			}
			else
			{
				$this->permision_model->add_permision($data);
			}
			redirect('roles/index');
		}
	}

}