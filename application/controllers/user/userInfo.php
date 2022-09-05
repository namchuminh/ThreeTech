<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userInfo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$taikhoan = $this->session->userdata('taikhoan');
		$this->load->model('model_index');

		$result = $this->model_index->getCustomerLogin($taikhoan);
		$data = array(
			'customer' => $result,

		);
		echo '<pre>';
		var_dump($result);
		echo '</pre>';

		return $this->load->view('user/userInfo',$data);
	}

}

/* End of file userInfo.php */
/* Location: ./application/controllers/userInfo.php */