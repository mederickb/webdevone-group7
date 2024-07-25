<?php
require_once 'Models/Model.php';  

class UserModel extends Model {
    public function __construct($f3) {
        parent::__construct($f3, 'user');
    }

    public function authenticate($email, $password) {
        $user = $this->getByField('email', $email);
        if ($user && password_verify($password, $user['password'])) {
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

    function getById($id) {
        return $this->db->exec('SELECT * FROM user WHERE user_id = ?', $id)[0];
    }

    function updateName($id, $firstName, $lastName) {
        $this->db->exec('UPDATE user SET first_name = ?, last_name = ? WHERE user_id = ?',
            [$firstName, $lastName, $id]);
    }

    function updatePassword($id, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->db->exec('UPDATE user SET password = ? WHERE user_id = ?',
            [$hashedPassword, $id]);
    }
}
