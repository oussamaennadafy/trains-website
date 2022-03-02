<?php 

require_once __DIR__."/../model/Trip.php";
/**
 * 
 */
class TripController
{
	
	public function __construct()
	{
		
	}


	public function index()
	{

		session_start();
		if(isset($_SESSION['admin']))
		{
			$Trips=Trip::select();
			require_once __DIR__."/../view/Trip/index.php";
		}else 
		{
			header('Location: http://localhost/projetmvc/user/index');
		}

	}

	public function logout()
	{
		session_start();
		unset($_SESSION['admin']);
		header('Location: http://localhost/projetmvc/user/index');
	}


	public function create()
	{
		session_start();
		if(isset($_SESSION['admin']))
		{
			require_once __DIR__."/../view/Trip/create.php";
		}else 
		{
			header('Location: http://localhost/projetmvc/user/index');
		}
	}

	public function save()
	{
		$date=$_POST['dateTrip'];
		$departur=$_POST['departureStationTrip'];
		$arrival=$_POST['arrivalStationTrip'];
		$price=$_POST['priceTrip'];
		$Seats=$_POST['AvailableSeatsTrip'];
		$Trip=new Trip($date,$departur,$arrival,$price,$Seats);
		$Trip->save();
		header("Location: http://localhost/projetmvc/Trip/index");
	}

	public function edit($id)
	{
		session_start();
		if(isset($_SESSION['admin']))
		{
			$Trip=Trip::edit($id);
			require_once __DIR__."/../view/Trip/edit.php";
		}else 
		{
			header('Location: http://localhost/projetmvc/user/index');
		}
	}

	public function update($id)
	{
		$date=$_POST['dateTrip'];
		$departur=$_POST['departureStationTrip'];
		$arrival=$_POST['arrivalStationTrip'];
		$price=$_POST['priceTrip'];
		$Seats=$_POST['AvailableSeatsTrip'];
		$Trip=new Trip($date,$departur,$arrival,$price,$Seats);
		$Trip->update($id);
		header("Location: http://localhost/projetmvc/Trip/index");
	}
	public function delete($id)
	{
		$Trips=Trip::delete($id);
		header("Location: http://localhost/projetmvc/Trip/index");
	}


}