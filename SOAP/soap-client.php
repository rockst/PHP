<?php
$o = array(
		'uri' => 'http://localhost:8888/SOAP',
		'location' => 'http://localhost:8888/SOAP/soap-server.php',
		'trace' => 1
);

$c = new SoapClient(NULL, $o);

echo $c->getDisplayName('Joe', 'Bloggs');
echo $c->countWords(4);