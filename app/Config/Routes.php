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
$routes->match(['get','post'],'/','Home::index',['filter'=>'noauth']);
$routes->get('/signup', 'Home::signup',['filter'=>'noauth']); 
$routes->get('dashboard', 'Home::dashboard',['filter'=>'noauth']);
$routes->match(['get','post'],'/signup','Home::signup',['filter'=>'noauth']);
$routes->get('/userlist', 'Home::userlist',['filter'=>'noauth']); 
// $routes->get('/instructor', 'Home::instructor',['filter'=>'noauth']); 
// $routes->post('/instructor_data', 'Home::instructor_data',['filter'=>'noauth']);
$routes->match(['get'],'dashboard_student','Home::dashboard_student'); 
$routes->match(['get'],'instructor_dashboard','Home::instructor_dashboard'); 
$routes->match(['get'],'instructor','Home::instructor'); 
$routes->match(['get','post'],'instructor_data','Home::instructor_data');
$routes->match(['get','post'],'instructor_form_data','Home::instructor_save');
$routes->match(['get','post'],'instructor_profile','Home::instructor_profile');
$routes->match(['get','post'],'admin_data','Home::admin_data');
$routes->match(['get','post'],'student_data','Home::student_data');
$routes->match(['get','post'],'student_form_data','Home::student_save');
// $routes->match(['get','post'],'student_course_list','Home::course_cat_data');

$routes->match(['get','post'],'course_cat','Home::course_cat');
$routes->match(['get','post'],'course_cat_data','Home::course_cat_data');
$routes->match(['get','post'],'category_form_data','Home::category_form_data');
$routes->match(['get','post'],'course_add','Home::course_add');
$routes->match(['get','post'],'course_list_insert','Home::course_list_insert');
$routes->match(['get','post'],'course-view/(:num)','Home::course_view/$1');
// $routes->match(['get','post'],'course_list_load','Home::course_list_load'); 



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
