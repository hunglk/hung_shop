<?php

class Browser extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('product_model');
		$this->load->Model('product_category_model');
	}

	public function index($catid)
	{
		$cat_id = $catid;
		$pro_id = $this->product_category_model->get_pro_id_by_cat_id($cat_id);

		$array_pid = array();
		foreach ($pro_id as $pid) {
			$array_pid[] = $pid['pro_id'];
		}

		$data = array();
		$data['catid'] = $catid;

		$config = array();
		$config['base_url'] = base_url('index.php/browser/index/' . $catid);
		$config['total_rows'] = count($array_pid);
		$config['per_page'] = per_02;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);
		$data['pagination_home_product'] = $this->pagination->create_links();

		$start = $this->uri->segment(4);

		if (count($array_pid) === 0)
		{
			$data['products_empty'] = 'Sản phẩm đang được cập nhật';
		}
		else
		{
			$products = $this->product_model->get_list_product_by_id($config['per_page'], $start, $array_pid);

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


