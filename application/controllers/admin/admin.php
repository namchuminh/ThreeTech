<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap'));
		}
	}

	public function index()
	{
		return $this->load->view('admin/index');
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect(base_url('admin/dang-nhap'));
	}

	public function laptop(){
		$this->load->model('admin/model_product');
		$product = $this->model_product->getLaptop();
		$data = array(
			'product' => $product,
		);
		return $this->load->view('admin/laptop', $data);
	}

	public function computer(){
		$this->load->model('admin/model_product');
		$product = $this->model_product->getComputer();
		$data = array(
			'product' => $product,
		);
		return $this->load->view('admin/computer', $data);
	}

	public function accessory(){
		$this->load->model('admin/model_product');
		$product = $this->model_product->getAccessory();
		$data = array(
			'product' => $product,
		);
		return $this->load->view('admin/accessory', $data);
	}

	public function addProduct(){
		return $this->load->view('admin/addProduct');
	}

	public function actionAddProduct(){
		$result = array();
		$tenSanPham = $this->input->post('tenSanPham');
		$giaGoc = $this->input->post('giaGoc');
		$giaBan = $this->input->post('giaBan');
		$moTa = $this->input->post('moTa');
		$duongDan = $this->input->post('duongDan');
		$soLuong = $this->input->post('soLuong');
		$chuyenMucId = $this->input->post('chuyenMucId');
		$loaiSanPham = $this->input->post('loaiSanPham');
		$anhChinh = "";
		$anhPhu1 = "";
		$anhPhu2 = "";

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('anhChinh')){
			$imageChinh = $this->upload->data();
			$anhChinh = base_url('uploads')."/".$imageChinh['file_name'];
		}

		if ($this->upload->do_upload('anhPhu1')){
			$imagePhu1 = $this->upload->data();
			$anhPhu1 = base_url('uploads')."/".$imagePhu1['file_name'];
		}

		if ($this->upload->do_upload('anhPhu2')){
			$imagePhu2 = $this->upload->data();
			$anhPhu2 = base_url('uploads')."/".$imagePhu2['file_name'];
		}

		$this->load->model('admin/model_product');
		$result = $this->model_product->addProduct($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham);
		if($result == True){
			$data = array(
				'mess' => "Thêm sản phẩm thành công!"
			);
			return $this->load->view('admin/addProduct', $data);
		}else{
			$data = array(
				'mess' => "Thêm sản phẩm không thành công! Vui lòng kiểm tra lại thông tin!"
			);
			return $this->load->view('admin/addProduct', $data);
		}
	}

	public function updateProduct($sanPhamId){
		$this->load->model('admin/model_product');
		$data = array(
			'product' => $this->model_product->getUpdateProduct($sanPhamId),
		);
		return $this->load->view('admin/updateProduct', $data);
	}

	public function actionUpdateProduct(){
		$sanPhamId = $this->input->post('sanPhamId');
		$tenSanPham = $this->input->post('tenSanPham');
		$giaGoc = $this->input->post('giaGoc');
		$giaBan = $this->input->post('giaBan');
		$moTa = $this->input->post('moTa');
		$duongDan = $this->input->post('duongDan');
		$trangThai = $this->input->post('trangThai');
		$soLuong = $this->input->post('soLuong');
		$chuyenMucId = $this->input->post('chuyenMucId');
		$loaiSanPham = $this->input->post('loaiSanPham');
		$anhChinh = $this->input->post('anhChinhGoc');
		$anhPhu1 = $this->input->post('anhPhu1Goc');
		$anhPhu2 = $this->input->post('anhPhu2Goc');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('anhChinh')){
			$imageChinh = $this->upload->data();
			$anhChinh = base_url('uploads')."/".$imageChinh['file_name'];
		}

		if ($this->upload->do_upload('anhPhu1')){
			$imagePhu1 = $this->upload->data();
			$anhPhu1 = base_url('uploads')."/".$imagePhu1['file_name'];
		}

		if ($this->upload->do_upload('anhPhu2')){
			$imagePhu2 = $this->upload->data();
			$anhPhu2 = base_url('uploads')."/".$imagePhu2['file_name'];
		}

		$this->load->model('admin/model_product');
		$result = $this->model_product->updateProduct($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$trangThai,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham,$sanPhamId);
		if($result == True){
			
			$data = array(
				'mess' => "Cập nhật sản phẩm thành công!",
				'product' => $this->model_product->getUpdateProduct($sanPhamId),
			);
			return $this->load->view('admin/updateProduct', $data);
		}else{
			$data = array(
				'mess' => "Cập nhật sản phẩm không thành công! Vui lòng kiểm tra lại thông tin!",
				'product' => $this->model_product->getUpdateProduct($sanPhamId),
			);
			return $this->load->view('admin/updateProduct', $data);
		}

	}

	public function actionDeleteProduct($sanPhamId, $chuyenMuc){
		$this->load->model('admin/model_product');
		$this->model_product->deleteProduct($sanPhamId);
		return redirect(base_url('admin/').$chuyenMuc);
	}

}

/* End of file controller_admin.php */
/* Location: ./application/controllers/controller_admin.php */