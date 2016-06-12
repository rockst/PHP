<?php
class AAA {
	protected $name;
	
	public function __get($b) {
		return $this->$b;
	}
	
	public function __set($p,$v) {
		$this->$p = $v;
	}
	
	public function __call($name, $params) {
		echo 'call';
	}
}

$A = new AAA();
$A->name = 'rock';
echo $A->name;

$A->rock(); // 不存在的 method 則呼叫 __call