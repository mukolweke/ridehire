<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//public route
$route['sign_in'] = '/homepage/login';
$route['sign_up'] = '/homepage/signup';
$route['sign_out'] = '/homepage/signout';
$route['_in'] = '/homepage/index_in';
$route['rent_ride'] = '/homepage/rent';
$route['hire_ride'] = '/homepage/hire';

//redirects
$route['success_booking'] = '/homepage/success_booking';
$route['success_rent'] = '/homepage/success_rent';
$route['redirectsuc'] = '/homepage/signup_success';
$route['redirect_suc'] = '/homepage/login_success';
$route['redirecterr'] = '/homepage/signup_error';
$route['error_rent'] = '/homepage/error_rent';
$route['error_booking'] = '/homepage/error_rent';


//form routes
$route['rentRideAction'] = '/homepage/submitRideDetails';
$route['hireRideAction'] = '/homepage/submitHireDetails';
$route['signupAction'] = '/homepage/signupUser';
$route['signinAction'] = '/homepage/signinUser';