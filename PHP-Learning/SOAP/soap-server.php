<?php
require 'ServiceFunctions.php';

$o = array('uri' => 'http://localhost:8888/SOAP');
$s = new SoapServer(NULL, $o);
$s->setClass('serviceFunctions');
$s->handle();