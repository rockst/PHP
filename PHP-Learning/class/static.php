<?php

	class Student {

		public $name;
		public $tel;

		public function __construct($name, $tel) {

			$this->name = $name;
			$this->tel = $tel;

		}

		public function getName() {
			return $this->name;
		}

		static function printObject() {
		
			echo 1;
		
		}

	}


	$Object = new Student("Rock", "0919");

	echo $Object->getName() . "\n";


	Student::printObject();

