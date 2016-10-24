<?php
$str = "Hi
Rock
";

$str = trim(str_replace( array("\r\n","\r","\n",'  '), ' ' , $str));

// or

$str = trim(preg_replace( array('/\v/','/\s\s+/'), ' ' , $str));
