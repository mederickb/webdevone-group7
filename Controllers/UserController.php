<?php
require_once 'Models/UserModel.php';

class UserController {
    private $f3;
    private $model;
    private $timeout_duration = 300; // Timeout duration in 5mins

    public function __construct($f3) {
        $this->f3 = $f3;
        $this->model = new UserModel($f3);

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
                $this->f3->set('SESSION.user_id', $user['user_id']);
                $this->f3->set('SESSION.fullname', $user['first_name'] . ' ' . $user['last_name']);
                $this->f3->reroute('/new');
            } else {
                $this->f3->set('error', '  * Invalid Email or Password !');
            }
        } else {
            $this->f3->set('error', '');
        }

        $this->f3->set('title', 'Login/Signup');
        $this->f3->set('content', 'login.html');
        echo \Template::instance()->render('template.html');
    }

    public function logout() {
        session_destroy();
        $this->f3->reroute('/login');
    }

    public function register($f3) {
        if ($this->f3->VERB == 'POST') {
            // Get form data
            $firstName = $f3->get('POST.firstName');
            $lastName = $f3->get('POST.lastName');
            $email = $f3->get('POST.email');
            $password = $f3->get('POST.password');
    
            // Validate form data
            if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
                $this->showLoginPage($f3, 'All fields are required', 'signup');
                return;
            }
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $newUser = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => $hashedPassword
            ];
        
            $userModel = new UserModel($f3->get('DB'));
            $result = $userModel->create($newUser);
    
            if ($result === false) {
                // User creation failed, likely because email already exists
                $this->showLoginPage($f3, '* Email already registered !', 'signup');
            } elseif ($result > 0) {
                // Registration successful
                $newUser['id'] = $result; // Add the new user ID to the array
                $f3->set('SESSION.user', $newUser);
                $f3->set('SESSION.user_id', $newUser['id']);
                $f3->set('SESSION.fullname', $newUser['first_name'] . ' ' . $newUser['last_name']);
                $f3->reroute('/new'); // Redirect to new page
            } else {
                // Registration failed for some other reason
                $this->showLoginPage($f3, '* Registration failed. Please try again.', 'signup');
            }
        } else {
            // If it's not a POST request, just show the login page
            $this->showLoginPage($f3);
        }
    }
    
    private function showLoginPage($f3, $error = '', $activeForm = 'login') {
        $f3->set('error', $error);
        $f3->set('activeForm', $activeForm);
        $f3->set('title', 'Login/Signup');
        $f3->set('content', 'login.html');
        echo \Template::instance()->render('template.html');
    }

    public function updateProfile($f3) {
        // Check if the user is logged in
        if (!$f3->exists('SESSION.user_id')) {
            $f3->reroute('/login');
        }

        // Get the form data
        $firstName = $f3->get('POST.firstName');
        $lastName = $f3->get('POST.lastName');
        $currentPassword = $f3->get('POST.currentPassword');
        $newPassword = $f3->get('POST.newPassword');
    
        // Get the user from the database
        $user = new UserModel($f3->get('DB'));
        $userData = $user->getById($f3->get('SESSION.user_id'));
    
        if (!$userData) {
            $f3->error(404);
        }

        $nameUpdated = false;
        $passwordUpdated = false;
    
        // Check if the new name is different from the existing one
        if ($firstName !== $userData['first_name'] || $lastName !== $userData['last_name']) {
            // Update the user's name only if it has changed
            $user->updateName($f3->get('SESSION.user_id'), $firstName, $lastName);
            $f3->set('SESSION.fullname', $firstName . ' ' . $lastName);
            $nameUpdated = true;
        }
    
        // Update the password if provided
        $passwordUpdated = false;
        if (!empty($currentPassword) && !empty($newPassword)) {
            if (password_verify($currentPassword, $userData['password'])) {
                $user->updatePassword($f3->get('SESSION.user_id'), $newPassword);
                $passwordUpdated = true;
            } else {
                $f3->set('error', 'Current password is incorrect.');
                $f3->reroute('/profile');
            }
        }
    
        if ($nameUpdated && $passwordUpdated) {
            $f3->set('success', 'Name and password updated successfully.');
        } elseif ($nameUpdated) {
            $f3->set('success', 'Name updated successfully.');
        } elseif ($passwordUpdated) {
            $f3->set('success', 'Password updated successfully.');
        } else {
            $f3->set('success', 'No changes were made.');
        }
        $f3->reroute('/new');
    }
}
//$2y$10$2PH8wjbfBB5qyHgJDnt01u/KyB5I/Bcca1XY16FUpZePb5umDZ6kq