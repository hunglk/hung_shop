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

		$cats = $this->category_model->get_parent();
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$data['cats'] = $cats;

		$this->template->set_template('frontend');
		$this->template->parse_view('header', 'inc/header', $data);
		$this->template->parse_view('footer', 'inc/footer', $data);
	}
}

