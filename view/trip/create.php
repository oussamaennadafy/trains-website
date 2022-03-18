<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>create trip</title>
    <style>
      @media (max-width: 500px) {
        body {
        font-size:12px;
        }
        .btn {
          font-size: 12px;
          padding:4px 8px;
        }
        .navbar-brand {
          font-size:10px;
        }
        .form-outline {
          width:100%;
        }
        .form {
          display:flex;
          align-items:center;
          justify-content:center;
        }
        .special-Row {
          width:100%;
          display:flex;
          flex-direction:column;
          align-items:center;
          justify-content:center;
        }
        .col {
          padding:10px 0;
        }
      }
    </style>
  </head>
  <body>
    
	
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-xxl">
      <a href="http://localhost/projetmvc/Trip/index" class="navbar-brand">weego</a>
      <a href="http://localhost/projetmvc/trip/index" class="nav-link link-secondary">back to dashboard</a>
      </div>
    </div>
  </nav>

	<section style="min-height: calc(100vh - 56px - 56px); class="mb-5">
    <h4 class="my-5 text-center"><strong>Create Trip</strong></h4>
    <div class="d-flex justify-content-center" style="width:100%">
      <div class="col-md-6">
        <form class='form d-flex justify-content-center flex-column' action="http://localhost/projetmvc/Trip/create" method="POST">
          <div class="special-Row row mb-4">
            <div class="col">
              <div class="form-outline">
								<label class="form-label">departure Station of Trip</label>
		            <input type="text" name="departureStationTrip" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label">arrival Station of Trip</label>
                <input type="text" name="arrivalStationTrip" class="form-control">
              </div>
            </div>
          </div>

          <?php if(isset($_SESSION['emptyCity'])) { ?>
            <div><p class='text-danger text-center m-0'>type the destination first</p></div>
          <?php unset($_SESSION['emptyCity']); } ?>
          
              <!-- date input -->
              <div class="form-outline mb-4">
							<label class="form-label">date Trip</label>
							<input type="datetime-local" name="dateTrip" class="form-control">
              </div>

          <?php if(isset($_SESSION['invalidDate'])) { ?>
            <div><p class='text-danger text-center m-0'>invalid date</p></div>
          <?php unset($_SESSION['invalidDate']); } ?>

              <!-- price input -->
              <div class="form-outline mb-4">
								<label class="form-label">price of Trip</label>
		            <input class="form-control" type="number" name="priceTrip">
              </div>

          <?php if(isset($_SESSION['priceInvalid'])) { ?>
            <div><p class='text-danger text-center m-0'>invalid price</p></div>
          <?php unset($_SESSION['priceInvalid']); } ?>

              <!-- seats input -->
              <div class="form-outline mb-4">
								 <label class="form-label">Available Seats Trip</label>
		             <input class="form-control" type="number" name="AvailableSeatsTrip">
              </div>

          <?php if(isset($_SESSION['seatsInvalid'])) { ?>
            <div><p class='text-danger text-center m-0'>invalid seats number</p></div>
          <?php unset($_SESSION['seatsInvalid']); } ?>
							
              <!-- Submit button -->
              <button name='save' type="submit" class="btn btn-primary btn-block mb-5">
                save
              </button>
           </form>
					</div>
				</div>
</section>
	<footer>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2024-2026, weego.com, Inc. or its affiliates
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
