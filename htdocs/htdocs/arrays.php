<?php
$array1=["first element","second element","third element"];
var_dump($array1);
echo "</br>";

$integer_indexed_array1=[1=>"first element",0=>"second element",2=>"third element"];
var_dump($integer_indexed_array1);
;echo "</br>";

$array2 = array("1 element","2nd element" ,"3rdelement" );
var_dump($array2);
echo "</br>";

$string_indexed_array2 = array("first"=>"1 element","second"=>"2nd element" ,"3rdelement" );//string indexed
//here numbered indexing will start on its own whether we give or not
var_dump($string_indexed_array2);
echo "</br>";
$price=100;
$name='om';
$mixed_array=[$price,$name];
var_dump($mixed_array);