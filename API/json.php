<?php
$a = array(
		array('index'=>'11111'),
		array('index'=>'22222'),
		array('index'=>'33333')
);

echo json_encode($a);

$b = '[{"index":"11111"},{"index":"22222"},{"index":"33333"}]';

print_r(json_decode($b, true));
