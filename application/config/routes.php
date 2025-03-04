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
// $route['default_controller'] = 'welcome';
// $route['default_controller'] = 'auth';
$route['default_controller'] = 'website';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




$route['login'] 				= 'auth/login';
$route['admin'] 				= 'auth/login';
$route['forgot_password'] 		= 'auth/forgot_password';
$route['change_password'] 		= 'auth/change_password';
$route['logout'] 			    = 'auth/logout';

$route['search'] 		        = 'website/search_details';
$route['about/(:any)'] 			= 'site/article/$1';
$route['brand/(:any)'] 			= 'website/brand_details/$1';
$route['category/(:any)/(:any)'] = 'website/category_details/$1/$2';
$route['sub_category/(:any)/(:any)/(:any)'] = 'website/sub_category_details/$1/$2/$3';
$route['item/(:any)/(:any)/(:any)/(:any)']  = 'website/item_details/$1/$2/$3/$4';

$route['homepage/(:num)'] 		        = 'website/homepage/homepages/$1';

