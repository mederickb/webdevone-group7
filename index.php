<?php
// Autoload the framework via Composer
require 'vendor/autoload.php';

// Instantiate the framework
$f3 = Base::instance();

// Load configuration (optional, but recommended)
$f3->config('config.ini');

// Load routes
$f3->route('GET /', 'PageController->home');
$f3->route('GET /login', 'PageController->login');
$f3->route('GET /profile', 'PageController->profile');
$f3->route('GET /new', 'PageController->new');
$f3->route('GET /update', 'PageController->update');
$f3->route('GET /contactus', 'PageController->contactus');

// Run the framework
$f3->run();