<?php
$sub_array1=[1,2,3];
echo "sub array1";
var_dump($sub_array1);echo "</br>";

$sub_array2=["my","name","is","om"];
echo "sub array2";
var_dump($sub_array2);echo "</br>";

$sub_array3=[0=>1,1=>"hello","index"=>NULL];
echo "sub array3";
var_dump($sub_array3);echo "</br>";

$main_array=[$sub_array1,$sub_array2,$sub_array3];
echo "main_array";
var_dump($main_array);echo "</br>";

$ram=["name"=>"ram","roll"=>01,"class"=>"x"];
$shyam=["name"=>"shyam","roll"=>02,"class"=>"y"];
$student=[$ram,$shyam];
foreach ($ram as $index=>$key) {
	echo $index."=".$key,", ";
}