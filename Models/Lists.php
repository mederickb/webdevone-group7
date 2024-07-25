<?php
/**
 * Model to interact with list table
 *
 * Named Lists plural because List is reserved keyword(?)
 */
class Lists extends Model {
    /**
     * Establish table to use
     */
    public function __construct($f3) {
        parent::__construct($f3,'list');
    }

    /**
     * Fetch all lists owned by user 1 (temporary)
     * @return Object database results
     */
    public function fetchLists() {
        $this->load('user_id=1');
        return $this->query;
    }
}