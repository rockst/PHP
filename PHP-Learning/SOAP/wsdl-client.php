<?php
ini_set("soap.wsdl_cache_enabled", "0");
$c = new SoapClient('users.wsdl');
echo $c->getUsers('rock');