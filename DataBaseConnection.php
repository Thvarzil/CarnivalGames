<?php
$host="127.0.0.1";
$user="root";
$password="DBAdmin";
$dbname="CSIS2440";

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
