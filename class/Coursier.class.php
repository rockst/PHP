<?php
// namespace shipping;

class Courier {
	public $name;
	public $home_country;
	
	public function __construct($name) {
		$this->name = $name;
		return true;
	}
	
	public function ship() {
		return true;
	}
	
	public static function static_func() {
		return array(array("something"));
	}
	
}

class Mono extends Courier {
	
	public function ship(Array $parcel) {
		return true;
	}
	
}

?>