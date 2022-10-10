<?php
/*this is child class of the Item class, inheritance*/
class Book extends Item{
	public $author;
//when we change the behaviour of a same method for a child class then it is called overriding 
	public function sayHello(){
		return $this->name. " is written by " .$this->author;
	}
	public function getCode(){
		return $this->code;
	}
	public function getAddress(){
		return $this->address;
	}
}