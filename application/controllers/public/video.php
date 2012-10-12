<?php

class Video extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('video_model');

	}
		
	
	public function index() {
		$data['first'] = $this->video_model->get_first();
		$this->load->view('video/intro', $data);

	}
	
	
	public function view($code) {
		$choice = $this->video_model->get_choice($code);
		$data['title'] = $choice['title'];
		$data['intro'] = $choice['intro'];
		$data['videos'] = $choice['videos'];
		$this->load->view('video/view', $data);
	
	}

	
}