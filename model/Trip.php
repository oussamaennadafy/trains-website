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


	public function save()
	{
		$ctn = new Connection();
		$ctn->insert($this->table,["dateTrip","departureStationTrip","arrivalStationTrip","priceTrip","AvailableSeatsTrip"],[$this->dateTrip,$this->departureStationTrip,$this->arrivalStationTrip,$this->priceTrip,$this->AvailableSeatsTrip]);
		header("Location: http://localhost/projetmvc/Trip/index");
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("Trips");
	}

	public static function delete($id)
	{
		$ctn=new Connection();
		return $ctn->delete("Trips",$id);
	}


	public static function edit($id)
	{
		$ctn=new Connection();
		return $ctn->selectOne("Trips",$id);
	}

	public function update($id)
	{
		$ctn=new Connection();
		$ctn->update($this->table,["dateTrip","departureStationTrip","arrivalStationTrip","priceTrip","AvailableSeatsTrip"],[$this->dateTrip,$this->departureStationTrip,$this->arrivalStationTrip,$this->priceTrip,$this->AvailableSeatsTrip],$id);
	}

}