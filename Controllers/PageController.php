<?php
class PageController extends Controller{
    function beforeroute($f3) {
        // This method runs before every route in this controller
        $f3->set('header', 'includes/header.html');
        $f3->set('footer', 'includes/footer.html');
    }

    function home($f3) {
        //$f3->set('title', 'Home');
        $this->setPageTitle("Home");
        $f3->set('content', 'index.html');
        echo \Template::instance()->render('template.html');
    }

    function profile($f3) {
        //$f3->set('title', 'Profile');
        $this->setPageTitle("Profile");
        $f3->set('content', 'profile.html');
        echo \Template::instance()->render('template.html');
    }

    function new($f3) {
        //$f3->set('title', 'AddNewTasks');
        $this->setPageTitle("New Task");
        $f3->set('content', 'new.html');
        echo \Template::instance()->render('template.html');
    }

    function update($f3) {
        //$f3->set('title', 'Update');
        $this->setPageTitle("Update Task");
        $f3->set('content', 'updating.html');
        echo \Template::instance()->render('template.html');
    }

    function contactus($f3) {
        //$f3->set('title', 'Contact Us');
        $this->setPageTitle("Contact Us");
        $f3->set('content', 'contactus.html');
        echo \Template::instance()->render('template.html');
    }
}