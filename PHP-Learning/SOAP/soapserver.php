<?php
    if (!defined( "APP_CLASS_PATH" )) {
        define( "APP_CLASS_PATH", dirname(__FILE__)."/");
    }
    
    include_once( APP_CLASS_PATH."nusoap/nusoap.php" );
  
	$NAMESPACE = 'http://others/';

	$server = new soap_server();

	$server->debug_flag=false;
	$server->configureWSDL('User', $NAMESPACE);
	$server->wsdl->schemaTargetNamespace = $NAMESPACE;

	$server->wsdl->addComplexType(
	    'userInfo',
	    'complexType',
	    'struct',
	    'all',
	    '',
	    array(
	        'validUser' => array('name'=>'validUser','type'=>'xsd:int'),
	        'fullName' => array('name'=>'fullName','type'=>'xsd:string'),
	        'eMail' => array('name'=>'eMail','type'=>'xsd:string')
	    )
	);
	
	$server->register( 'getUserInfo',
					   array('loginId'=>'xsd:string', 'password'=>'xsd:string'),
					   array('return'=>'tns:userInfo'),
					   $NAMESPACE
					 );

	$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
	                        ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
	$server->service($HTTP_RAW_POST_DATA);

	function getUserInfo( $loginId, $password ) {
	    if( $loginId == 'nusoap' && $password == md5('123456') )
	    {
		    $userInfo = array( 'validUser' => 1,
							   'fullName' => 'Nu Soap',
							   'eMail' => 'nusoap@soaptest.com'
							 );
		} else {
		    $userInfo = array( 'validUser' => 0,
							   'fullName' => '',
							   'eMail' => ''
							 );	
		}		
	    return $userInfo;
	}
?>
