<?php
$db_host="localhost";
	$db_name="omblog";
	$db_user="omprakash";
	$db_pass="mzehwaHyK5KGc8bg";
	$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo mysqli_connect_error();
		exit;
		}