<?php
class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model("admin_model");
	}

	public function index()
	{
		$data = array();
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[200]|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view("admin/login", $data);
		}
		else
		{
			$username = trim($this->input->post('username'));
			$password = trim($this->input->post('password'));

			if ($this->admin_model->check_login($username, $password))
			{
				$check = $this->admin_model->check_login($username, $password);
				$user_id = $check[0]['user_id'];
				$group_user_id = $check[0]['group_user_id'];
				$session_data = array(
					'logged_in' => TRUE,
					'username' => $username,
					'user_id' => $user_id,
					'group_user_id' => $group_user_id
				);
				$this->session->set_userdata($session_data);

				redirect('admin/dash', $data);
			}
			else
			{
				$data['login_error']  = 'Username or password is not correct!';
				$this->load->view('admin/login', $data);
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('admin/login');
	}

	public function dash()
	{
		$this->load->view('admin/dash');
	}
}
