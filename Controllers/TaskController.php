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
}