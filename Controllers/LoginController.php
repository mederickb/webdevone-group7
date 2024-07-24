<?php
require_once 'Models/LoginModel.php';

class LoginController {
    private $f3;
    private $model;
    private $timeout_duration = 1800; // Timeout duration in 5mins

    public function __construct($f3) {
        $this->f3 = $f3;
        $this->model = new LoginModel($f3);

        $this->f3->set('header', 'includes/header.html');
        $this->f3->set('footer', 'includes/footer.html');
        
        // Start the session and handle timeout
        $this->startSession();
    }

    public function startSession() {
        session_start();
        // Check if the last request was more than the timeout duration ago
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $this->timeout_duration) {
            session_unset();     // Unset $_SESSION variable for the run-time
            session_destroy();   // Destroy the session data on the server
            $this->f3->reroute('/login');
        }
        // Update last activity time
        $_SESSION['LAST_ACTIVITY'] = time();
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
        session_destroy();
        $this->f3->reroute('/login');
    }
}
