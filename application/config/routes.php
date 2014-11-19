<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['api/gift_list'] = "api/list_gift_list";
$route['api/other_gift_list'] = "api/list_other_gift_list";
$route['api/delete_gift'] = "api/delete_gift";
$route['api/class_users'] = "api/get_class_users";
$route['api/purchases'] = "api/purchases";
$route['api/delete_user_gift'] = "api/delete_user_purchase";
$route['api/create_user'] = "api/create_user";
$route['api/admin_list'] = "api/admin_list";
$route['api/admin_modify_class'] = "api/modify_class";

$route['my_purchases'] = "purchases";

$route['select_admin'] = "admin";
$route['add_to_class'] = "admin/add_to_class";
$route['add_user_class'] = "admin/add_user_class";

$route['select_others'] = "othergifts";
$route['select_user'] = "othergifts/user";
$route['purchase_gift'] = "othergifts/purchase";


$route['post_gift'] = "userhome/post_gift";
$route['update_gift'] = "userhome/update_gift";
$route['add_gift'] = "userhome/add_gift";
$route['home'] = "userhome";

$route['logout'] = 'login/logout';
$route['default_controller'] = "login";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
