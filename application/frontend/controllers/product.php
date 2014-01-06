<?php

class Product extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('product_model');
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
		$data['colors'] = $this->product_model->get_list_color();

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

	protected function show_cat_id(&$array_cat_id, $cats)
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

	public function filter()
	{
		$data = array();
		$amt = NULL;
		$min = NULL;
		$max = NULL;
		if ($this->input->post('amount'))
		{
			$amt = $this->input->post('amount');
			$data['current_price'] = $amt;

			$range = explode(' - ', $amt);
			$min = ltrim($range[0],'$');
			$max = ltrim($range[1],'$');
		}

		$catid = $this->input->post('catid');
		$color_id = $this->input->post('color_id');
		$color_id_encode = $this->input->post('color_id_encode');
		$pro_id = $this->product_model->get_pro_id_by_cat_id($catid);

		//Lay tat ca cat_id con
		$array_cat_id = array();
		if(isset($catid))
		{
			$cats = $this->category_model->find_record($catid);
			foreach ($cats as $key => $cat)
			{
				$cats[$key]['child_cats'] = $this->category_model->get_child_cats($cat);
			}
			$this->show_cat_id($array_cat_id, $cats);
		}
		//End Lay tat ca cat_id con

		$array_pid = array();
		foreach ($pro_id as $pid)
		{
			$array_pid[] = $pid['pro_id'];
		}

		$str_where_clause = "";
		if(isset($color_id_encode) && strlen($color_id_encode)>0)
		{
			$data['color_id'] = json_decode($color_id_encode);
			$str_where_clause = $this->product_model->get_str_where_clause($array_cat_id, $array_pid , $data['color_id'] , $amt , $min , $max );
		}
		elseif(isset($color_id))
		{
			$data['color_id'] = $color_id;
			$str_where_clause = $this->product_model->get_str_where_clause($array_cat_id , $array_pid , $color_id , $amt , $min , $max );
		}

		$total = $this->product_model->count_records_limt($str_where_clause);
		$config = array();
		$config['base_url'] = base_url('index.php/product/filter/');
		$config['total_rows'] = $total;
		$config['per_page'] = per_03;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();
		$start = (int) $this->uri->segment(3);

		$products = $this->product_model->get_records_limit($str_where_clause, $config['per_page'], $start);
		if ( ! empty($products))
		{
			foreach ($products as $key => $prod)
			{
				$products[$key]['prod_img'] = $this->product_model->find_image_record($prod['pro_id']);
			}
			$data['products'] = $products;
		}

		$this->load->view('product_ajax',$data);
	}

	public function set_color_filter()
	{
		$amt = $this->input->post('amount');
		$range = explode(' - ', $amt);
		$min = ltrim($range[0],'$');
		$max = ltrim($range[1],'$');
		$colors = $this->product_model->get_pid_by_amount($min, $max);
		$array_cid = array();
		foreach ($colors as $color)
		{
			$array_cid[] = $color['color_id'];
		}
		//print_r($array_cid); exit;
		$data['colors'] = $this->product_model->get_list_color_by_cid($array_cid);
		//echo $data['colors'];exit;
		$this->load->view('color_filter_ajax',$data);
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


