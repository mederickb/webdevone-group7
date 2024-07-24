<?php
require_once 'Models/Model.php';  

class UserModel extends Model {
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

    public function getByEmail($email) {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userData) {
        // check if the email already exists
        if ($this->getByEmail($userData['email'])) {
            return false; // Email already exists
        }

        // If email doesn't exist, create new user
        $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            $userData['first_name'],
            $userData['last_name'],
            $userData['email'],
            $userData['password']
        ]);

        return $result ? $this->db->lastInsertId() : false;
    }
}
