<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminProduct extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function laptop(){
		$tieuDe = "ThreeTech - Quản Lý Laptop";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$product = $this->model_product->getLaptop();
		$data = array(
			'product' => $product,
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/laptop', $data);
	}

	public function computer(){
		$tieuDe = "ThreeTech - Quản Lý Máy Tính";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$product = $this->model_product->getComputer();
		$data = array(
			'product' => $product,
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/computer', $data);
	}

	public function accessory(){
		$tieuDe = "ThreeTech - Quản Lý Linh Kiện";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$product = $this->model_product->getAccessory();
		$data = array(
			'product' => $product,
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/accessory', $data);
	}

	public function addProduct(){
		$tieuDe = "ThreeTech - Thêm Sản Phẩm";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');

		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/addProduct',$data);
	}

	public function actionAddProduct(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('san-pham/them/'));
		}
		$tieuDe = "ThreeTech - Thêm Sản Phẩm";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$result = array();
		$tenSanPham = $this->input->post('tenSanPham');
		$giaGoc = $this->input->post('giaGoc');
		$giaBan = $this->input->post('giaBan');
		$moTa = $this->input->post('moTa');
		$duongDan = $this->input->post('duongDan');
		$soLuong = $this->input->post('soLuong');
		$chuyenMucId = $this->input->post('chuyenMucId');
		$loaiSanPham = $this->input->post('loaiSanPham');
		$nhanVienId = $this->model_admin->getUserLogin($this->session->userdata('taikhoan'))[0]['nhanVienId'];
		$anhChinh = "";
		$anhPhu1 = "";
		$anhPhu2 = "";

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

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
		$result = $this->model_product->addProduct($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham, $nhanVienId);
		if($result == True){
			$data = array(
				'mess' => "Thêm sản phẩm thành công!",
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/addProduct', $data);
		}else{
			$data = array(
				'mess' => "Thêm sản phẩm không thành công! Vui lòng kiểm tra lại thông tin!",
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/addProduct', $data);
		}
	}

	public function updateProduct($sanPhamId){
		$tieuDe = "ThreeTech - Sửa Sản Phẩm";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->load->model('admin/model_product');
		$data = array(
			'product' => $this->model_product->getUpdateProduct($sanPhamId),
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/updateProduct', $data);
	}

	public function actionUpdateProduct(){
		if(empty($_POST) || !isset($_POST)){
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from, 'refresh');		
		}
		$tieuDe = "ThreeTech - Sửa Sản Phẩm";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
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
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

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
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/updateProduct', $data);
		}else{
			$data = array(
				'mess' => "Cập nhật sản phẩm không thành công! Vui lòng kiểm tra lại thông tin!",
				'product' => $this->model_product->getUpdateProduct($sanPhamId),
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
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