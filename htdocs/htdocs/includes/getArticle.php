<?php
function getArticle($conn,$id,$column='*')
{
	$sql="SELECT $column
	FROM articles
	WHERE id= ? ";
	$stmt=mysqli_prepare($conn,$sql);
	if($stmt===false){
		echo mysqli_error($conn);
	}
	else{
		mysqli_stmt_bind_param($stmt,"i",$id);
		if(mysqli_stmt_execute($stmt)){
			$result=mysqli_stmt_get_result($stmt);
			return mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
	}
}
function validateForm($title,$content,$published_at)
{ $errors=[];
	if ($title=='') 
	{
		$errors[]='title required';
	}
	if ($content=='') 
	{
		$errors[]='content required';
	}
	if ($published_at!='')
	 {
		$date_time=date_create_from_format('Y/m/d G:i:s',$published_at);
		if ($date_time===false)
		 {
			$errors[]='invalid date and time';
		}
		else
		{
			$date_errors=date_get_last_errors();
			if($date_errors['warning_count']>0)
			{
				$errors[]='invalid date and time';
			}
		}
	}
 return  $errors;
}