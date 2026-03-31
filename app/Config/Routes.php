<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/loginSignup', 'LoginSignup::index');
$routes->post('/student/login-process','LoginSignup::login');
$routes->post('/student/signup-process','LoginSignup::store');
$routes->get('/about', 'About::index');
$routes->get('/academics', 'Academics::index');
$routes->get('/notice', 'Notice::index');
$routes->get('/admission', 'Admission::index');
$routes->get('/co-curricular', 'Co_curricular::index');
$routes->get('/student', 'Student::index', ['filter' => 'studentAuth']);
$routes->get('/contact', 'Contact::index');

$routes->get('/adminLogin','Hello::index');
$routes->post('admin/login-process','Hello::loginProcess');



$routes->group('admin', ['filter' => 'adminAuth'], function($routes){
//Admin
$routes->get('bfps-admin-p', 'P_dashboard::index');
 $routes->get('logout', 'P_dashboard::logout');



//notice backend
    $routes->post('p_dashboard/store', 'Notice::store'); // store notice
    $routes->get('p_dashboard/edit/(:num)', 'Notice::edit/$1');  // edit form of notice
    $routes->post('p_dashboard/update/(:num)', 'Notice::update/$1'); // update form submit of notice
    $routes->get('p_dashboard/delete/(:num)', 'Notice::delete/$1'); // delete notice
//Event backend
    $routes->post('/p_dashboard/storeEvent', 'Notice::storeEvent'); // store notice
    $routes->get('p_dashboard/editEvent/(:num)', 'Notice::editEvent/$1');  // edit form of notice
    $routes->post('p_dashboard/updateEvent/(:num)', 'Notice::updateEvent/$1'); // update form submit of notice
    $routes->get('p_dashboard/deleteEvent/(:num)', 'Notice::deleteEvent/$1'); // delete notice
//Co-curricular backend
    $routes->post('p_dashboard/storeCo-curricular', 'Co_curricular::upload'); // store images/video/iframe
    $routes->get('p_dashboard/deleteCo-curricular/(:num)', 'Co_curricular::delete/$1'); // delete images/video/iframe
//student backend
    $routes->post('p_dashboard/studentCorner/store', 'Student::store');
    $routes->post('p_dashboard/studentCorner/update', 'Student::update');
    $routes->get('p_dashboard/studenttCorner/delete/(:num)', 'Student::delete/$1');
//Topper backend
      $routes->post('p_dashboard/studentCorner/storeTopper', 'Student::storeTopper');
      $routes->get('p_dashboard/studentCorner/editTopper/(:num)', 'Student::editTopper/$1');  // edit form
      $routes->post('p_dashboard/updateTopper/(:num)', 'Student::updateTopper/$1'); // update form
      $routes->get('p_dashboard/studenttCorner/deleteTopper/(:num)', 'Student::deleteTopper/$1');
//contact backend
$routes->post('/contact/store', 'Contact::store'); // store
$routes->post('/contact/markRead/(:num)', 'Contact::markRead/$1'); // mark as read
$routes->post('/contact/delete/(:num)', 'Contact::delete/$1'); // delete message
//miscellaneous backend
    $routes->post('p_dashboard/storeMis', 'Miscellaneous::store'); // store miscellaneous
    $routes->get('p_dashboard/deleteMis/(:num)', 'Miscellaneous::delete/$1'); // delete miscellaneous
    $routes->get('p_dashboard/editMis/(:num)', 'Miscellaneous::edit/$1');  // edit form of miscellaneous
    $routes->post('p_dashboard/updateMis/(:num)', 'Miscellaneous::update/$1'); // update form submit of miscellaneous


});

