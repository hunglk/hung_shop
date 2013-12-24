<?php
class Color extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('color_model');
	}

	public function index()
	{
		$data['colors'] = $this->color_model->get_list_color();
		$this->template->parse_view('content', 'admin/color/index', $data);
		$this->template->render();
	}

	public function get_create()
	{
		$data['create'] = TRUE;
		$this->template->parse_view('content', 'admin/color/form', $data);
		$this->template->render();
	}

	public function get_edit()
	{
		$data['create'] = FALSE;
		$color_id = $this->input->get('id');
		$data['color'] = $this->color_model->find_record($color_id);
		$this->template->parse_view('content', 'admin/color/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$color_id = $this->input->post('id');
		$this->color_model->delete($color_id);
		redirect('color/index');
	}

	public function post_create()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('color/get_create');
		}
		else
		{
			$name = trim($this->input->post('name'));
			$data = array(
				'name' => $name
			);

			$this->color_model->add_color($data);
			redirect('color/index');
		}
	}

	public function post_edit()
	{
		echo 'dkmm';exit;
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//redirect('color/get_create');
		}
		else
		{
			$color_id = $this->input->post('id');
			$name = trim($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->color_model->update_color($color_id, $data);
			redirect('color/index');
		}
	}
}