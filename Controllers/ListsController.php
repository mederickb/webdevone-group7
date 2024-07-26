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

    /**
     * Listing all user 1 lists (temp) for dropdown
     */
    public function getListsDrop() {
        $lists = $this->model->fetchLists();

        $this->f3->set('lists', $lists);
        $this->setPageTitle("User Lists");
        //echo $this->template->render('tasks/lists-dropdown.html');
    }

    /**
     * Prepare to create new list
     */
    public function addList() {
        $data = ['list_id'=>'', 'content'=>'', 'due_date'=>NULL];
        $this->f3->set('item', $data);

        $this->setPageTitle("Create List");
        echo $this->template->render('new.html'); //TODO: template
    }

    /**
     * Validate and create new list
     */
    public function addListSave() {
        if ($this->isFormValid()) {
            $itemId = $this->model->addItem();
            //TODO: reroute to list that task was added to
        }
    }

    /**
     * Prepare to edit an existing list
     */
    public function editList() {
        $item = $this->model->fetchById($this->f3->get('PARAMS.pid'));

        if (!$item) {
            //TODO: reroute differently?
            $this->f3->reroute('/new');
        }

        $this->f3->set('item', $item);
        $this->setPageTitle("Edit List");
        echo $this->template->render('tasks/updating.html'); //TODO
    }

    /**
     * Validate and edit an existing list
     */
    public function editListSave() {
        if ($this->isFormValid()) {
            $itemId = $this->f3->get('PARAMS.pid');
            $this->model->updateById($itemId);
            $this->f3->reroute('/new'); //TODO
        }
    }

    /**
     * Deletes a given list
     */
    public function deleteList() {
        $this->model->deleteById($this->f3->get('PARAMS.pid'));
        //TODO: Reroute?
    }

    /**
     * Validate form data after POST
     * If it does not validate, it returns false.
     * @return boolean TRUE if valid
     */
    private function isFormValid() {
        $errors = [];
        // validate content
        if (trim($this->f3->get("POST.content")) == "") {
            array_push($errors, "Content is required.");
        }
        // TODO: validate list(?) and date(?)

        if (empty($errors)) {
            return true;
        }
        else {
            $this->f3->set("item", $this->f3->get("POST"));

            $this->f3->set("errors", $errors);
            echo $this->template->render('new.html');
            return false;
        }
    }
}