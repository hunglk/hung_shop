<?php

class Browser extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('category_model');
		$this->load->Model('product_model');
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

		$data['max'] = $this->product_model->get_max_price($array_pid);
		$data['min'] = $this->product_model->get_min_price($array_pid);
		//Lay color_id ra view
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
		//End lay color_id ra view
		$config = array();
		$config['base_url'] = base_url('index.php/product/filter/');
		$config['total_rows'] = count($array_pid);
		$config['per_page'] = per_03;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();
		$start = (int) $this->uri->segment(4);

		$products = $this->product_model->get_list_product_by_id($config['per_page'], $start, $array_pid);

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

}


