<?php 

require_once "Connection.php";

/**
 * 
 */
class Trip
{
	
	private $table="Trips";
	private $dateTrip;
	private $departureStationTrip;
	private $arrivalStationTrip;
	private $priceTrip;
	private $AvailableSeatsTrip;

	function __construct($dateTrip,$departureStationTrip,$arrivalStationTrip,$priceTrip,$AvailableSeatsTrip)
	{
		$this->dateTrip=$dateTrip;
		$this->departureStationTrip=$departureStationTrip;
		$this->arrivalStationTrip=$arrivalStationTrip;
		$this->priceTrip=$priceTrip;
		$this->AvailableSeatsTrip=$AvailableSeatsTrip;
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("Trips");
	}


	public static function updateAvailableSeats($newValue,$id)
	{
		$ctn=new Connection();
		return $ctn->updateAvailableSeats("Trips",$newValue,$id);
	}

	

}

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

class User
{
	
	private $table="Users";
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
		return $ctn->selectAll("users");
	}


	public static function insert()
	{
		$table = 'users';
		$columns = ['name','email','password'];
		$values = [$_POST['name'],$_POST['email'],$_POST['password']];

		$ctn = new Connection();
		return $ctn->insert($table,$columns,$values);
	}

}

class ticket
{
	
	private $table="tickets";
	private $dateTrip;
	private $departureStationTrip;
	private $arrivalStationTrip;
	private $priceTrip;

	function __construct($dateTrip,$departureStationTrip,$arrivalStationTrip,$priceTrip)
	{
		$this->dateTrip=$dateTrip;
		$this->departureStationTrip=$departureStationTrip;
		$this->arrivalStationTrip=$arrivalStationTrip;
		$this->priceTrip=$priceTrip;
	}

	
	public static function insert()
	{
		$table = 'tickets';
		$columns = ['dateTrip','departureStationTrip','arrivalStationTrip','priceTrip','myComfort','idUser'];
		$values = [$_SESSION["date"],$_SESSION["depart"],$_SESSION["arrival"],$_SESSION["price"],$_POST['myComfort'],$_SESSION['userId']];

		$ctn = new Connection();
		return $ctn->insert($table,$columns,$values);
	}


	public static function insertGuest()
	{
		$table = 'tickets';
		$columns = ['dateTrip','departureStationTrip','arrivalStationTrip','priceTrip','myComfort'];
		$values = [$_SESSION["date"],$_SESSION["depart"],$_SESSION["arrival"],$_SESSION["price"],$_POST['myComfort']];

		$ctn = new Connection();
		return $ctn->insert($table,$columns,$values);
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("tickets");
	}

	public static function cancel()
	{
		$ctn=new Connection();
		return $ctn->cancelTicket($_POST['idTicket']);
	}


}