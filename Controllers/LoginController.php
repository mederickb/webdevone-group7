<?php
require_once 'Models/LoginModel.php';

class LoginController {
    private $f3;
    private $model;

    public function __construct($f3) {
        $this->f3 = $f3;
        $this->model = new LoginModel($f3);

        $this->f3->set('header', 'includes/header.html');
        $this->f3->set('footer', 'includes/footer.html');
    }

    public function login() {
        if ($this->f3->VERB == 'POST') {
            $email = filter_var($this->f3->get('POST.email'), FILTER_SANITIZE_EMAIL);
            $password = $this->f3->get('POST.password');
    
            $user = $this->model->authenticate($email, $password);
    
            if ($user) {
                $this->f3->set('SESSION.user', $user);
                $this->f3->set('SESSION.fullname', '');
                $this->f3->set('SESSION.fullname', $user['first_name'] . ' ' . $user['last_name']);
                $this->f3->reroute('/new');
            } else {
                $this->f3->set('error', '  * Invalid Email or Password !');
            }
        } else {
            $this->f3->set('error', '');
        }

        $this->f3->set('title', 'Login');
        $this->f3->set('content', 'login.html');
        echo \Template::instance()->render('template.html');
    }
    
    
    
    public function logout() {
        $this->f3->clear('SESSION');
        $this->f3->reroute('/login');
    }
}