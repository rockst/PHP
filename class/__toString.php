<?php
class AAA {
	public $a;
	public $b;
	
	function __construct( $a,  $b) {
		$this->a = $a;
		$this->b = $b;
		return true;
	}
	
	// 將物件轉成字串輸出
	public function __toString() {
		return $this->a . ' (' . $this->b . ') ';
	}
	
}

$A = new AAA('AAAA', 'BBBB');
echo $A;