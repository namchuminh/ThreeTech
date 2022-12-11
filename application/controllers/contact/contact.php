<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('model_index');

		
		
		return $this->load->view('contact/contact');
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact/contact.php */