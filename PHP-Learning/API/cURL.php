<?php
$ch = curl_init('http://api.bitly.com/v3/shorten'
		. '?login=user&apiKey=secret'
		. '&longUrl=http%3A%2F%2Fsitepoint.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
print_r(json_decode($result));

$ch = curl_init('http://localhost:8888/cosmed/get_cosmed_number.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); // 啟用POST
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( "oid"=>"123") ));
$result = curl_exec($ch);
curl_close($ch);
print_r(json_decode($result,1));