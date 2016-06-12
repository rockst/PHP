<?php
trait Demo {
	public $a = 22;
	 
	public function do_something() {
		echo "hello";
	}
}

class Demo2 {
	use Demo;
}

$d = new Demo2();
echo $d->a . "\n";
echo $d->do_something();