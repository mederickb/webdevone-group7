<?php
require_once 'Models/Model.php';  

class LoginModel extends Model {
    public function __construct($f3) {
        parent::__construct($f3, 'user');
    }

    public function authenticate($email, $password) {
        $user = $this->getByField('email', $email);
        if ($user && $user['password'] === $password) {
            return $user;
        }
        return false;
    }
}
