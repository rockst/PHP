<?php
$data = array(
		"title" => 'test' . $_GET["id"],
		"date" => '2016-01-01'
);

echo json_encode($data);