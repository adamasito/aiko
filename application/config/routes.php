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

$route['default_controller']				= "order_csv_controller";
$route['404_override']						= '';

// order_status
$route['order_status']						= "order_status_controller";
$route['order_status/(:any)']				= "order_status_controller/$1";
$route['order_status/(:any)/(:num)']		= "order_status_controller/$1/$2";

// order_status
$route['order_csv']							= "order_csv_controller";
$route['order_csv/(:any)']					= "order_csv_controller/$1";
$route['order_csv/(:any)/(:num)']			= "order_csv_controller/$1/$2";

// order_check
$route['order_shogo']						= "order_csv_controller/shogo_index/";
$route['order_shogo/(:any)']				= "order_csv_controller/$1";
$route['order_shogo/(:any)/(:num)']			= "order_csv_controller/$1/$2";


/* End of file routes.php */
/* Location: ./application/config/routes.php */