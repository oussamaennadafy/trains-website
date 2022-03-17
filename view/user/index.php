<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
      html {
      scroll-behavior: smooth;
      }   
      .clip-path {
        clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
      }
      .hero {
        height: calc(100vh - 56px);
        background-image:  linear-gradient(
          to right bottom,
          rgba(68, 160, 141, 0.3),
          rgba(9, 54, 55, 0.5)
          ), url(https://images.unsplash.com/photo-1515165562839-978bbcf18277?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80);
        background-size: cover;
      }
      .not-found {
        width: 300px;
        border-radius: 250px;
      }
      .footer {
        background-color: rgba(0, 0, 0, 0.2);
      }
    </style>
  </head>
  <body style='overflow-x:hidden;'>
    <!-- ///////include header/////// -->
  <?php include 'header.php'; ?>
  <!-- //////////////////////////////////// -->
  <?php if(isset($_SESSION['completeReservation'])){ ?>
        <div style='background-image: linear-gradient(to right bottom, #7ed56f, #28b485);border-radius:4px;left: 50%;
    transform: translate(-50%, 0);
    z-index: 1;transition: All 300ms;' class='Successful-reserved position-absolute mx-auto mt-5 w-50 p-4'>
          <div>
            <div class='mx-3 d-flex mx-auto justify-content-center my-2'>
            <h2 class='text-light px-4'>Successful reserved</h2>
              <svg style='width:40px;height:40px;' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-check-lg" viewBox="0 0 16 16">
                <path class='text-light w-100 h-100' d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
               </svg>
              </div>
          </div>
        </div>
      <?php } ?>
  <!-- //////////////////////////////////// -->
  <section class="w-100 hero d-flex justify-content-between align-items-center">
   <form class='w-50 p-5 text-light d-flex justify-content-center flex-column' action='http://localhost/projetmvc/user/index' method='POST'>
          <div class="row mb-5">
            <div class="col">
              <div class="form-outline">
								<label class="form-label">departure Station of Trip</label>
		            <input type="text" name="departureStationTripSearch" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
						   <label class="form-label">arrival Station of Trip</label>
		           <input type="text" name="arrivalStationTripSearch" class="form-control">
              </div>
            </div>
            <?php
            if(isset($_POST['submit']))
            {
            if(empty($_POST['departureStationTripSearch']) || empty($_POST['arrivalStationTripSearch']))
            {
              echo"<p class='pt-3 mb-0 text-danger'>type the destination first</p>";
            }
          }
            ?>
           </div>
              <!-- Submit button -->
              <button id='pokos' type='submit' name='submit' class="btn btn-primary btn-block mb-5">
                Search
                </button>
           </form> 
           <div class='d-flex justify-content-center p-5 align-items-center w-50 h-100 bg-light clip-path opacity-50'>
            <h1 class='display-1 px-5 mx-5'>DISCOVER YOUR NEXT TRIP</h1>
           </div>
  </section>
  <section class="body-bg py-5 search text-center">
    <div class="container">
<table class="table table-striped rounded table-dark">
<?php

$Found = false;
$dateNow = date('Y-m-d H:i');


if(isset($_POST['submit']))
{
  if(!empty($_POST['departureStationTripSearch']) && !empty($_POST['arrivalStationTripSearch']))
  {
    $departureSearch = $_POST['departureStationTripSearch'];
    $arrivalSearch = $_POST['arrivalStationTripSearch'];
    
    foreach($Trips as $Trip)
    {
      if($departureSearch == $Trip['departureStationTrip'] && $arrivalSearch == $Trip['arrivalStationTrip'] && $Trip['AvailableSeatsTrip'] > 0)
      {
        $dateTrip = str_replace("T"," ",$Trip['dateTrip']);
        if($dateTrip >= $dateNow)
        {
          $Found = true;
        }
      }
    }
    
    
    
    if($Found == true)
    {
      echo "<h2 class='display-5 pb-5'>available trips</h2>";
    }
    
    foreach($Trips as $Trip)
    {
      if($departureSearch == $Trip['departureStationTrip'] && $arrivalSearch == $Trip['arrivalStationTrip'] && $Trip['AvailableSeatsTrip'] > 0)
      {
          $dateTrip = str_replace("T"," ",$Trip['dateTrip']);
          if($dateTrip >= $dateNow)
          {
            echo "
            <form action='http://localhost/projetmvc/user/booking' method='POST'>
              <input type='hidden' name='id' value=".$Trip['id'].">
              <input type='hidden' name='departureStationTrip' value=".$Trip['departureStationTrip'].">
              <input type='hidden' name='arrivalStationTrip' value=".$Trip['arrivalStationTrip'].">
              <input type='hidden' name='dateTrip' value=".$Trip['dateTrip'].">
              <input type='hidden' name='priceTrip' value=".$Trip['priceTrip'].">
              <input type='hidden' name='AvailableSeatsTrip' value=".$Trip['AvailableSeatsTrip'].">
              <tr>
                <td> from : ".$Trip['departureStationTrip']."</td>
                <td> to : ".$Trip['arrivalStationTrip']. "</td>
                <td> date of trip : ".$Trip['dateTrip']."</td>
                <td> price of trip : ".$Trip['priceTrip']."dh"."</td>
                <td> available seats : ".$Trip['AvailableSeatsTrip']."</td>
                <td><input class='btn btn-success' type='submit' value='reserve' name='reserve'></td>
              </tr>
            </form>
            ";
          }
        }
      }
      if($Found == false)
      {
        echo " <img class='img-fluid not-found' src='https://cdn.dribbble.com/users/2698098/screenshots/5957957/media/6a4be3f4baaafe31276133fa9de7c0f0.jpg' alt='not found'>
        <p class='mt-4 fs-2 text fw-bolder'>no result found</p> ";
      }
    }
}
?>

</table>
    </div>
  </section>
  <footer>
    <div id="footer" class="text-center p-3 footer">
    © 2023-2026, weego.com, Inc. or its affiliates
    </div>
  </footer>
  <script>
    const myTimeout = setTimeout(moveAndDisappear, 900);

    function moveAndDisappear() {
      document.querySelector(".Successful-reserved").style.opacity = '0';
      document.querySelector(".Successful-reserved").style.transform = "translate(5%,0)";
    }
  </script>
</body>
</html>
<?php
if(isset($_SESSION['completeReservation']))
{
  unset($_SESSION['completeReservation']);
}
?>