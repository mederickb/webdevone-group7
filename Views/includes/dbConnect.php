<?php
// database connection information

// variables
$dbType = "mysql";
$dbServer = "localhost";
$dbName = "fsd12_07";
$dbUser = "fsduser";
$dbPass = "myDBpw";
$dbPort = "3306";

// connection string
$dbConnection = "{$dbType}:host={$dbServer};dbname={$dbName};port={$dbPort}";

// open connection
$db = new PDO($dbConnection, $dbUser, $dbPass);