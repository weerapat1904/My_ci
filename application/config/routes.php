<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/read'; //กำหนด uri เ
$route['input_form'] = 'admin/create';
$route['insert_data'] = 'admin/insert';
$route['update_form'] = 'admin/update_form';
$route['update_data'] = 'admin/update_data';
$route['test'] = 'code/test';
$route['new'] = 'code/new';
$route['t'] = 'code/t';
$route['home'] = 'admin/home';
$route['login'] = 'admin/login';
$route['logout'] = 'admin/logout';
$route['error'] = 'admin/error';
$route['success'] = 'admin/success';
$route['delete_user'] = 'admin/delete_user';
$route['profile'] = 'admin/profile_user';
$route['register'] = 'admin/register';
$route['edit_member'] = 'admin/edit_member';
$route['chk_user'] = 'admin/chk_user';
$route['chk_email'] = 'admin/chk_email';
$route['chke_email'] = 'admin/chke_email';
$route['alert_login'] = 'admin/alert_login';
$route['upload'] = 'upload'; 
$route['check_fname'] = 'admin/check_fname';
$route['check_lname'] = 'admin/check_lname';
$route['upload_img'] = 'admin/upload_img';
$route['delete_account'] = 'admin/delete_account';
$route['serch_data'] = 'admin/serch_data';
$route['default_controller'] = 'admin/read';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
