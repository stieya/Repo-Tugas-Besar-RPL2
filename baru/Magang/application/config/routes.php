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
/* Routing untuk panel admin */
$route['admin'] = 'admin/dashboard';


/* routing untuk panel company */
$route['company'] = 'company/dashboard';
$route['company/profile'] = 'company/profile/index';
$route['company/profile/(:num)'] = 'company/profile/index/$1';
$route['company/jobsheet/newjobsheet'] = 'company/jobsheet/newjobsheet';
$route['company/jobsheet/(:num)'] = 'company/jobsheet/index/$1';
$route['company/jobsheet/(:num)/(:num)'] = 'company/jobsheet/index/$1/$2';
$route['company/jobsheet/edit/(:num)'] = 'company/jobsheet/edit/$1';
$route['company/jobsheet/hapus/(:num)'] = 'company/jobsheet/hapus/$1';

$route['company/joblist/newjoblist/(:num)'] = 'company/joblist/newjoblist/$1';
$route['company/joblist/edit/(:num)/(:num)'] = 'company/joblist/edit/$1/$2';
$route['company/joblist/hapus/(:num)/(:num)'] = 'company/joblist/hapus/$1/$2';

$route['company/message/(:num)'] = 'company/message/index/$1';
$route['company/hapus/(:num)/(:num)'] = 'company/message/hapus/$1/$2';



/* routing untuk panel user */

$route['user'] = 'user/dashboard';
$route['user/profile/(:num)'] = 'user/profile/index/$1';
$route['user/company'] = 'user/company/index';
$route['user/company/(:num)'] = 'user/company/index/$1';
$route['user/company/(:num)/(:num)/(:num)'] = 'user/company/index/$1/$2/$3';

$route['user/jobsheet'] = 'user/jobsheet/index';
$route['user/jobsheet/(:num)'] = 'user/jobsheet/index/$1';
$route['user/jobsheet/(:num)/(:num)'] = 'user/jobsheet/index/$1/$2';

$route['user/message'] = 'user/message/index';
$route['user/message/kirim/(:any)/(:num)'] = 'user/message/kirim/$1/$2';
$route['user/message/(:any)/(:num)'] = 'user/message/index/$1/$2';
$route['user/message/hapus/(:num)/(:num)'] = 'user/message/delete/$1/$2';
$route['user/search/(:num)'] = 'user/search/index/$1';
$route['user/search/(:num)/(:any)'] = 'user/search/index/$1/$2';
$route['user/search/(:num)/(:any)/(:any)'] = 'user/search/index/$1/$2/$3';


$route['default_controller'] = "welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */