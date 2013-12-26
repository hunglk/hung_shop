<?php
class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('user_model');
		$this->load->Model('permision_model');
	}

	public function index()
	{
		$data = array();

		$config = array();
		$config['base_url'] = base_url('index.php/user/index');
		$config['total_rows'] = $this->user_model->count_all();
		$config['per_page'] = per_06;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$start = (int) $this->uri->segment(3);

		$data['users'] = $this->user_model->get_list_user($config['per_page'], $start);
		if ($this->input->post('ajax'))
		{
			$this->load->view('admin/user/index_ajax', $data);
		}
		else
		{
			$this->template->parse_view('content', 'admin/user/index', $data);
			$this->template->render();
		}

	}

	public function create()
	{
		$data['create'] = TRUE;
		$data['roles'] = $this->permision_model->get_list_group_user();
		$this->template->parse_view('content', 'admin/user/form', $data);
		$this->template->render();
	}

	public function edit($user_id)
	{
		$data['create'] = FALSE;
		$data['user'] = $this->user_model->find_record($user_id);
		$data['roles'] = $this->permision_model->get_list_group_user();

		$this->template->parse_view('content', 'admin/user/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$user_id = (int) $this->input->post('id');
		$this->user_model->delete($user_id);

		redirect('user/index');
	}

	public function save()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|trim');
		$this->form_validation->set_rules('role_id', 'Roles', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if ($this->input->post('id'))
			{
				$user_id = (int) $this->input->post('id');
				$this->edit($user_id);
			}
			else
			{
				$this->create();
			}
		}
		else
		{
			$username = trim($this->input->post('username'));
			$email = trim($this->input->post('email'));
			if ($this->input->post('password'))
			{
				$password = trim(MD5($this->input->post('password')));
			}
			else
			{
				$password = $this->input->post('oldpass');
			}
			$role_id = (int) $this->input->post('role_id');

			$data = array(
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'group_user_id' => $role_id
			);

			if ($this->input->post('id'))
			{
				$user_id = (int) $this->input->post('id');
				$this->user_model->update_user($user_id, $data);
			}
			else
			{
				$this->user_model->add_user($data);
			}

			redirect('user/index');
		}
	}

}