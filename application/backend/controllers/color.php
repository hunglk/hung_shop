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

	public function create()
	{
		$data['create'] = TRUE;
		$this->template->parse_view('content', 'admin/color/form', $data);
		$this->template->render();
	}

	public function edit($color_id)
	{
		$data['create'] = FALSE;
		$data['color'] = $this->color_model->find_record($color_id);
		$this->template->parse_view('content', 'admin/color/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$color_id = (int) $this->input->post('id');
		$this->color_model->delete($color_id);
		redirect('color/index');
	}

	public function save()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			if ($this->input->post('id'))
			{
				$color_id = (int) $this->input->post('id');
				$this->edit($color_id);
			}
			else
			{
				$this->create();
			}
		}
		else
		{
			$name = trim($this->input->post('name'));
			$data = array(
				'name' => $name
			);

			if ($this->input->post('id'))
			{
				$color_id = (int) $this->input->post('id');
				$this->color_model->update_color($color_id, $data);
			}
			else
			{
				$this->color_model->add_color($data);
			}
			redirect('color/index');
		}
	}
}