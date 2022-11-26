<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function detail($duongDan)
	{
		$this->load->model('product/model_product');
		$chiTietSanPham = $this->model_product->getDetailProduct($duongDan);
		$chuyenMuc = $this->model_product->getCateByUrl($duongDan);
		$sanPhamLienQuan = $this->model_product->getProductRelated($duongDan);
		$data = array(
			'chiTietSanPham' => $chiTietSanPham,
			'chuyenMuc' => $chuyenMuc,
			'sanPhamLienQuan' => $sanPhamLienQuan,
		);
		// echo '<pre>';
		// 	var_dump($chiTietSanPham);
		// echo '</pre>';

		return $this->load->view('product/productDetail', $data);
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */