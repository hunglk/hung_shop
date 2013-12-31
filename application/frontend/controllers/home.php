<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('constant');
		$this->load->Model('product_model');
		$this->load->Model('category_model');
	}

	public function index()
	{
		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		$data['colors'] = $this->product_model->get_list_color();

		$products = $this->product_model->get_top5();
		if ( ! empty($products))
		{
			foreach ($products as $key => $prod)
			{
				$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
			}
			$data['products'] = $products;
		}

		$this->load->view('home', $data);
	}

}


