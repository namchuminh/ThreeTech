<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->load->view('user/userLogin');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */