<?php
$xml = new SimpleXMLElement('<?xml version="1.0"?><root />');

$co1 = $xml->addChild('list');
$co1->addChild('title', 'rock');
$co1->addChild('time', '01:01');

$co2 = $xml->addChild('list');
$co2->addChild('title', 'claire');
$co2->addChild('time', '02:01');

echo $xml->saveXML();

$xml = '<root><list><title>rock</title><time>01:01</time></list><list><title>claire</title><time>02:01</time></list></root>';
$lst = simplexml_load_string($xml);
print_r($lst);