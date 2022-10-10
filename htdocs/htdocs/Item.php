<?php
class Item
{/*to define a contant inside a classs we use const keyword */
	CONST MAXLENGTH=10;
	 public $name; //these are properties of a class also visible outside the class
	 public $description;//="this is description";//also visible outside the class
	//private $name; 
	//private $description;
	/*these are properties of a class which is only visible inside
	thiss class only, to access these private property we need to use getter and setter methods
	*/
	public $code=1234;
	protected $address="kolkata";//this is accessible to child classes and parent classes only
	public static $count=0; //by making a property static we restrict any object to
	//access this property sa this becomes the property of the class 
	function __construct($name,$description)//this method is generally used to intitialize properties
	{	
		$this->name=$name;
		$this->description=$description;
		static ::$count++;//accessing static property like this
	}
	
	public function sayHello(){
		echo "hello ji";
	}
	public static function showCount()
	{
		echo static::$count;
	}


	// in oops functions are  called methods, their naming style is camel case
/*


	public function setName($name)
	{
		$this->name=$name;
	}
	public function getName(){
		return $this->name;
	}
	public function  setDescription($description)
	{
		$this->description=$description;
	} 
	public function getDescription()
	{
			return $this->description;
	}
	
*/	
}