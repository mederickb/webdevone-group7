<?php
// Autoload the framework via Composer
require 'vendor/autoload.php';

// Instantiate the framework
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function($f3) {
    echo 'Hello, Fat-Free Framework!';
});

// Run the framework
$f3->run();