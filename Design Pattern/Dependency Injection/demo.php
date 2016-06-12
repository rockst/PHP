<?php
class App
{
	protected $auth = null;
	protected $session = null;

	public function __construct(Auth $auth, Session $session)
	{
		$this->auth = $auth;
		$this->session = $Session;
	}

	public function login($username, $password)
	{
		if ($this->auth->check($username, $password)) {
			$this->session->set('username', $username);
			return true;
		}
		return false;
	}
}

class Auth
{
	public function __construct($dsn, $user, $pass)
	{
		echo "Connecting to '$dsn' with '$user'/'$pass'...\n";
	}

	public function check($username, $password)
	{
		echo "Checking username, password from database...\n";
		return true;
	}
}

class Session
{
	public function set($name, $value)
	{
		echo "Set session variable '$name' to '$value'.";
	}
}

$auth 	 = new Auth('mysql://localhost', 'username', 'password');
$session = new Session();
$app 	 = new App($auth, $session); // 解除依賴關係