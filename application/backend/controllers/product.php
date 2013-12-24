<?php
class Product extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('permision_model');
		$this->load->Model('product_model');
		$this->load->Model('category_model');
		$this->load->Model('image_model');
		$this->load->Model('color_model');
		$this->load->Model('product_category_model');
	}

	public function index()
	{
		$data = array();

		$config = array();
		$config["base_url"] = base_url('index.php/product/index');
		$config["total_rows"] = $this->product_model->count_all();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$data['pagination_product'] = $this->pagination->create_links();

		$start = $this->uri->segment(3);

		$products = $this->product_model->get_list_product($config['per_page'], $start);
		foreach ($products as $key => $prod)
		{
			$products[$key]['prod_img'] = $this->image_model->find_record($prod['pro_id']);
			$products[$key]['prod_color'] = $this->color_model->find_record($prod['color_id']);
		}
		$data['products'] = $products;

		if ($this->input->post("ajax"))
		{
			$this->load->view("admin/product/index_ajax", $data);
		}
		else
		{
			$this->template->parse_view('content', 'admin/product/index', $data);
			$this->template->render();
		}
	}

	public function get_child_cats($parent_cat)
	{
		$child_cats = $this->category_model->get_records('parent_id = ' . $parent_cat['cat_id']);
		if ($child_cats !== FALSE)
		{
			foreach ($child_cats as $key => $cat)
			{
				$child_cats[$key]['child_cats'] = $this->get_child_cats($cat);
			}
		}
		return $child_cats;
	}

	public function get_create()
	{
		$data['create'] = TRUE;
		$data['parents'] = $this->category_model->get_parent();
		$data['colors'] = $this->color_model->get_list_color();
		//Tree Category
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/product/form', $data);
		$this->template->render();
	}

	public function get_edit()
	{
		$data['create'] = FALSE;
		$pro_id = $this->input->get('id');
		$data['product'] = $this->product_model->find_record($pro_id);
		$data['colors'] = $this->color_model->get_list_color();
		$data['parents'] = $this->category_model->get_parent();
		$data['product_category_id'] = $this->product_category_model->find_record($pro_id);
		$data['images'] = $this->image_model->find_record($pro_id);
		//Tree Category
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		//End
		$this->template->parse_view('content', 'admin/product/form', $data);
		$this->template->render();
	}

	public function delete()
	{
		$pro_id = $this->input->post('id');
		$images_pro_id = $this->product_model->find_record($pro_id)[0]['pro_id'];
		$images = $this->image_model->find_record($images_pro_id);

		foreach ($images as $img)
		{
			$paths = $this->image_model->get_image_url($img['image_id']);
			foreach ($paths as $path)
			{
				unlink($path['url']);
				$this->image_model->delete($img['image_id']);
			}
		}
		$this->product_model->delete($pro_id);
		redirect('product/index');
	}

	public function delete_image()
	{
		$image_id = $this->input->post('id');
		$path = $this->image_model->get_image_url($image_id)[0]['url'];
		unlink($path);
		$this->image_model->delete($image_id);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function post_create()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'required|integer|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
		//$this->form_validation->set_rules('img1', 'Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('product_create_error', 'You missed some details, please try again.');
			redirect('product/get_create');
		}
		else
		{
			$cat_id = $this->input->post('cat_id');
			$name = trim($this->input->post('name'));
			$price = trim($this->input->post('price'));
			$color_id = $this->input->post('color_id');
			$description = trim($this->input->post('description'));

			$data = array(
				'name' => $name,
				'price' => $price,
				'color_id' => $color_id,
				'description' => $description
			);
			$pro_id = $this->product_model->add_product($data);

			//Product Category
			foreach ($this->input->post('cat_id') as $cid)
			{
				$data = array(
					'pro_id' => $pro_id,
					'cat_id' => $cid
				);
				$this->product_category_model->add_product_category($data);
			}
			//End

			//Upload
			$path = realpath('./public/images');
			if (!is_dir($path))
			{
				mkdir($path, 0755, TRUE);
			}

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			for ($i = 1; $i < 4; $i++)
			{
				$check_upload = $this->upload->do_upload('img' . $i);
				if ($check_upload)
				{
					$data = array(
						'pro_id' => $pro_id,
						'url' => 'public/images/' . $_FILES['img' . $i]['name']
					);
					$this->image_model->add_image($data);
				}
			}
			//End
			redirect('product/index');
		}
	}

	public function post_edit()
	{
		$pro_id = $this->input->post('id');
		$name = trim($this->input->post('name'));
		$price = trim($this->input->post('price'));
		$color_id = $this->input->post('color_id');
		$description = trim($this->input->post('description'));

		$data = array(
			'name' => $name,
			'price' => $price,
			'color_id' => $color_id,
			'description' => $description
		);
		$this->product_model->update_product($pro_id, $data);

		//Product Category
		$this->product_category_model->delete($pro_id);
		foreach ($this->input->post('cat_id') as $cid)
		{
			$data = array(
				'pro_id' => $pro_id,
				'cat_id' => $cid
			);
			$this->product_category_model->add_product_category($data);
		}
		//End

		//UPLOAD
		$path = realpath('./public/images');
		if (!is_dir($path))
		{
			mkdir($path, 0755, TRUE);
		}

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['encrypt_name'] = FALSE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		for ($i = 1; $i < 4; $i++)
		{
			$check_upload = $this->upload->do_upload('img' . $i);
			if ($check_upload)
			{
				$data = array(
					'pro_id' => $pro_id,
					'url' => 'public/images/' . $_FILES['img' . $i]['name']
				);
				$this->image_model->add_image($data);
			}
		}
		//End

		redirect('product/index');
	}

	public function update_status($pro_id, $status_id)
	{
		if ($status_id == 0)
		{
			$status = '1';
		}
		else
		{
			$status = '0';
		}
		$data = array(
			'status' => $status
		);

		$this->product_model->update_product($pro_id, $data);
		redirect('product/index');
	}
}