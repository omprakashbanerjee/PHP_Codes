<?php
$article=["hellow"];
var_dump(empty($article));
echo "</br>";
#if ,else if condition
if (empty($article))
	{
		echo "condition is true";
	}
else if(!empty($article))
	{
			echo "array not empty";
	}
	echo "</br>";
	var_dump(3==4); #this returns boolean value
$time=0;
#while condition
	while ( $time<= 10) {
		echo "$time"."</br>";
		$time++;
	}
#for loop
for($i=0;$i<=10;$i++)
{$j=$i+1;
echo "forloop ran $j times when i=".$i."</br>";

}
#switch case
$switch_variable="hellow";
switch ($switch_variable) {
	case "om": echo "OM"."</br>";
		break;
	case "ritu": echo "RITU"."</br>";
		break;	
	default:echo "defualt case found";
		break;
}