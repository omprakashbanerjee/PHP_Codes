<?php
class Database
{
	public function connectDB()
	{
		$db_host="localhost";
		$db_name="omblog";
		$db_user="omprakash";
		$db_pass="mzehwaHyK5KGc8bg";
		$dsn= 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
		return new PDO($dsn,$db_user,$db_pass);
	}
}