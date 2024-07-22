<?php
class PageController {
    function beforeroute($f3) {
        // This method runs before every route in this controller
        $f3->set('header', 'includes/header.html');
        $f3->set('footer', 'includes/footer.html');
    }

    function home($f3) {
        $f3->set('title', 'Home');
        $f3->set('content', 'index.html');
        echo \Template::instance()->render('template.html');
    }

    function login($f3) {
        $f3->set('title', 'Login/Signup');
        $f3->set('content', 'login.html');
        echo \Template::instance()->render('template.html');
    }

    function profile($f3) {
        $f3->set('title', 'Profile');
        $f3->set('content', 'profile.html');
        echo \Template::instance()->render('template.html');
    }

    function new($f3) {
        $f3->set('title', 'AddNewTasks');
        $f3->set('content', 'new.html');
        echo \Template::instance()->render('template.html');
    }

    function update($f3) {
        $f3->set('title', 'Update');
        $f3->set('content', 'updating.html');
        echo \Template::instance()->render('template.html');
    }

    function contactus($f3) {
        $f3->set('title', 'Contact Us');
        $f3->set('content', 'contactus.html');
        echo \Template::instance()->render('template.html');
    }
}