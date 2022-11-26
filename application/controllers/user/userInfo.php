<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userInfo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')){
			return redirect(base_url());
		}
	}

	public function index()
	{
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');

		$result = $this->model_index->getCustomerLogin($khachhang);
		$data = array(
			'customer' => $result,
		);
		/*echo '<pre>';
		var_dump($result);
		echo '</pre>';
*/
		return $this->load->view('user/userInfo',$data);
	}

}

/* End of file userInfo.php */
/* Location: ./application/controllers/userInfo.php */