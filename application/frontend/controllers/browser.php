<?php

class Browser extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('category_model');
		$this->load->Model('product_model');
	}

	public function show_cat_id(&$array_cat_id, $cats)
	{
		if (! empty ($cats))
		{
			foreach ($cats as $cat)
			{
				$array_cat_id[]= $cat['cat_id'];
				$this->show_cat_id($array_cat_id, $cat['child_cats']);
			}
		}
	}

	public function index($catid)
	{
		$cat_id = $catid;
		$cats = $this->category_model->find_record($cat_id);
		foreach ($cats as $key => $cat)
		{
			$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
		}
		$array_cat_id = array();
		$this->show_cat_id($array_cat_id, $cats);

		$pro_id = $this->product_model->get_pro_id_by_cat_id($array_cat_id);
		$array_pid = array();
		foreach ($pro_id as $pid)
		{
			$array_pid[] = $pid['pro_id'];
		}

		$data = array();
		$data['catid'] = $catid;

		if ( ! empty($array_pid))
		{
			$array_cid = array();
			$products_by_pid = $this->product_model->get_color_by_pid($array_pid);
			foreach($products_by_pid as $prod_by_pid)
			{
				$array_cid[] = $prod_by_pid['color_id'];
			}
			$data['colors'] = $this->product_model->get_list_color_by_cid($array_cid);
		}

		$str_where_clause = "";
		if (isset($catid))
		{
			$str_where_clause = $this->product_model->get_str_where_clause($catid , $array_pid);
		}
		else
		{
			$amt = $this->input->post('amount');
			$range = explode(' - ', $amt);
			$min = ltrim($range[0],'$');
			$max = ltrim($range[1],'$');
			$color_id = $this->input->post('color_id');

			if (isset($color_id))
			{
				$str_where_clause = $this->product_model->get_str_where_clause($catid , $array_pid , $color_id , $amt , $min , $max );
			}
			else
			{
				$str_where_clause = $this->product_model->get_str_where_clause($catid , $array_pid , $color_id = NULL, $amt , $min , $max );
			}
		}

		$total = $this->product_model->count_records_limt($str_where_clause);
		$base_url = base_url('index.php/browser/index/' . $catid);
		$config = $this->pagination($base_url, $total);
		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();
		$start = (int) $this->uri->segment(4);

		$products = $this->product_model->get_records_limit($str_where_clause, $config['per_page'], $start);

		if ( ! empty($products))
		{
			foreach ($products as $key => $prod)
			{
				$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
			}
			$data['products'] = $products;
		}

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

	public function pagination($base_url, $total)
	{
		$config = array();
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = per_02;
		$config['uri_segment'] = 4;

		return $config;
	}

}


