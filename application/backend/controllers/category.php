<?php
class Category extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('permision_model');
		$this->load->Model('category_model');
	}

	public function index()
	{
		//Tree Category
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/category/index', $data);
		$this->template->render();
	}

	public function get_create()
	{
		$data['create'] = TRUE;
		$data['parents'] = $this->category_model->get_parent();
		//Tree Category
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/category/form', $data);
		$this->template->render();
	}

	public function get_edit()
	{
		$data['create'] = FALSE;
		$cat_id = $this->input->get('id');
		$data['category'] = $this->category_model->find_record($cat_id);
		//Tree Category
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/category/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$cat_id = $this->input->post('id');
		$this->category_model->delete($cat_id);

		redirect('category/index');
	}

	public function post_create()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('parent_id', 'Parent_id', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('category/get_create');
		}
		else
		{
			$name = trim($this->input->post('name'));
			$parent_id = $this->input->post('parent_id');

			$data = array(
				'name' => $name,
				'parent_id' => $parent_id
			);
			$this->category_model->add_category($data);

			redirect('category/index');
		}

	}

	public function post_edit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('parent_id', 'Parent_id', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			//redirect('category/get_create');
		}
		else
		{
			$cat_id = $this->input->post('id');
			$name = trim($this->input->post('name'));
			$parent_id = $this->input->post('parent_id');

			$data = array(
				'name' => $name,
				'parent_id' => $parent_id
			);
			$this->category_model->update_category($cat_id, $data);

			redirect('category/index');
		}
	}

}