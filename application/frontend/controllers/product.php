<?php

class Product extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('product_model');
		$this->load->Model('product_category_model');
	}

	public function index()
	{
		$data = array();
		$config = array();
		$config['base_url'] = base_url('index.php/product/index/');
		$config['total_rows'] = $this->product_model->count_all();
		$config['per_page'] = per_03;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();
		$start = $this->uri->segment(3);

		$products = $this->product_model->get_list_product($config['per_page'], $start);
		foreach ($products as $key => $prod)
		{
			$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
		}

		$data['products'] = $products;

		if ($this->input->post('ajax'))
		{
			$this->load->view('product_ajax',$data);
		}
		else
		{
			$this->template->parse_view('content', 'product', $data);
			$this->template->render();
		}
	}

	public function filter()
	{
		$data = array();
		$amt = $this->input->post('amount');
		$data['current_price'] = $amt;
		$range = explode(' - ', $amt);
		$min = ltrim($range[0],'$');
		$max = ltrim($range[1],'$');
		$catid = $this->input->post('catid');
		$color_id = $this->input->post('color_id');
		$pro_id = $this->product_category_model->get_pro_id_by_cat_id($catid);
		$array_pid = array();
		foreach ($pro_id as $pid)
		{
			$array_pid[] = $pid['pro_id'];
		}

		$str_where_clause = $this->product_model->get_str_where_clause($catid , $array_pid , $color_id , $amt , $min , $max );
		$total = $this->product_model->count_records_limt($str_where_clause);

		$config = array();
		$config['base_url'] = base_url('index.php/product/filter/');
		$config['total_rows'] = $total;
		$config['per_page'] = per_02;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();
		$start = $this->uri->segment(3);

		$products = $this->product_model->get_records_limit($str_where_clause, $config['per_page'], $start);

		if (!empty($products))
		{
			foreach ($products as $key => $prod)
			{
				$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
			}
			$data['products'] = $products;
		}

		$this->load->view('product_ajax',$data);
	}

	public function detail($proid)
	{
		$pro_id = $proid;
		$data = array();
		$data['product_detail'] = $this->product_model->find_record($pro_id);
		$data['prod_img'] = $this->product_model->find_image_record($proid);
		$this->template->parse_view('content', 'detail', $data);
		$this->template->render();
	}
}


