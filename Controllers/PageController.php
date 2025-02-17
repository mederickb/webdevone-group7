<?php
class PageController extends Controller{
    function beforeroute($f3) {
        // This method runs before every route in this controller
        $f3->set('header', 'includes/header.html');
        $f3->set('footer', 'includes/footer.html');
        $f3->set('aside', 'includes/aside-user.html'); // only for pages where user is logged in
        $f3->set('listsdrop', 'tasks/lists-dropdown.html');
        $f3->set('listsaside', 'tasks/lists-aside.html');
    }

    function home($f3) {
        $this->setPageTitle("Home");
        $f3->set('content', 'index.html');
        echo \Template::instance()->render('template.html');
    }

    function all($f3) {
        $this->setPageTitle("All Tasks");
        $f3->set('content', 'all.html');
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
        $lc = new ListsController($f3);
        $lc->getListsDrop();
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

    function newlist($f3) {
        $this->setPageTitle("New List");
        $f3->set('content', 'newlist.html');
        $lc = new ListsController($f3);
        $lc->getListsDrop();
        echo \Template::instance()->render('template.html');
    }
}