<?php
/**
 * Controller for the to do list items
 */

class TaskController extends Controller {
	
	private $model; // db object
	
	public function __construct($f3) {
		parent::__construct($f3);
		
		$this->model = new Task($f3); // est db connection
	}
	
	/**
	 * Listing all completed to do list items
	 */
	public function getDone() {
		$tasks = $this->model->fetchDone();
		
		$this->f3->set('tasks', $tasks);
		$this->setPageTitle("Completed Tasks");
		echo $this->template->render('tasks/tasks.html');
	}

    /**
     * Listing all incomplete to do list items
     */
    public function getNotDone() {
        $tasks = $this->model->fetchNotDone();

        $this->f3->set('tasks', $tasks);
        $this->setPageTitle("Incomplete Tasks");
        echo $this->template->render('tasks/tasks.html');
    }

    /**
     * Prepare to create new task
     */
    public function addTask() {
        $data = ['list_id'=>'', 'content'=>'', 'due_date'=>''];
        $this->f3->set('item', $data);

        $this->setPageTitle("Add Task");
        echo $this->template->render('new.html');
    }

    /**
     * Validate and create new task
     */
    public function addTaskSave() {
        if ($this->isFormValid()) {
            $itemId = $this->model->addItem();
            //TODO: reroute to list that task was added to
        }
    }

    /**
     * Prepare to edit an existing task
     */
    public function editTask() {
        $item = $this->model->fetchById($this->f3->get('PARAMS.pid'));

        if (!$item) {
            //TODO: reroute differently?
            $this->f3->reroute('/new');
        }

        $this->f3->set('item', $item);
        $this->setPageTitle("Edit Task");
        echo $this->template->render('tasks/updating.html');
    }

    /**
     * Validate and edit an existing task
     */
    public function editTaskSave() {
        if ($this->isFormValid()) {
            $itemId = $this->f3->get('PARAMS.pid');
            $this->model->updateById($itemId);
            $this->f3->reroute('/new');
        }
    }

    /**
     * Deletes a given task
     */
    public function deleteTask() {
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