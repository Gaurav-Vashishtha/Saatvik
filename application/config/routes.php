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
$route['default_controller'] = 'Home_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']                 = 'admin/superadmin/superadmin/login';
$route['admin/login']           = 'admin/superadmin/superadmin/login';
$route['admin/logout']          = 'admin/superadmin/superadmin/logout';
$route['admin/dashboard']       = 'admin/superadmin/superadmin/dashboard';
$route['admin/change_password'] = 'admin/superadmin/superadmin/changePassword';


$route['user']                = 'admin/useradmin/user/index';
$route['user/login']          = 'admin/useradmin/user/userLogged';
$route['user/logout']         = 'admin/useradmin/user/userLogout';
$route['user/dashboard']      = 'admin/useradmin/user/userdashboard';
$route['user/change_password']= 'admin/useradmin/user/userChangePassword';


$route['admin/manage-hr'] = 'admin/superadmin/Managehr/index';
$route['admin/manage-hr/create'] = 'admin/superadmin/Managehr/create';
$route['admin/manage-hr/edit/(:num)'] = 'admin/superadmin/Managehr/edit/$1';
$route['admin/manage-hr/delete/(:num)'] = 'admin/superadmin/Managehr/delete/$1';
$route['admin/manage-hr/toggle/(:num)'] = 'admin/superadmin/Managehr/toggle/$1';


$route['admin/policy-procedures'] = 'admin/superadmin/Manageprivacy/index';
$route['admin/policy-procedures/create'] = 'admin/superadmin/Manageprivacy/create';
$route['admin/policy-procedures/edit/(:num)'] = 'admin/superadmin/Manageprivacy/edit/$1';
$route['admin/policy-procedures/delete/(:num)'] = 'admin/superadmin/Manageprivacy/delete/$1';
$route['admin/policy-procedures/toggle/(:num)'] = 'admin/superadmin/Manageprivacy/toggle/$1';

$route['admin/employee'] = 'admin/superadmin/Manageemployee/index';
$route['admin/employee/create'] = 'admin/superadmin/Manageemployee/create';
$route['admin/employee/edit/(:num)'] = 'admin/superadmin/Manageemployee/edit/$1';
$route['admin/employee/delete/(:num)'] = 'admin/superadmin/Manageemployee/delete/$1';
$route['admin/employee/toggle/(:num)'] = 'admin/superadmin/Manageemployee/toggle/$1';
$route['admin/employee/export_csv'] = 'admin/superadmin/Manageemployee/export_csv';

$route['admin/manage-quiz'] = 'admin/superadmin/Managequiz/index';
$route['admin/manage-quiz/create'] = 'admin/superadmin/Managequiz/create';
$route['admin/manage-quiz/edit/(:num)'] = 'admin/superadmin/Managequiz/edit/$1';
$route['admin/manage-quiz/delete/(:num)'] = 'admin/superadmin/Managequiz/delete/$1';
$route['admin/manage-quiz/toggle/(:num)'] = 'admin/superadmin/Managequiz/toggle/$1';

$route['admin/manage-learning-material'] = 'admin/superadmin/Managelearningmaterial/index';
$route['admin/manage-learning-material/create'] = 'admin/superadmin/Managelearningmaterial/create';
$route['admin/manage-learning-material/edit/(:num)'] = 'admin/superadmin/Managelearningmaterial/edit/$1';
$route['admin/manage-learning-material/delete/(:num)'] = 'admin/superadmin/Managelearningmaterial/delete/$1';
$route['admin/manage-learning-material/toggle/(:num)'] = 'admin/superadmin/Managelearningmaterial/toggle/$1';

$route['admin/manage-news-events'] = 'admin/superadmin/Managenewsevents/index';
$route['admin/manage-news-events/create'] = 'admin/superadmin/Managenewsevents/create';
$route['admin/manage-news-events/edit/(:num)'] = 'admin/superadmin/Managenewsevents/edit/$1';
$route['admin/manage-news-events/delete/(:num)'] = 'admin/superadmin/Managenewsevents/delete/$1';
$route['admin/manage-news-events/toggle/(:num)'] = 'admin/superadmin/Managenewsevents/toggle/$1';

$route['admin/manage-departmental-information'] = 'admin/superadmin/Managedepartmentalinfo/index';
$route['admin/manage-departmental-information/create'] = 'admin/superadmin/Managedepartmentalinfo/create';
$route['admin/manage-departmental-information/edit/(:num)'] = 'admin/superadmin/Managedepartmentalinfo/edit/$1';
$route['admin/manage-departmental-information/delete/(:num)'] = 'admin/superadmin/Managedepartmentalinfo/delete/$1';
$route['admin/manage-departmental-information/toggle/(:num)'] = 'admin/superadmin/Managedepartmentalinfo/toggle/$1';

$route['admin/manage-moments'] = 'admin/superadmin/Managemoments/index';
$route['admin/manage-moments/create'] = 'admin/superadmin/Managemoments/create';
$route['admin/manage-moments/edit/(:num)'] = 'admin/superadmin/Managemoments/edit/$1';
$route['admin/manage-moments/delete/(:num)'] = 'admin/superadmin/Managemoments/delete/$1';
$route['admin/manage-moments/toggle/(:num)'] = 'admin/superadmin/Managemoments/toggle/$1';


// $route['admin/manage-leadership-desk'] = 'admin/superadmin/Manageleadershipdesk/index';
// $route['admin/manage-leadership-desk/create'] = 'admin/superadmin/Manageleadershipdesk/create';
// $route['admin/manage-leadership-desk/edit/(:num)'] = 'admin/superadmin/Manageleadershipdesk/edit/$1';
// $route['admin/manage-leadership-desk/delete/(:num)'] = 'admin/superadmin/Manageleadershipdesk/delete/$1';
// $route['admin/manage-leadership-desk/toggle/(:num)'] = 'admin/superadmin/Manageleadershipdesk/toggle/$1';

$route['admin/manage-apps'] = 'admin/superadmin/Manageapp/index';
$route['admin/manage-apps/create'] = 'admin/superadmin/Manageapp/create';
$route['admin/manage-apps/edit/(:num)'] = 'admin/superadmin/Manageapp/edit/$1';
$route['admin/manage-apps/delete/(:num)'] = 'admin/superadmin/Manageapp/delete/$1';
$route['admin/manage-apps/toggle/(:num)'] = 'admin/superadmin/Manageapp/toggle/$1';

$route['admin/manage-leadership'] = 'admin/superadmin/Manageleader/index';
$route['admin/manage-leadership/create'] = 'admin/superadmin/Manageleader/create';
$route['admin/manage-leadership/edit/(:num)'] = 'admin/superadmin/Manageleader/edit/$1';
$route['admin/manage-leadership/delete/(:num)'] = 'admin/superadmin/Manageleader/delete/$1';
$route['admin/manage-leadership/toggle/(:num)'] = 'admin/superadmin/Manageleader/toggle/$1';

$route['admin/admin-roles'] = 'admin/superadmin/Adminroles/index';
$route['admin/admin-roles/create'] = 'admin/superadmin/Adminroles/create';
$route['admin/admin-roles/edit/(:num)'] = 'admin/superadmin/Adminroles/edit/$1';
$route['admin/admin-roles/toggle/(:num)'] = 'admin/superadmin/Adminroles/toggle/$1';


$route['upload-editor-image'] = 'common/upload_editor_image';

$route['admin/corporate-communication'] = 'admin/superadmin/Manageleadershipdesk/corporate';
$route['admin/corporate-communication/create'] = 'admin/superadmin/Manageleadershipdesk/create_corporate';
$route['admin/corporate-communication/edit/(:num)'] = 'admin/superadmin/Manageleadershipdesk/edit/$1';
$route['admin/corporate-communication/delete/(:num)'] = 'admin/superadmin/Manageleadershipdesk/delete/$1';
$route['admin/corporate-communication/toggle/(:num)'] = 'admin/superadmin/Manageleadershipdesk/toggle/$1';


$route['admin/notice-circulars'] = 'admin/superadmin/Manageleadershipdesk/notice';
$route['admin/notice-circulars/create'] = 'admin/superadmin/Manageleadershipdesk/create_notice';
$route['admin/notice-circulars/edit/(:num)'] = 'admin/superadmin/Manageleadershipdesk/edit/$1';
$route['admin/notice-circulars/delete/(:num)'] = 'admin/superadmin/Manageleadershipdesk/delete/$1';
$route['admin/notice-circulars/toggle/(:num)'] = 'admin/superadmin/Manageleadershipdesk/toggle/$1';


$route['admin/new-joinee'] = 'admin/superadmin/Manageleadershipdesk/joinee';
$route['admin/new-joinee/create'] = 'admin/superadmin/Manageleadershipdesk/create_joinee';
$route['admin/new-joinee/edit/(:num)'] = 'admin/superadmin/Manageleadershipdesk/edit/$1';
$route['admin/new-joinee/delete/(:num)'] = 'admin/superadmin/Manageleadershipdesk/delete/$1';
$route['admin/new-joinee/toggle/(:num)'] = 'admin/superadmin/Manageleadershipdesk/toggle/$1';

$route['admin/employee/import_csv'] = 'admin/superadmin/Manageemployee/import_csv';
$route['admin/employee/download_sample_csv'] = 'admin/superadmin/Manageemployee/download_sample_csv';

// $route['admin/manage-training'] = 'admin/superadmin/ManageTraining/index';
// $route['admin/manage-training/create'] = 'admin/superadmin/ManageTraining/add';
// $route['admin/manage-training/edit/(:num)'] = 'admin/superadmin/ManageTraining/edit/$1';
// $route['admin/manage-training/delete/(:num)'] = 'admin/superadmin/ManageTraining/delete/$1';


$route['admin/manage-training'] =              'admin/superadmin/ManageTraining/index';
$route['admin/manage-training/create'] =       'admin/superadmin/ManageTraining/create';
$route['admin/manage-training/edit/(:num)'] =   'admin/superadmin/ManageTraining/edit/$1';
$route['admin/manage-training/delete/(:num)'] = 'admin/superadmin/ManageTraining/delete/$1';
$route['admin/manage-training/toggle/(:num)'] = 'admin/superadmin/ManageTraining/toggle/$1';

























//APIs
$route['api/get-this-month-birthday'] = 'admin/superadmin/Apis/ApiController/get_this_month_birthday';
$route['api/get-moments'] = 'admin/superadmin/Apis/ApiController/get_moments';
$route['api/get-policies'] = 'admin/superadmin/Apis/ApiController/get_policies';
$route['api/get-new-events'] = 'admin/superadmin/Apis/ApiController/get_newevents';
$route['api/get-learning-material'] = 'admin/superadmin/Apis/ApiController/get_learning_material';
$route['api/get-quiz'] = 'admin/superadmin/Apis/ApiController/get_quiz';
$route['api/get-ledership-desk'] = 'admin/superadmin/Apis/ApiController/get_ledership_desk';
$route['api/get-departmental-information'] = 'admin/superadmin/Apis/ApiController/get_departmental_information';
$route['api/get-apps'] = 'admin/superadmin/Apis/ApiController/get_apps';
$route['api/get-leader'] = 'admin/superadmin/Apis/ApiController/get_leader';





