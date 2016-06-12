<?php
include 'connect.php';

$sql = 'update report set w2f_rate = 10.01 where tag = :tag';
$stm = $db->prepare($sql);
$stm->execute(array(':tag'=>'201610'));
echo $stm->rowCount();

print_r($stm->errorInfo());