<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
  <style>
   .not-found {
    width: 300px;
    border-radius: 250px;
      }
  </style>
</head>
<body style='overflow-x:hidden;'>
  <!-- /////////////// header ///////////////////// -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-xxl">
      <a href="http://localhost/projetmvc/user/index" class="navbar-brand">weego</a>
      <a href="http://localhost/projetmvc/user/index" class="nav-link link-secondary">back to home</a>
      </div>
    </div>
  </nav>  
  <!-- //////////////////////////////////// -->
  <main style='min-height:calc(100vh - 112px); '>
  <?php if($tickets == false) { ?>
    <img class='img-fluid not-found d-block mx-auto mt-5' src='https://cdn.dribbble.com/users/2698098/screenshots/5957957/media/6a4be3f4baaafe31276133fa9de7c0f0.jpg' alt='not found'>
    <p class='mt-4 fs-2 text fw-bolder text-center'>You haven't book yet</p>
  <?php } else { ?>
  <h1 class='display-5 text-center py-5'>my trips</h1>
  <?php }?>

  <?php foreach($tickets as $ticket) { ?>
  <?php if($ticket['idUser'] == $_SESSION['userId']) {
    
    
    $dateTrip = str_replace("T"," ",$ticket['dateTrip']);
     $first_explode = explode(" ",$dateTrip);
     $seconde_explode = explode('-',$first_explode[0]);
     $third_explode = explode(':',$first_explode[1]);
     $yearTrip = $seconde_explode[0];
     $monthTrip = $seconde_explode[1];
     $dayTrip = $seconde_explode[2];
     $houreTrip = $third_explode[0];
     $minuteTrip = $third_explode[1];
    }
    if($houreTrip == 0)
    {
      $houreTripPlus = 23;
    } else {
      $houreTripPlus = $houreTrip -1;
    }
    $dateTripPlus = date("$yearTrip-$monthTrip-$dayTrip $houreTripPlus:$minuteTrip");
    
    $expiredBtn = false;
    
    ?>
  
  <table class='table rounded table-success mx-auto'>
    <tr class='d-flex justify-content-center' style='border:transparent;'>
      <td style='border-radius:5px 0 0 5px;' class='p-4'>date : <?php echo  $ticket["dateTrip"]?></td>
      <td class='p-4'>date : <?php echo intval($ticket["dateTrip"])?></td>
      <td class='p-4'>from : <?php echo $ticket["departureStationTrip"]?> </td>
      <td class='p-4'>to : <?php echo $ticket["arrivalStationTrip"]?></td>
      <td class='p-4'>price : <?php echo $ticket["priceTrip"]?> dh</td>
      <td class='p-4 d-flex gap-2'>comfort : <?php echo $ticket["myComfort"] ?></td>
            <?php if($dateTrip <= $dateNow) { ?>
              <td class='d-flex align-items-center justify-content-center px-4' style='border-radius:0 5px 5px 0;'><button style='pointer-events:none;' class='btn btn-secondary'>expired</button></td>
            <?php  } ?>

            <?php if($ticket["status"] == 'active' && $dateTripPlus <= $dateNow && $dateTrip > $dateNow) {  ?>
              <td class='d-flex align-items-center justify-content-center px-4' style='border-radius:0 5px 5px 0;'><button style='pointer-events:none;' class='btn btn-light'>Less than an hour</button></td>
            <?php }?>

            <?php if($ticket["status"] == 'active' && $dateTripPlus > $dateNow) { ?>
            <form action="http://localhost/projetmvc/user/myTrips" method='POST'>
              <td class='d-flex align-items-center justify-content-center px-4' style='border-radius:0 5px 5px 0;'><input class='btn btn-danger' type='submit' value='cancel' name='cancel'></td>
              <input type="hidden" name="idTicket" value = <?php echo  $ticket["id"] ?>  >
            </form>
            <?php } ?>

            <?php if($ticket["status"] == 'notActive' && $dateTrip > $dateNow) { ?>
              <td class='d-flex align-items-center justify-content-center px-4' style='border-radius:0 5px 5px 0;'><button style='pointer-events:none;' class='btn btn-warning'>canceled</button></td>
            <?php } ?>

          </tr>
        </table>  
        <?php }?>
  </main>
  <footer class='mt-5'>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024-2026, weego.com, Inc. or its affiliates
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

