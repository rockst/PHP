<?php
require_once 'ServiceFunctions.php';

if(isset($_GET["method"])) {
	switch ($_GET["method"]) {
		case 'countWords':
			$responese = ServiceFunctions::countWords($_GET["words"]);
			break;
		case 'getdisplayName':
			$responese = ServiceFunctions::getdisplayName($_GET["first_name"], $_GET["last_name"]);
			break;
		default:
			$responese = "Unknow Method";
	}
} else {
	$responese = "Unknow Method";
}

header('Content-Type: application/json');
echo json_encode($responese);

