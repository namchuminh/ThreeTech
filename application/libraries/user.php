<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user {

	public function checkUserpPass($taikhoan, $matkhau){
		$result = True;
		if (!preg_match('/[A-Za-z0-9]{1,31}$/', $taikhoan)){
	    	$result = False;
		}

		if (!preg_match('/[A-Za-z0-9]{1,31}$/', $matkhau)){
	    	$result = False;
		}

		return $result;
	} 
	public function checkUserName($hoten)
	{
		$result = True;
		if (!preg_match('/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u', $hoten)){
	    	$result = False;
		}
		return $result;
	}
	public function checkSdt($sodienthoai)
	{
		$result =True;
		if (!preg_match('/[0-9]{10}/', $sodienthoai)){
	    	$result = False;
		}
		return $result;
	}
	public function checkPass($matkhau, $matkhauthu)
	{
		$result=False;
		if ($matkhau==$matkhauthu){
	    	$result = True;
		}
		return $result;
	}

}