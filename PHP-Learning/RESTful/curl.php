<?php
// Get (select)
// $ch = curl_init('http://localhost:8888/RESTful/events');
// //$ch = curl_init('http://localhost:8888/RESTful/events/1');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $resp = curl_exec($ch);
// $events = json_decode($resp, 1);
// print_r($events);

// POST (create)
// $item = array(
// 		"title" => "rock",
// 		"date" => date('U', mktime(0,0,0,4,17,2012)),
// 		"capacity" => 210
// );

// $data = json_encode($item);
// $ch = curl_init('http://localhost:8888/RESTful/events');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// $resp = curl_exec($ch);
// $events = json_decode($resp,1);
// print_r($events);

// PUT (update)
// $ch = curl_init('http://localhost:8888/RESTful/events/1');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $resp = curl_exec($ch);
// $item = json_decode($resp, 1);
// print_r($item);
// $item["title"] = '12321312312312';

// $data = json_encode($item);
// $ch = curl_init('http://localhost:8888/RESTful/events/1');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// $resp = curl_exec($ch);
// print_r($resp);

// $ch = curl_init('http://localhost:8888/RESTful/events/1');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $resp = curl_exec($ch);
// print_r(json_decode($resp,1));

// DELETE
$ch = curl_init('http://localhost:8888/RESTful/events/0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$resp = curl_exec($ch);

$ch = curl_init('http://localhost:8888/RESTful/events/0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);
print_r(json_decode($resp,1));