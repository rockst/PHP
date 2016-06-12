<?php
class TTT {
	function __construct() {
		$this->set(); // private 只能內部使用
		return true;
	}
	
	// protected 可以給children使用
	protected function get1() {
		echo 'parant';
	}
	
	// 只能內部使用
	private function set() {
		echo 'private';
	}
	
}
class CCC extends TTT {
	public function get() { // protected 可以給children使用
		$this->get1();
	}
}

$C = new CCC();
$C->get();