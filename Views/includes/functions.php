<?php
session_start();

$isUserLoggedIn = (array_key_exists('resumeIsAuth', $_COOKIE) && $_COOKIE['resumeIsAuth'] == true);
$isSessLoggedIn = (array_key_exists('sessIsAuth', $_SESSION) && $_SESSION['sessIsAuth'] == true);

// empty validation
function validateIsEmptyText($key, $array) {
	if(!array_key_exists($key, $array) || trim($array[$key]) == '') {
		return true;
	}
	else {
		return false;
	}
}

// redirect if not logged in
function loginRequired($loginFlag) {
	if($loginFlag != true) {
		header("Location: index.php"); //TODO: FIX LOCATION
		die();
	}
}