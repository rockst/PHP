<?php
include 'Courier.php';
include 'Parcel.php';

$C1 = new Courier('1','2');
$C1->ship(new Parcel());
$C1->ship(new Parcel());
$C1->ship(new Parcel());


echo count($C1);
