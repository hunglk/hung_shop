<?php
class Category extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('permision_model');
		$this->load->Model('category_model');
	}
//CATEGORY
	public function index()
	{
		//Tree Category
		$cats = $this->category_model->get_parent();
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/category/index', $data);
		$this->template->render();
	}

	public function create()
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

	public function edit($cat_id)
	{
		$data['create'] = FALSE;
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

	public function save()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('parent_id', 'Parent_id', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			if ($this->input->post('id'))
			{
				$cat_id = (int) $this->input->post('id');
				$this->edit($cat_id);
			}
			else
			{
				$this->create();
			}
		}
		else
		{
			$name = trim($this->input->post('name'));
			$parent_id = (int) $this->input->post('parent_id');

			$data = array(
				'name' => $name,
				'parent_id' => $parent_id
			);

			if ($this->input->post('id'))
			{
				$cat_id = (int) $this->input->post('id');
				$this->category_model->update_category($cat_id, $data);
			}
			else
			{
				$this->category_model->add_category($data);
			}

			redirect('category/index');
		}
	}

	public function delete()
	{
		$cat_id = (int) $this->input->post('id');
		$this->category_model->delete($cat_id);
		$this->delete_product_category($cat_id);

		redirect('category/index');
	}
//CATEGORY PRODUCT
	public function delete_product_category($cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->delete('shop_product_category');
	}

	public function get_pro_id_by_cat_id($cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->order_by('pro_cat_id', 'desc');
		$query = $this->db->get('shop_product_category');
		return $query->result_array();
	}
//PRODUCT
	public function delete_product($array_pid)
	{
		$this->db->where('pro_id', $array_pid);
		$this->db->delete('shop_product');
	}

}