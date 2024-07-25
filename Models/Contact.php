<?php
require_once 'Models/Model.php';  

class Contact extends Model {
    public function __construct($f3) {
        parent::__construct($f3, 'contacts');
    }

    public function addContact($data) {
        return $this->db->exec(
            'INSERT INTO contacts (first_name, last_name, email, comments) VALUES (?, ?, ?, ?)',
            array($data['firstName'], $data['lastName'], $data['email'], $data['comments'])
        );
    }
}