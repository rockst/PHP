<?php
class DB extends PDO
{
	private static $_conn = null;
	
	public function __construct() {
		parent::__construct('mysql:host=localhost;dbname=rockst', 'rockst', 'letmein');
	}
	
	static function getInstance(){
		if(self::$_conn === null){
			self::$_conn = new self();
		}
		return self::$_conn;
	}
	
}
$db = DB::getInstance();

$sql = "SELECT * FROM report WHERE tag = :tag";
$sth = $db->prepare($sql);
$sth->bindValue(':tag', '201612');
$sth->execute();
$rows = $sth->fetchAll();
print_r($rows);