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
			if(isset($_POST['save']))
			{
				if(!empty($_POST['departureStationTrip']) && !empty($_POST['arrivalStationTrip']))
				{
					if($_POST['priceTrip'] >= 0)
					{
						if($_POST['AvailableSeatsTrip'] >= 0)
						{
							$dateNow = date('Y-m-d H:i');
							$dateTrip = str_replace("T"," ",$_POST['dateTrip']);
							if($dateTrip >= $dateNow)
							{
								$date=$_POST['dateTrip'];
								$departur=$_POST['departureStationTrip'];
								$arrival=$_POST['arrivalStationTrip'];
								$price=$_POST['priceTrip'];
								$Seats=$_POST['AvailableSeatsTrip'];
								$Trip=new Trip($date,$departur,$arrival,$price,$Seats);
								$Trip->save();
								header("Location: http://localhost/projetmvc/Trip/create");
							} else {
								$_SESSION['invalidDate'] = true;
							}
						} else {
							$_SESSION['seatsInvalid'] = true;
						}
					} else {
						$_SESSION['priceInvalid'] = true;
					}
				} else {
					$_SESSION['emptyCity'] = true;
				}
			}
			require_once __DIR__."/../view/Trip/create.php";
		}else 
		{
			header('Location: http://localhost/projetmvc/user/index');
		}
	}

	public function save()
	{
		if(isset($_POST['save']))
		{
			$emptyCity = false;
			if(!empty($_POST['departureStationTrip']) && !empty($_POST['arrivalStationTrip']))
			{
				if($_POST['priceTrip'] >= 0)
				{
					if($_POST['AvailableSeatsTrip'] >= 0)
					{
						$dateNow = date('Y-m-d H:i');
						$dateTrip = str_replace("T"," ",$_POST['dateTrip']);
						if($dateTrip >= $dateNow)
						{
							$date=$_POST['dateTrip'];
							$departur=$_POST['departureStationTrip'];
							$arrival=$_POST['arrivalStationTrip'];
							$price=$_POST['priceTrip'];
							$Seats=$_POST['AvailableSeatsTrip'];
							$Trip=new Trip($date,$departur,$arrival,$price,$Seats);
							$Trip->save();
							header("Location: http://localhost/projetmvc/Trip/index");
						} else {
							echo'invalid Date';
							$invalidDate = true;
						}
					} else {
						echo'Invalid seats';
						$seatsInvalid = true;
					}
				} else {
					echo'Invalid price';
					$priceInvalid = true;
				}
			} else {
				echo'empty city';
				$emptyCity = true;
			}
		}
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