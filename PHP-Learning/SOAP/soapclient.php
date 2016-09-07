<?php
    if (!defined( "APP_CLASS_PATH" )) {
        define( "APP_CLASS_PATH", dirname(__FILE__)."/");
    }
    
    include_once( APP_CLASS_PATH."nusoap/nusoap.php" );
  
	$soapclient = new nusoap_client('http://others/soapserver.php?wsdl', true);
	$error = $soapclient->getError();
	if ($error) {
		return false;
	}

	// valid login example
	echo '<pre>';
	echo '+------------------------+<br/>';
	echo '| Valid login example    |<br/>';
	echo '| loginId: nusoap        |<br/>';
	echo '| password: 123456       |<br/>';
	echo '| result:                |<br/>';
	echo '+------------------------+<br/>';
	$result = $soapclient->call( 'getUserInfo', array( 'loginId' => 'nusoap', 'password' => md5('123456') ) );

	if ($soapclient->fault) {
		return false;
	} else {
		$error = $soapclient->getError();
		if ($error) {
			return false;
		} else {
			print_r($result);
		}
	}

	echo '+------------------------+<br/>';
	echo '| Invalid login example  |<br/>';
	echo '| loginId: nusoap        |<br/>';
	echo '| password: 654321       |<br/>';
	echo '| result:                |<br/>';
	echo '+------------------------+<br/>';
	$result = $soapclient->call( 'getUserInfo', array( 'loginId' => 'nusoap', 'password' => md5('654321') ) );
	if ($soapclient->fault) {
		return false;
	} else {
		$error = $soapclient->getError();
		if ($error) {
			return false;
		} else {
			print_r($result);
		}
	}
	
	echo '</pre>';
?>