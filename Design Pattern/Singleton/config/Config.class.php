<?php
class Config {

	private static $instance;
	private static $config = array();

	private function __construct() {
		// 使用 private 建構子避免在外面被意外地初始化
	}

	private static function getInstance() {
		if (!isset(self::$instance)) {
			$class = __CLASS__;
			self::$instance = new $class();
			require_once 'config.php'; // 使用絕對路徑效率會比較好
			static::$config = $config; // $config 來自上面的 PHP 檔.
			// echo 'initial - ';
		} else {
			// echo 'singleton - ';
		}
	}

	public static function getValue($key) {
		self::getInstance();
		if (isset(self::$config[$key])) {
			return self::$config[$key];
		} else {
			return NULL;
		}
	}

}
