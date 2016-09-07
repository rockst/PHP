<?php
// Initialize the array with a fixed length
$array = new SplFixedArray(6);

$array[1] = 2;
$array[4] = "foo";
$array[5] = "123";

var_dump($array[0]); // NULL
var_dump($array[1]); // int(2)
var_dump($array["4"]); // string(3) "foo"
var_dump($array["5"]); // string(3) "foo"

$array->setSize(10);

$array[9] = "asdf";
var_dump($array["9"]);