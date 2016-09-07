<?php

class Teacher implements SplObserver {
	
	private $name;

	public function __construct($name) {
		$this->name=$name;
	}

	public function update(SplSubject $subject) {
		echo $this->name . " Teacher Says: Hello~~~ \n";
	}

}

class Student implements SplObserver {
	private $name;

	public function __construct($name) {
		$this->name=$name;
	}

	public function update(SplSubject $subject) {
		echo $this->name . " Student Says: Hello~~~ \n";
	}
}

class School implements SplSubject {

	private $name;
	private $people ;
	private $state;

	public function __construct($name) {
		$this->people = new SplObjectStorage();
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}
	public function attach(SplObserver $observer) {
		$this->people->attach($observer);
	}

	public function detach (SplObserver $observer) {
		$this->people->detach($observer);
	}

	public function notify() {
		foreach($this->people as $person) {
			$person->update($this);
		}
	}

	public function getState() {
		return $this->state;
	}

	public function setState($state) {
		$this->state = $state;
	}

}

$school = new School('Rack Lin junior school');

$rack = new Student('rack');
$rack2 = new Student('rack2');
$lily = new Teacher('Lily');

$school->attach($rack);
$school->attach($rack2);
$school->attach($lily);
$school->notify();