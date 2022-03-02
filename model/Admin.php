<?php 

require_once "Connection.php";

/**
 * 
 */
class Admin
{
	
	private $table="Admin";
	private $name;
	private $email;
	private $password;

	function __construct($name,$email,$password)
	{
		$this->name=$name;
		$this->email=$email;
		$this->password=$password;
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("Admin");
	}

}