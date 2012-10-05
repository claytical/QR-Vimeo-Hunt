<?php

class Video extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('video_model');

	}
		
	public function add() {
		$this->video_model->add_video();

	}
	
	public function first() {
		$this->video_model->make_first();
	}
	public function codes() {
		$data['choices'] = $this->video_model->get_choices();
		$this->load->view('video/print', $data);

	}
	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Group Title', 'required');
		
		if ($this->form_validation->run() === FALSE) {}

		else {
			$id = $this->video_model->create_choice();
			$this->video_model->add_videos($id);
		}
		
		$this->load->view('include/header');
		$this->load->view('video/create');
      	$this->load->view('include/footer');

	}
	
	public function change() {
		$this->video_model->update_video();
	}
	public function trashgroup() {
		$this->video_model->remove_choice();
	}
	public function trash() {
		$this->video_model->remove_video();
	}
	
	public function index() {
		$data['choices'] = $this->video_model->get_videos();
		$data['title'] = "Videos";
		$this->load->view('include/header');
		$this->load->view('video/list', $data);
      	$this->load->view('include/footer');

	}
	
}