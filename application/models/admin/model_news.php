<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_news extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addNews($tieuDe, $duongDan, $noiDung, $anhChinh){
		$sql = "INSERT INTO tintuc (tieuDe, duongDan, noiDung, anhChinh) VALUES(?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tieuDe, $duongDan, $noiDung, $anhChinh));
		return $result;
	}

	public function getNews($number = 10){
		$sql = "SELECT * FROM tintuc ORDER BY ngayDang DESC LIMIT ".$number;
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}

/* End of file model_news.php */
/* Location: ./application/models/model_news.php */