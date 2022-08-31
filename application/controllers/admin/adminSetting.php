<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminSetting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->load->view('admin/adminSetting');
	}

}

/* End of file adminSetting.php */
/* Location: ./application/controllers/adminSetting.php */