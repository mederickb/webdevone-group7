<?php
/**
 * Model to interact with item table
 */
class Task extends Model {
	/**
	 * Establish table to use
	 */
	public function __construct() {
		parent::__construct('task');
	}
	
	/**
	 * Fetch all completed to do list items (for testing purposes)
	 * @return Object database results
	 */
	public function fetchDone() {
		$this->load('is_completed=1');
		return $this->query;
	}

    /**
     * Dummy method
     */
    public function addDummy() {
        $this->list = 1;
        $this->content = "test";
        $this->is_completed = 1;
        $this->save();
    }
}