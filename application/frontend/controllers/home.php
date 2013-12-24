<?php

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['demo'] = 'This is My Home Page';
		$this->template->parse_view('content', 'home', $data);
		$this->template->render();
	}

}


