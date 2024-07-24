<?php
/**
 * Controller for the to do list items
 */

class TaskController extends Controller {
	
	private $model; // db object
	
	public function __construct($f3) {
		parent::__construct($f3);
		
		$this->model = new Task(); // est db connection
	}
	
	/**
	 * Listing all completed to do list items
	 */
	public function getCompleted() {
		$tasks = $this->model->fetchDone();
		
		$this->f3->set('tasks', $tasks);
		$this.setPageTitle("Completed");
		echo $this->template->render('tasks/completed');
	}
}