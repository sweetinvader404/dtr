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
// application/config/routes.php

// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['default_controller'] = 'user/login';


// Custom routes for login-related URLs
$route['user/login'] = 'user/login'; // Maps to User controller's login method
$route['user/process_login'] = 'user/process_login'; // Maps to User controller's process_login method
$route['user/add'] = 'user/add';
$route['user/list'] = 'user/index';
$route['user/delete_selected'] = 'User/delete_selected';


// routes.php

$route['employee'] = 'Employee/index';
$route['employee/add'] = 'Employee/add';
$route['employee/edit/(:num)'] = 'Employee/edit/$1';
$route['employee/delete'] = 'Employee/delete';
$route['employee/list'] = 'Employee/list';


// routes.php

$route['time_record'] = 'TimeRecord/index';
$route['time_record/listing'] = 'TimeRecord/listing';
$route['time_record/view/(:any)'] = 'TimeRecord/view/$1';



// $route['time_record'] = 'TimeRecord';
$route['time_record/process_time_record'] = 'TimeRecord/process_time_record';


$route['time_record/view/(:any)'] = 'TimeRecord/view/$1';





