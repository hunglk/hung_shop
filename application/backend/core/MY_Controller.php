<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class My_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('constant');
		$this->load->Model('user_model');
		$this->load->Model('permision_model');

		//check session
		if (!$this->session->userdata('user_id')) {
			redirect('admin/index');
		}
		//check permision
		$check_permision = $this->permision_model->get_permison();
		if (!$check_permision)
		{
			$this->session->set_flashdata('permision_error', TRUE);
			redirect('admin/dash');
		}

		$data = array();
		// Load library template
		$this->load->library('template');
		// Set template
		$controller_name = $this->router->fetch_class();
		if ($controller_name !== 'admin')
		{
			$this->template->set_template('backend');
			$this->template->parse_view('header', 'admin/inc/header', $data);
			$this->template->parse_view('footer', 'admin/inc/footer', $data);
		}
	}
}

?>