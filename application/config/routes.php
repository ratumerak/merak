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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['reffral/(:any)'] = 'landing/reffral/$1';
$route['register/(:any)'] = 'login/register/$1';
$route['login/kirim_aktivasi/(:any)'] = 'login/kirim_aktivasi/$1';


$route['utama/topupproduk'] = 'utama/topup';
$route['utama/data-topupproduk'] = 'utama/data_topup';
$route['utama/withdraw'] = 'utama/withdraw';
$route['utama/data-withdraw'] = 'utama/data_withdraw';

$route['utama/data-topup-merak'] = 'utama/data_topup_merak';
$route['utama/data-order-ratumerak'] = 'utama/data_order_ratumerak';
$route['utama/order-produk'] = 'utama/order';
$route['utama/data-order-produk'] = 'utama/data_order';
$route['utama/detail-transaksi/(:any)'] = 'utama/detail_transaksi/$1';


$route['aktivasi/index/(:any)'] = 'aktivasi/index/$1';
$route['utama/ubah_rekening/(:any)'] = 'utama/ubah_rekening/$1';
$route['admin/detail-member/(:any)'] = 'admin/detail_member/$1';
$route['admin/detail-order/(:any)'] = 'admin/detail_order/$1';
$route['admin/detail-bonus/(:any)'] = 'admin/detail_bonus/$1';
$route['admin/detail-bonus-cashback-ratumerak/(:any)'] = 'admin/detail_bonus_cashback_ratumerak/$1';
$route['admin/detail-bonus-cashback-markisa/(:any)'] = 'admin/detail_bonus_cashback_markisa/$1';
$route['admin/detail-withdraw/(:any)'] = 'admin/detail_withdraw/$1';

$route['admin/detail-jaringan-member/(:any)'] = 'admin/detail_jaringan_member/$1';



