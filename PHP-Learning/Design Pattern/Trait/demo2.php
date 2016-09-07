<?php
trait Demo3 {
	public function do_something() {
		echo "hello";
	}
}

trait Demo4 {
	public function do_something() {
		echo "yes";
	}
}

class Demo5 {
	use Demo3, Demo4 {
		Demo3::do_something insteadof Demo4;
	}
}

$d = new Demo5();
echo $d->do_something();