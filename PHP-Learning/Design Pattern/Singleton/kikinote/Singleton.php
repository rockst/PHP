<?php
class Light //手電筒
{
	private $Name; //手電筒的名稱

	//需要一個屬於這個class唯一的變數來存下到時候產生的物件
	private static $instance;

	public function __construct($inputName)
	{
		echo "Create a Light Object" . PHP_EOL;
		$this->Name = $inputName;
	}
	
	public static function Singleton($inputName) //多了一個Singleton的函數
	{
		//首先先判斷有沒有產生過這個物件，有的話就直接回傳使用，沒有的話再產生
		if (!isset(self::$instance)) {
			$className = __CLASS__;
			self::$instance = new $className($inputName);
		}
		return self::$instance;
	}
	
	public function turnOn()
	{
		echo "Light \"$this->Name\" is TURN ON now". PHP_EOL;
	}
	
	public function turnOff()
	{
		echo "Light \"$this->Name\" is TURN OFF now". PHP_EOL;
	}
}


class Student//學生
{
	private $Name; //學生姓名
	//private $MyLight;  //這裡這個MyLight也不需要了
	public function __construct($inputName)
	{
		echo "Create a Student Object names $inputName" . PHP_EOL;
		$this->Name = $inputName;
	}
	/* 這整個函式不再需要了
	 private function createLight()
	 {
	 //把建構子註解掉的Code拿過來放在這邊
	 echo "Create a Lignt for this student use";
	 $this->MyLight = new Light($inputName."'s Light");
	 }*/
	public function turnOnMyLight()
	{
		//改用Singleton的方式產生物件，不再用new
		$tempMyLight = Light::Singleton($this->Name."'s Light");
		$tempMyLight->turnOn();
	}
	public function turnOffMyLight()
	{
		//改用Singleton的方式產生物件，不再用new
		$tempMyLight = Light::Singleton($this->Name."'s Light");
		$tempMyLight->turnOff();
	}
	public function goPlay()
	{
		echo "do nothing only play" . PHP_EOL;
	}
}

$MyStudent = new Student("Michael");
$MyStudent->turnOnMyLight(); //先打開
$MyStudent->turnOffMyLight(); //再關上
