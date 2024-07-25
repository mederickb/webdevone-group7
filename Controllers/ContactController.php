<?php
require_once 'Models/Contact.php';

class ContactController {
    private $f3;
    private $model;

    public function __construct($f3) {
        $this->f3 = $f3;
        $this->model = new Contact($f3);
        $this->f3->set('header', 'includes/header.html');
        $this->f3->set('footer', 'includes/footer.html');
    }

    public function showContactPage() {
        // Check if there's a success message and pass it to the view
        if ($this->f3->exists('SESSION.success')) {
            $this->f3->set('success', $this->f3->get('SESSION.success'));
            // Clear the success message from the session
            $this->f3->clear('SESSION.success');
        }

        $this->f3->set('title', 'Contact Us');
        $this->f3->set('content', 'Contactus.html');
        echo \Template::instance()->render('template.html');
    }

    public function submitContact() {
        if ($this->f3->VERB == 'POST') {
            // Get form data
            $firstName = $this->f3->get('POST.firstName');
            $lastName = $this->f3->get('POST.lastName');
            $email = $this->f3->get('POST.email');
            $comments = $this->f3->get('POST.comments');

            // Validate data (you may want to add more validation)
            if (empty($firstName) || empty($lastName) || empty($email) || empty($comments)) {
                $this->f3->error(400, 'All fields are required');
                return;
            }

            // Prepare data for insertion
            $data = [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'comments' => $comments
            ];

            // Insert data into database
            $result = $this->model->addContact($data);

            if ($result) {
                // Set success message in session
                $this->f3->set('SESSION.success', 'Thank you for your message. We\'ll get back to you soon!');
                $this->f3->reroute('/contact');
            } else {
                // Handle the error (you might want to show an error message)
                $this->f3->error(500, 'An error occurred while submitting the form');
            }
        }
    }
}