<?php
$passwd = 'letmein';
$salt = '9a1f30943126974075dbd4d13c8018ac';
echo 'md5: ' . md5($passwd) . "\n";
$hash = hash_hmac('md5', $passwd, $salt);
echo $hash . "\n";

if($hash == hash_hmac('md5', 'letmein', $salt)) {
	echo 123;
}