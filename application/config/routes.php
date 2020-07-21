<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
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
$route['default_controller'] = 'welcome';
$route['translate_uri_dashes'] = true;

$route['login'] = "user/login";
$route['register'] = "user/register";
$route['register_user'] = "user/register_user";

$route['logout'] = "user/logout";

$route['items/new'] = "ItemController/new_item";
$route['items/edit/:num'] = "ItemController/edit_item";
$route['items/all'] = "ItemController/index";

$route['items/add-item'] = "ItemController/save_item";
$route['items/update-item'] = "ItemController/update_item";


$route['home'] = "HomeController";

$route['404_override'] = '';
