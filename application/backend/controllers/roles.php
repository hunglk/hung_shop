<?php
class Roles extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('permision_model');
		$this->load->Model('modules_model');
		$this->load->Model('groupuser_model');
	}

	public function index()
	{
		$data['roles'] = $this->permision_model->get_list_permision();
		$this->template->parse_view('content', 'admin/roles/index', $data);
		$this->template->render();
	}

	public function get_create()
	{
		$data['create'] = TRUE;
		$data['modules'] = $this->modules_model->get_list_modules();
		$data['groupusers'] = $this->groupuser_model->get_list_group_user();

		$this->template->parse_view('content', 'admin/roles/form', $data);
		$this->template->render();
	}

	public function get_edit()
	{
		$data['create'] = FALSE;
		$pm_id = $this->input->get('id');
		$data['role'] = $this->permision_model->find_record($pm_id);

		$data['modules'] = $this->modules_model->get_list_modules();
		$data['groupusers'] = $this->groupuser_model->get_list_group_user();
		$this->template->parse_view('content', 'admin/roles/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$pm_id = $this->input->post('id');
		$this->permision_model->delete($pm_id);
		redirect('roles/index');
	}

	public function post_create()
	{
		$this->form_validation->set_rules('group_user_id', 'Roles', 'required');
		$this->form_validation->set_rules('module_id', 'Modules', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('role_create_error', 'You missed some details, please try again.');
			//redirect('roles/get_create');
		}
		else
		{
			$group_user_id = $this->input->post('group_user_id');
			$module_id = $this->input->post('module_id');

			$data = array(
				'id_group_user' => $group_user_id,
				'module_id' => $module_id
			);

			$this->permision_model->add_permision($data);
			redirect('roles/index');
		}
	}

	public function post_edit()
	{
		$this->form_validation->set_rules('group_user_id', 'Roles', 'required');
		$this->form_validation->set_rules('module_id', 'Modules', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('role_create_error', 'You missed some details, please try again.');
			//redirect('roles/get_create');
		}
		else
		{
			$pm_id = $this->input->post('id');
			$group_user_id = $this->input->post('group_user_id');
			$module_id = $this->input->post('module_id');

			$data = array(
				'id_group_user' => $group_user_id,
				'module_id' => $module_id
			);
			$this->permision_model->update_permision($pm_id, $data);
			redirect('roles/index');
		}
	}
}