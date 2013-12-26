<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class My_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('constant');
		$this->load->Model('product_model');
		$this->load->Model('category_model');

		$data = array();
		// Load library template
		$this->load->library('template');
		// Set template
		$controller_name = $this->router->fetch_class();

		$cats = $this->category_model->get_records('parent_id=0');
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;
		$data['colors'] = $this->product_model->get_list_color();

		$products = $this->product_model->get_top4();
		if (!empty($products))
		{
			foreach ($products as $key => $prod)
			{
				$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
			}
			$data['products'] = $products;
		}

		if ($controller_name === 'home')
		{
			$this->template->set_template('home');
			$this->template->parse_view('header', 'inc/header_home', $data);
			$this->template->parse_view('footer', 'inc/footer_home', $data);
		}
		else
		{
			$this->template->set_template('frontend');
			$this->template->parse_view('header', 'inc/header', $data);
			$this->template->parse_view('footer', 'inc/footer', $data);
		}

	}
}

