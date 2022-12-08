<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allnews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('model_index');

		$tintuc = $this->model_index->getAllTinTuc();
		$data = array(
			
			'tintuc' => $tintuc,
			
		);
		return $this->load->view('news/newsAll', $data);
	}



}

/* End of file allnews.php */
/* Location: ./application/controllers/news/allnews.php */