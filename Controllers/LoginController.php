<?php
require_once 'Models/LoginModel.php';

class LoginController {
    private $f3;
    private $model;

    public function __construct($f3) {
        $this->f3 = $f3;
        $this->model = new LoginModel($f3);

        // Set header and footer
        $this->f3->set('header', 'includes/header.html');
        $this->f3->set('footer', 'includes/footer.html');
    }

    public function login() {
        if ($this->f3->VERB == 'POST') {
            $email = filter_var($this->f3->get('POST.email'), FILTER_SANITIZE_EMAIL);
            $password = $this->f3->get('POST.password');

            // Authenticate user
            $user = $this->model->authenticate($email, $password);

            if ($user) {
                $this->f3->set('SESSION.user', $user);
                $this->f3->reroute('/new'); // Redirect to AddNewTask page upon successful login
            } else {
                $this->f3->set('error', 'Invalid email or password');
                $this->f3->set('title', 'Login');
                $this->f3->set('content', 'login.html');
                echo \Template::instance()->render('template.html'); // Render the login page with error
            }
        } else {
            // Handle GET request for the login page
            $this->f3->set('title', 'Login');
            $this->f3->set('content', 'login.html');
            echo \Template::instance()->render('template.html'); // Render the login page
        }
    }
    
    //TODO:
    public function logout() {
        $this->f3->clear('SESSION.user');
        $this->f3->reroute('/login');
    }
}
