<!-- this program cant be accesed directly -->

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
else
 {
	echo "connected successfully";
	echo "</br>";
 }
 
$sql="SELECT * 
FROM articles 
ORDER BY id";//semicolon after the id is optional
$results= mysqli_query($conn,$sql);
if($results===false)//identical operator===
	{
		echo mysqli_error($conn);
	}
else{
	$articles=mysqli_fetch_all($results, MYSQLI_ASSOC);
	var_dump($articles);
}