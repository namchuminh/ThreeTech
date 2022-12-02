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
		$sanphamtuongtu = $this->model_product->getProductTuongTu($duongDan);
		$data = array(
			'chiTietSanPham' => $chiTietSanPham,
			'chuyenMuc' => $chuyenMuc,
			'sanPhamLienQuan' => $sanPhamLienQuan,
			'sanphamtuongtu' => $sanphamtuongtu,
		);
		// echo '<pre>';
		// 	var_dump($chiTietSanPham);
		// echo '</pre>';

		return $this->load->view('product/productDetail', $data);
	}

	public function search(){
		$tenSanPhamCanTim = $this->input->get('product');

		$this->load->model('product/model_product');

		$product = $this->model_product->search($tenSanPhamCanTim);

		$this->load->model('model_index');
		$cothebanquantam = $this->model_index->getProductQuanTam();


		$data = array(
			'product' => $product,
			'cothebanquantam' => $cothebanquantam,
			'tenSanPhamCanTim' => $tenSanPhamCanTim,
		);

		return $this->load->view('product/search', $data, FALSE);
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */