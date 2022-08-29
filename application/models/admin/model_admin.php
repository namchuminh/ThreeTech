<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUserLogin($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */