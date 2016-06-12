<?php

function test($x) {
	if($x == 0) {
		throw new Exception('傳入的參數不正確');
	} else {
		return $x;
	}
}

try {
	echo test(1);
	echo test(0);
} catch (Exception $e) {
	echo $e->getMessage();
}