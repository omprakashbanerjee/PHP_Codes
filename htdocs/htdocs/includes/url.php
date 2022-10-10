<?php
function redirect($path)
{
	// 	if (isset($_SERVER['HTTPS'])&& $_SERVER['HTTPS'] !='off') {
			// 		$protocol='https';
			// 	}
			// 	else{
			// 		$protocol='http';
			// 	}
			// header("Location: $protocol://". $_SERVER['HTTP_HOST'] ."accessing_single_data.php?id=$id");
				header("Location:".$path);
			exit;
}