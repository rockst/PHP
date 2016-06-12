<?php
class Light //手電筒
{
	private $Name; //手電筒的名稱
	public function __construct($inputName)
	{
		echo "Create a Light Object". PHP_EOL;
		$this->Name = $inputName;
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
	private $MyLight;
	public function __construct($inputName)
	{
		echo "Create a Student Object names $inputName". PHP_EOL;
		$this->Name = $inputName;
	}
	private function createLight()  //多一個產生Light的函式
	{
		//把建構子註解掉的Code拿過來放在這邊
		echo "Create a Lignt for this student use". PHP_EOL;
		$this->MyLight = new Light($this->Name."'s Light"); //$inputName 要改成 $this->Name
	}
	public function turnOnMyLight()
	{
		if(!isset($this->MyLight)) //如果並沒有MyLight，就先產生
		{
			$this->createLight();
		}
		$this->MyLight->turnOn();
	}
	public function turnOffMyLight()
	{
		if(!isset($this->MyLight)) //如果並沒有MyLight，就先產生
		{
			$this->createLight();
		}
		$this->MyLight->turnOff();
	}
	public function goPlay()
	{
		echo "do nothing only play". PHP_EOL;
	}
}

$MyStudent = new Student("Michael");
$MyStudent->turnOnMyLight();
$MyStudent->turnOffMyLight();
// $MyStudent->goPlay();