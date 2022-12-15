<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'index';
$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;
 
$route['admin'] = 'admin/admin/index';
$route['admin/dang-nhap'] = 'admin/auth';
$route['admin/dang-xuat'] = 'admin/admin/logout';
$route['admin/laptop'] = 'admin/adminProduct/laptop';
$route['admin/may-tinh'] = 'admin/adminProduct/computer';
$route['admin/linh-kien'] = 'admin/adminProduct/accessory';
$route['san-pham/them'] = 'admin/adminProduct/addProduct';
$route['admin/actionAddProduct'] = 'admin/adminProduct/actionAddProduct';
$route['san-pham/sua/(:any)'] = 'admin/adminProduct/updateProduct/$1';
$route['admin/actionUpdateProduct'] = 'admin/adminProduct/actionUpdateProduct';
$route['san-pham/xoa/(:any)/(:any)'] = 'admin/adminProduct/actionDeleteProduct/$1/$2';
$route['admin/ca-nhan'] = 'admin/adminProfile/index';
$route['admin/cai-dat-ca-nhan'] = 'admin/adminSetting';
$route['admin/cap-nhat-ca-nhan'] = 'admin/adminSetting/updateAdminProfile';
$route['admin/nhan-vien'] = 'admin/adminPerson/index';
$route['nhan-vien/sua/(:any)'] = 'admin/adminPerson/updatePerson/$1';
$route['nhan-vien/cap-nhat'] = 'admin/adminPerson/actionUpdatePerson';
$route['nhan-vien/them'] = 'admin/adminPerson/actionAddPerson';
$route['ca-nhan/chon-hien-thi'] = 'admin/adminProfile/actionLoadProductOrNews';
$route['admin/tin-tuc'] = 'admin/adminNews/index';
$route['admin/tin-tuc/tao-bai-viet'] = 'admin/adminNews/addNews';
$route['admin/tin-tuc/xu-ly-tao-bai-viet'] = 'admin/adminNews/actionAddNews';
$route['admin/tin-tuc/xoa/(:any)'] = 'admin/adminNews/actionDeleteNews/$1';
$route['admin/ca-nhan/xoa-san-pham/(:any)'] = 'admin/adminProfile/actionDeleteMyProduct/$1';
$route['admin/bieu-do-doanh-thu'] = 'admin/admin/getBieuDoDoanhThu';
$route['admin/so-luong-ban-theo-chuyen-muc'] = 'admin/admin/getSoLuongBanByChuyenMuc';
$route['admin/tin-tuc/sua/(:any)'] = 'admin/adminNews/actionUpdateNews/$1';
$route['admin/khach-hang'] = 'admin/adminCustomer/index';
$route['khach-hang/xuat'] = 'admin/adminCustomer/exportExcel';
$route['khach-hang/tim-kiem'] = 'admin/adminCustomer/searchCustomer';
$route['khach-hang/xem-them'] = 'admin/adminCustomer/loadCustomer';
$route['khach-hang/xoa'] = 'admin/adminCustomer/deleteCustomer';
$route['admin/don-hang'] = 'admin/adminOrder/index';
$route['don-hang/xuat'] = 'admin/adminOrder/exportExcel';
$route['don-hang/xem-them'] = 'admin/adminOrder/loadMore';
$route['don-hang/giao-hang'] = 'admin/adminOrder/giaoHang';
$route['don-hang/hoan-tien'] = 'admin/adminOrder/hoanTien';
$route['don-hang/tim-kiem'] = 'admin/adminOrder/searchDonHang';
$route['tin-tuc/tim-kiem'] = 'admin/adminNews/searchNews';
$route['admin/tra-luong'] = 'admin/adminPerson/traLuong';

$route['dang-nhap'] = 'user/userLogin/index';
$route['xu-ly-dang-nhap'] = 'user/userLogin/actionLogin';
$route['dang-xuat'] = 'user/userLogout/logout';
$route['dang-ky'] = 'user/userRegister/index';
$route['xu-ly-dang-ky'] = 'user/userRegister/actionRegister';
$route['khach-hang']= 'user/userInfo/index';
$route['khach-hang/cap-nhat-khach-hang'] = 'user/userInfo/updateProfile';


$route['san-pham/(:any)'] = 'product/product/detail/$1';
$route['gio-hang'] = 'cart/cart/index';
$route['them-vao-gio-hang'] = 'cart/cart/addToCart';
$route['xoa-gio-hang'] = 'cart/cart/deleteCart';
$route['sua-gio-hang'] = 'cart/cart/updateNumberProduct';
$route['gio-hang/thanh-toan'] = 'thanhtoan/vnpay/index';
$route['gio-hang/dat-hang'] = 'thanhtoan/vnpay/dathang';
$route['tim-kiem'] = 'product/product/search';
$route['them-gio-hang'] = 'product/product/addToCart';
$route['noi-bat-moi'] = 'product/product/noibatmoi';
$route['audio-video'] = 'product/product/audiovideo';
$route['may-tinh-laptop'] = 'product/product/maytinhlaptop';
$route['top-20'] = 'product/product/top20';
$route['trend'] = 'product/product/trend';
$route['chuyen-muc/loc'] = 'product/category/filterProduct';


$route['xu-ly-thanh-toan'] = 'thanhtoan/vnpay/thanhtoan';

$route['admin/cham-cong'] = 'admin/adminPerson/mark';
$route['nhan-vien/xoa'] = 'admin/adminPerson/actionDeletePerson';
$route['nhan-vien/tim-kiem'] = 'admin/adminPerson/actionSearchPerson';
$route['nhan-vien/xem-them'] = 'admin/adminPerson/actionLoadPerson';
$route['nhan-vien/xuat'] = 'admin/adminPerson/exportExcel';

$route['chuyen-muc/(:any)'] = 'product/category/index/$1';

$route['tin-tuc/(:any)'] = 'news/newsDetail/index/$1';
$route['tin-tuc'] = 'news/allnews/index';

$route['lien-he'] = 'contact/contact/index';
$route['lien-he/xu-ly'] = 'contact/contact/actionContact';
