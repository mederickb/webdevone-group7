<?php
/**
 * @var $db
 */

	require "includes/dbConnect.php";
	
	$query = $db->query("SELECT * FROM user");
	$results = $query->fetchAll();
	
	$pageTitle = "Create Item";
    
    while($row = $results->fetch)
?>

<main>
	<div>
        <p>Hello</p>
	</div>
</main>
