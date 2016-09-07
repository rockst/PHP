<?php
include 'connect.php';

$stm = $db->prepare('CALL lstReport()');
$stm->execute();
$rows = $stm->fetchAll();
print_r($rows);
