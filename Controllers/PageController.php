<?php
class PageController extends Controller{
    function beforeroute($f3) {
        // This method runs before every route in this controller
        $f3->set('header', 'includes/header.html');
        $f3->set('footer', 'includes/footer.html');
        $f3->set('listsdrop', 'tasks/lists-dropdown.html');
    }

    function home($f3) {
        $this->setPageTitle("Home");
        $f3->set('content', 'index.html');
        echo \Template::instance()->render('template.html');
    }

    function profile($f3) {
        $this->setPageTitle("Profile");
        $f3->set('content', 'profile.html');
        echo \Template::instance()->render('template.html');
    }

    function new($f3) {
        $this->setPageTitle("New Task");
        $f3->set('content', 'new.html');
        //$f3->ListsController()->getListsDrop();
        //$f3->call(ListsController()->getListsDrop());
        echo \Template::instance()->render('template.html');
    }

    function update($f3) {
        $this->setPageTitle("Update Task");
        $f3->set('content', 'updating.html');
        echo \Template::instance()->render('template.html');
    }

    function contactus($f3) {
        $this->setPageTitle("Contact Us");
        $f3->set('content', 'contactus.html');
        echo \Template::instance()->render('template.html');
    }
}