<?php

$x=10;//these are variables
$y=3.4;//here we dont need to mention data type
$result =$x+$y;
echo "addition result = $result"; //variable interpolation
echo "</br>";
$price="150";
$tag="price";
echo $tag." ".$price; //string concatenation
//var_dump($result);
echo "</br>";
echo "y=";var_dump($y);
echo "</br>";
echo "price=price*x=";
$price=$price*$x;
$x=$x*$price;
var_dump($price); //type juggling
echo "</br>"."value of x=x*price is ";
var_dump($x);
$end= '4 O\' clock';
//we can use string within double qutes or single qoutes
var_dump($end);