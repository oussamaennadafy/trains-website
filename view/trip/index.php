<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      @media (max-width: 1200px) {
        body {
          font-size: 14px;
        }
        .btn {
          font-size: 14px;
          padding:5px 10px;
        }
      }
      @media (max-width: 990px) {
        body {
          font-size: 10px;
        }
        .btn {
          font-size: 10px;
          padding:4px 8px;
        }
      }
      @media (max-width: 600px) {
        body {
        font-size:8px;
        }
        .btn {
          font-size: 8px;
          padding:3px 6px;
        }
        .navbar-brand {
          font-size:14px;
        }
      }
      @media (max-width: 500px) {
        body {
        font-size:6px;
        }
        .btn {
          font-size: 6px;
          padding:2px 4px;
        }
        .navbar-brand {
          font-size:10px;
        }
      }
      @media (max-width: 400px) {
        body {
        font-size:5px;
        }
        .btn {
          font-size: 5px;
          padding:1.5px 3px;
        }
        .navbar-brand {
          font-size:8px;
        }
      }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-xxl">
      <a href="http://localhost/projetmvc/Trip" class="navbar-brand">weego</a>
      <div class='d-flex'>
        <a href="http://localhost/projetmvc/trip/logout" class="nav-link link-secondary">log out</a>
      </div>
      </div>
    </div>
  </nav>
  <section style="min-height: calc(100vh - 56px - 56px);" class="py-5 text-center">
    <div class="container">
      <table class="table table-striped rounded table-dark">
        <?php if($Trips != false ) { ?>
	<tr class='py-4'>
    <th id="pokos">id of trip</th>
    <th>departure station of trip</th>
    <th>arrival station of trip</th>
    <th>date of trip</th>
    <th>price of trip</th>
    <th>available Seats of trip</th>
    <th>Action</th>
    <th>Action</th>
  </tr>
  <?php }else { ?>
    <img class="img-fluid" style='width:300px;border-radius:250px' src="https://cdn.dribbble.com/users/2698098/screenshots/5957957/media/6a4be3f4baaafe31276133fa9de7c0f0.jpg" alt="not found">
    <p class="mt-4 fs-2 text fw-bolder">no result found</p>
    <?php } ?>
  <?php  
  foreach ($Trips as $Trip) 
  {
  	echo "<tr><td>".$Trip['id']."</td><td>".$Trip['departureStationTrip']."</td><td>".$Trip['arrivalStationTrip']. "</td><td>
    ".$Trip['dateTrip']."</td><td>".$Trip['priceTrip']."dh"."</td><td>".$Trip['AvailableSeatsTrip']."</td>
    <td><button class='btn btn-danger'> <a style='width:100%;hight:100%' class='text-decoration-none link-light' href='http://localhost/projetmvc/Trip/delete/".$Trip['id']."'>delete</a></button> </td>
    <td> <button class='btn btn-secondary'> <a class='text-decoration-none link-light' href='http://localhost/projetmvc/Trip/edit/".$Trip['id']."'>edit</a></button></td>
  		</tr>";
  }
  ?>
</table>
<button class=" btn btn-primary">
  <a class="d-flex gap-1 align-items-center text-decoration-none link-light" href='http://localhost/projetmvc/Trip/create'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> add new trip</a>
</button>
    </div>
  </section>
  <footer>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023-2026, weego.com, Inc. or its affiliates
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
