<?php
/*
 * autoload class
 * @param class Name
 * @return vold
 */
function __autoload($classname) {
	include 'class/' . $classname . ".class.php";
}