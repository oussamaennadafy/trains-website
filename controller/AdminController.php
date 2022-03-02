<?php

require_once __DIR__."/../model/Admin.php";


class AdminController
{
  public function adminLogin()
	{
		session_start();
    $Admin=Admin::select();
		//var_dump($Admin) ;
		$inccorect = false;

		if(isset($_POST['submit']))
		{
			if(!empty($_POST['emailSearch']) && !empty($_POST['passwordSearch']))
			{
				$emailSearch = $_POST['emailSearch'];
				$passwordSearch = $_POST['passwordSearch'];
				
				
				for ($i=0; $i < count($Admin) ; $i++) { 
					if($emailSearch == $Admin[$i]['email'] && $passwordSearch == $Admin[$i]['password'])
				{
					$_SESSION['admin'] = $Admin[$i]['name'];
					header("Location: http://localhost/projetmvc/Trip/index");
				} else
				{
					$inccorect = true;
				}
				}
				
				
			} else {
				$inccorect = true;
			}
		}
		require_once __DIR__."/../view/admin/adminLogin.php";
	}
  


  
}


?>