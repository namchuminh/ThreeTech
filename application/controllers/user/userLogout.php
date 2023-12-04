<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userLogout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect(base_url());
	}

}

/* End of file userLogout.php */
/* Location: ./application/controllers/userLogout.php */