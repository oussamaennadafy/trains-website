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

	public function index()
	{
    session_start();
		if(isset($_SESSION['signUp']))
		{
			unset($_SESSION['signUp']);
		}
		$Trips=Trip::select();
		require_once __DIR__."/../view/user/index.php";
	}

	public function booking()
	{
    session_start();
		$Trips=Trip::select();
		require_once __DIR__."/../view/user/booking.php";
	}

	public function logout()
	{
		session_start();
		unset($_SESSION['user']);
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