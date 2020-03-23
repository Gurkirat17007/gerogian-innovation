<?php
session_start();
// Change this to your connection info.
//$DATABASE_HOST = 'localhost';
//$DATABASE_USER = 'root';
//$DATABASE_PASS = '';
//$DATABASE_NAME = 'phplogin';

$DATABASE_HOST = 'db5000339019.hosting-data.io';
$DATABASE_USER = 'dbu252656';
$DATABASE_PASS = 'Gurkirat.10';
$DATABASE_NAME = 'dbs329728';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>