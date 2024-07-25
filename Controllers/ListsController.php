<?php
/**
 * Controller for the lists
 */

class ListsController extends Controller {

    private $model; // db object

    public function __construct($f3) {
        parent::__construct($f3);

        $this->model = new Lists($f3); // est db connection
    }

    /**
     * Listing all user 1 lists (temp)
     */
    public function getLists() {
        $lists = $this->model->fetchLists();

        $this->f3->set('lists', $lists);
        $this->setPageTitle("User Lists");
        echo $this->template->render('tasks/lists.html');
    }
}