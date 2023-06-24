<?php 
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
 
// $routes->get('/', 'Home::index',['filter'=>'noauth']); 
$routes->match(['get','post'],'/','Home::index');
$routes->get('/signup', 'Home::signup'); 
$routes->get('dashboard', 'Home::dashboard');
$routes->match(['get','post'],'/signup','Home::signup');
$routes->get('/userlist', 'Home::userlist',['filter'=>'noauth']); 
$routes->match(['get'],'dashboard_student','Home::dashboard_student'); 
$routes->match(['get'],'instructor_dashboard','Home::instructor_dashboard'); 
$routes->match(['get'],'instructor','Home::instructor'); 
$routes->match(['get','post'],'studentRegister','Home::studentRegister');
$routes->match(['get','post'],'studentRegisterSave','Home::studentRegisterSave');
$routes->match(['get','post'],'studentLogin','Home::studentLogin');
$routes->match(['get','post'],'instructor_data','Home::instructor_data');
$routes->match(['get','post'],'instructor_form_data','Home::instructor_save');
$routes->match(['get','post'],'instructor_profile','Home::instructor_profile');
$routes->match(['get','post'],'admin_data','Home::admin_data');
$routes->match(['get','post'],'student_data','Home::student_data');
$routes->match(['get','post'],'student_form_data','Home::student_save'); 

$routes->match(['get','post'],'course_cat','Home::course_cat');
$routes->match(['get','post'],'course_cat_data','Home::course_cat_data');
$routes->match(['get','post'],'category_form_data','Home::category_form_data');
$routes->match(['get','post'],'course_add','Home::course_add');
$routes->match(['get','post'],'course_list_load','Home::course_list_load');
$routes->match(['get','post'],'course_details/(:num)','Home::course_details/$1');
$routes->match(['get','post'],'course_list_insert','Home::course_list_insert');
$routes->match(['get','post'],'course-view/(:num)','Home::course_view/$1');
$routes->match(['get','post'],'course_update_data','Home::course_update_data'); 
$routes->match(['get','post'],'course_delete/(:num)','Home::course_delete/$1');
$routes->match(['get','post'],'course_update/(:num)','Home::course_update/$1');
$routes->match(['get','post'],'course-subcategory','Home::course_module');
$routes->match(['get','post'],'course_module_load','Home::course_module_load');
$routes->match(['get','post'],'course_module_save','Home::course_module_save');
$routes->match(['get','post'],'module_update_show/(:num)','Home::module_update_show/$1');
$routes->match(['get','post'],'module_update_data','Home::module_update_data');
$routes->match(['get','post'],'course_category_lession/(:num)','Home::course_category_lession/$1');
$routes->match(['get','post'],'heading_and_desc/(:num)','Home::heading_and_desc/$1');
$routes->match(['get','post'],'details_module_view/(:num)','Home::details_module_view/$1');
$routes->match(['get','post'],'heading_desc_update','Home::heading_desc_update');
$routes->match(['get','post'],'what_you_learn_list_update','Home::what_you_learn_list_update');
$routes->match(['get','post'],'course_module_form_update','Home::course_module_form_update');
$routes->match(['get','post'],'details_lession_view/(:num)','Home::details_lession_view/$1');
$routes->match(['get','post'],'details_Requirements/(:num)','Home::details_Requirements/$1');
$routes->match(['get','post'],'details_lession_update','Home::details_lession_update');
$routes->match(['get','post'],'details_add_module','Home::details_add_module');
$routes->match(['get','post'],'details_add_lession_save','Home::details_add_lession_save');
$routes->match(['get','post'],'lession/(:num)','Home::lession/$1');
$routes->match(['get','post'],'category_details_select/(:num)','Home::category_details_select/$1');
$routes->match(['get','post'],'category_details_save','Home::category_details_save');

$routes->match(['get','post'],'category_delete/(:num)','Home::category_delete/$1');
$routes->match(['get','post'],'category_update/(:num)','Home::category_update/$1');
$routes->match(['get','post'],'category_update_data','Home::category_update_data'); 


$routes->match(['get','post'],'module_delete/(:num)','Home::module_delete/$1'); 
$routes->match(['get','post'],'module-lession','Home::module_lession');
$routes->match(['get','post'],'lession_save','Home::lession_save');
$routes->match(['get','post'],'autoload_data','Home::autoload_data');



$routes->match(['get','post'],'quiz_data_save','Home::quiz_data_save'); 
$routes->match(['get','post'],'mcq-quiz/(:num)','Home::mcq_quiz/$1');
$routes->match(['get','post'],'module-quiz-start/(:num)','Home::module_quiz_start/$1');
$routes->match(['get','post'],'quiz_answer_form_save','Home::quiz_answer_form_save'); 
$routes->match(['get','post'],'module_quiz_result/(:num)','Home::module_quiz_result/$1'); 
$routes->match(['get','post'],'startquizFun_save/(:num)','Home::startquizFun_save/$1');
$routes->match(['get','post'],'show-all-quises/(:num)','Home::show_all_quises/$1');
// $routes->match(['get','post'],'module-quiz-start/(:num)','Home:module-quiz-start/$1');




$routes->get('/student', 'Home::student',['filter'=>'noauth']); 
$routes->get('/student_profile', 'Home::student_profile',['filter'=>'noauth']); 
$routes->get('/courselist', 'Home::courselist',['filter'=>'noauth']); 
$routes->get('/logout', 'Home::logout',['filter'=>'noauth']); 


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
