<?php
class Admin_Controller extends CI_Controller {

    protected $the_user;

    function __construct() {

        parent::__construct();
		$this->load->model('video_model');
		$data = new StdClass;

        if($this->ion_auth->in_group('members')) {
            $this->the_user = $this->ion_auth->user()->row();
  			$data->the_user = $this->the_user;
			$data->logged_in = TRUE;

            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }

}

class Public_Controller extends CI_Controller {

    protected $the_user;

    function __construct() {

        parent::__construct();
		$this->load->model('video_model');

		$data = new StdClass;

        if($this->ion_auth->in_group('members')) {
            $this->the_user = $this->ion_auth->user()->row();
  			$data->the_user = $this->the_user;
	  		$data->logged_in = TRUE;
        }
        else {
        	$data->logged_in = FALSE;

        }
        
     	
        $this->load->vars($data);

    }

}