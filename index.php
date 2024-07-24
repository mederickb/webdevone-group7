<?php
// Autoload the framework via Composer
require 'vendor/autoload.php';

// Instantiate the framework
$f3 = \Base::instance();

// Load configuration 
$f3->config('config.ini');

// Page routes
$f3->route('GET /', 'PageController->home');
$f3->route('GET /profile', 'PageController->profile');
$f3->route('GET /new', 'PageController->new');
$f3->route('GET /update', 'PageController->update');
$f3->route('GET /contactus', 'PageController->contactus');

// Login routes
$f3->route('GET|POST /login', 'UserController->login');
$f3->route('POST /logout', 'UserController->logout');
$f3->route('GET|POST /signup', 'UserController->register');


// Run the framework
$f3->run();