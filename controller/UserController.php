<?php 

require_once __DIR__."/../model/User.php";
/**
 * 
 */
class UserController
{
	
	public function __construct()
	{

	}

	public function myTrips()
	{
		session_start();
		$dateNow = date('Y-m-d H:i');

		
		if(isset($_SESSION['user']))
		{
			$tickets=ticket::select();
			if(isset($_POST['cancel']))
			{
				foreach($tickets as $ticket)
				{
					if($ticket['idUser'] == $_SESSION['userId']) 
					{
						$cancelTickets=ticket::cancel();
						$tickets=ticket::select();
					}
				}
				
			}
		}
		require_once __DIR__."/../view/user/myTrips.php";
	}


	public function index()
	{
    session_start();

		if(isset($_SESSION['signUp']))
		{
			unset($_SESSION['signUp']);
		}
	    unset($_SESSION["id"]);
	    unset($_SESSION["depart"]);
	    unset($_SESSION["arrival"]);
	    unset($_SESSION["date"]);
	    unset($_SESSION["price"]);
	    unset($_SESSION["AvailableSeats"]);
		$Trips=Trip::select();
		require_once __DIR__."/../view/user/index.php";
	}

	public function booking()
	{
    session_start();
		$Trips=Trip::select();

		if(isset($_POST['reserve']))
		{
			$_SESSION["id"] = $_POST['id'];
			$_SESSION["depart"] = $_POST['departureStationTrip'];
			$_SESSION["arrival"] = $_POST['arrivalStationTrip'];
			$_SESSION["date"] = $_POST['dateTrip'];
			$_SESSION["price"] = $_POST['priceTrip'];
			$_SESSION["AvailableSeats"] = $_POST['AvailableSeatsTrip'];
		}
		if(isset($_POST['complete']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_SESSION["depart"]))
		{
			if(isset($_SESSION['userId']))
			{
				$tickets=ticket::insert();
			} else {
				$tickets=ticket::insertGuest();
			}
			$_SESSION["AvailableSeats"] -= 1;
			echo $_SESSION["AvailableSeats"];
			echo $_SESSION["id"];
			$Trips=Trip::updateAvailableSeats($_SESSION["AvailableSeats"],$_SESSION["id"]);

			// exit();
			// echo $_POST['name']."</br>";
			// echo $_POST['email']."</br>";
			$_SESSION['completeReservation'] = true;
			header('Location: http://localhost/projetmvc/user');
		}


		require_once __DIR__."/../view/user/booking.php";
	}

	public function logout()
	{
		session_start();
		unset($_SESSION['user']);
		unset($_SESSION['email']);
		unset($_SESSION['userId']);
		header('Location: http://localhost/projetmvc/user/index');
	}

	public function userLogin()
	{
		session_start();
		$users=User::select();
		// var_dump($users) ;

		
		$inccorect = false;

		if(isset($_POST['submit']))
		{
			if(!empty($_POST['emailSearch']) && !empty($_POST['passwordSearch']))
			{
				$emailSearch = $_POST['emailSearch'];
				$passwordSearch = $_POST['passwordSearch'];

				foreach($users as $user)
				{
					if($emailSearch == $user['email'] && $passwordSearch == $user['password'])
					{
						$_SESSION['user'] = $user['name'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['userId'] = $user['id'];
						
						unset($_SESSION['signUp']);
						header("Location: http://localhost/projetmvc/user/index");
					} else
					{
						$inccorect = true;
					}
				}
				
			} else {
				$inccorect = true;
			}
		}


		require_once __DIR__."/../view/user/userLogin.php";
	}

	public function userSignUp()
	{
		session_start();
		if(isset($_SESSION['signUp']))
		{
			unset($_SESSION['signUp']);
		}
		$required = false;
		$pass = false;
		if(isset($_POST['submit']))
		{
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordRepeat']))
			{
				if($_POST['password'] == $_POST['passwordRepeat'])
				{
					$users=User::insert();
					$_SESSION['signUp'] = $_POST['name'];
					header("Location: http://localhost/projetmvc/user/userlogin");
				} else {
					$pass = true;
				}
			} else 
			{
				$required = true;
			}
		}
		require_once __DIR__."/../view/user/userSignUp.php";
	}

	public function create()
	{
		require_once __DIR__."/../view/Trip/create.php";
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
		$Trip=Trip::edit($id);
		require_once __DIR__."/../view/Trip/edit.php";
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