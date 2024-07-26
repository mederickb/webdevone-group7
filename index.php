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

// Profile routes
$f3->route('GET|POST /update-profile', 'UserController->updateProfile');

// Contact us routes
$f3->route('GET /contact', 'ContactController->showContactPage');
$f3->route('GET|POST /submit-contact', 'ContactController->submitContact');

// CRUD
// Tasks
$f3->route("GET|POST /done", 'TaskController->getDone'); // completed tasks
$f3->route("GET|POST /notdone", 'TaskController->getNotDone'); // incomplete tasks

$f3->route("GET /tasks/add", 'TaskController->addTask'); // add task
$f3->route("POST /tasks/add", 'TaskController->addTaskSave'); // verify
$f3->route("GET /tasks/@pid/edit", 'TaskController->editTask'); // edit task
$f3->route("POST /tasks/@pid/edit", 'TaskController->editTaskSave'); // verify
$f3->route("POST /tasks/@pid/delete", 'TaskController->deleteTask'); // delete task

// Lists
$f3->route("GET|POST /lists", 'ListsController->getLists'); // get all lists

// add list
// verify
// edit list
// verify
// delete list

// Run the framework
$f3->run();