<?php
require 'Item.php';
require 'Book.php';
/*var_dump(Item::$count); echo "<br>";//accessing static property like this
$my_item1=new Item("name","omji");
var_dump($my_item1);
*/

/*$my_item->name="Example";
//var_dump($my_item->description);
$my_item->sayHello(); echo "<br>";
echo $my_item->getName()."<br>";
$item2= new Item();
$item2->name="example2";
echo $item2->getName();
*/
/*
var_dump(Item::$count); echo "<br>";
$my_item3=new Item("omprakash","student");
var_dump($my_item3);
var_dump(Item::$count); echo "<br>";
Item::showCount();
*/

/*use of getter and setter*/

// $my_item->setName("ommji");
// $my_item->setDescription("i am a student");
// echo $my_item->getName(),"<br>";
//echo $my_item->getDescription();

/*constants in php, these are global and cant be changed anywhere*/
/*
define('MAX',50);
define('MIN','zero');
echo '<br>'.MAX.'<br>';
echo Item::MAXLENGTH;
*/
/*$item= new Item("Item for ","protected");
echo $item->address;//cant access protected property like this
*/

$book= new Book("hindi","literature");
$book->author="premchand";
var_dump($book->code);
echo "<br>".$book->sayHello()."<br>";
echo $book->getCode();
echo $book->getAddress();