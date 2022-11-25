<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin {

	public function checkUserpPass($taikhoan, $matkhau){
		$result = True;
		if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{1,31}$/', $taikhoan)){
	    	$result = False;
		}

		if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{1,31}$/', $matkhau)){
	    	$result = False;
		}

		return $result;
	} 

	public function checkPassNullOrEmpty($matKhau){
		return ($matKhau === null || trim($matKhau) === '');
	}
}






