<?php
function getUsers($name) {
	return $name;
}

ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
$server = new SoapServer("users.wsdl");
$server->addFunction("getUsers");
$server->handle();