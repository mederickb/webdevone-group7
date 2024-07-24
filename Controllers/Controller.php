<?php

class Controller {
	protected $f3;
	protected $template;
	
	function __construct($f3) {
		$this->f3 = $f3;
		
		// set page title
		$f3->set('pageTitle', $f3->get('SITENAME'));
		// error vars
		$f3->set("errors", null);
		
		$this->template = new Template;
	}
	
	public function setPageTitle($title) {
		$currentTitle = $this->f3->get("pageTitle");
		$newTitle = $title;
		
		if ($currentTitle != "") {
			// append
			$newTitle .= " | ". $currentTitle;
		}
		
		$this->f3->set('pageTitle', $newTitle);
	}
}