<?php
if(isset($_POST['reserve']))
{
  $_SESSION["depart"] = $_POST['departureStationTrip'];
  $_SESSION["arrival"] = $_POST['arrivalStationTrip'];
  $_SESSION["date"] = $_POST['dateTrip'];
  $_SESSION["price"] = $_POST['priceTrip'];
}
if(isset($_POST['complete']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_SESSION["depart"]))
{
  // echo $_POST['name']."</br>";
  // echo $_POST['email']."</br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
  <style>
    .clicked {
      color : #fff;
      background-color: #198754;
    }
  </style>
</head>
<body>
  <!-- ///////include header/////// -->
      <?php include 'header.php'; ?>
  <!-- //////////////////////////////////// -->
  <section>
    <h1 class='text-center py-5'>your Trip</h1>
    <?php if( isset($_POST['reserve']) || isset($_POST['complete']) && isset($_SESSION["depart"])) { ?>
      <table class='table rounded table-success mx-auto w-75'>
        <tr style='border:transparent;'>
            <td style='border-radius:5px 0 0 5px;' class='p-4'> from : <?php echo  $_SESSION["depart"] ?></td>
            <td style='' class='p-4'> to : <?php echo $_SESSION["arrival"] ?> </td>
            <td style='' class='p-4'> date of trip : <?php echo $_SESSION["date"]  ?></td>
            <td style='border-radius:0 5px 5px 0;' class='p-4'> price of trip : <?php echo $_SESSION["price"] ?> dh</td>
          </tr>
        </table>
        <?php } else { ?>
          <a class='text-center d-block display-6 text-danger text-decoration-none' href="http://localhost/projetmvc/user">select a trip first</a>
          <?php } ?>
      </section>
      <section style="min-height: calc(100vh - 56px - 56px); class="mb-5">
      <form action='http://localhost/projetmvc/user/booking' method='POST'>
      <h4 class="my-5 text-center"><strong>Finish Trip</strong></h4>
      <div class="w-50 mx-auto">
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
								<label class="form-label">name <span class='text-danger'>*</span> </label>
		            <input type="text" name="name" class="form-control" value='<?php if(isset($_SESSION['user'])) {
                  echo $_SESSION['user'];
                } ?>'>
                <?php
                if(isset($_POST['complete']))
                {
                    if(empty($_POST['name']) && !empty($_SESSION["depart"]))
                    {
                      echo "<p class='text-danger pt-2'>name is required</p>";
                    }
                }
                ?>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label">email <span class='text-danger'>*</span> </label>
                <input type="text" name="email" class="form-control" value='<?php if(isset($_SESSION['email'])) {
                  echo $_SESSION['email'];
                } ?>'>
                <?php
                if(isset($_POST['complete']))
                {
                    if(empty($_POST['email']) && !empty($_SESSION["depart"]))
                    {
                      echo "<p class='text-danger pt-2'>email is required</p>";
                    }
                }
                ?>
              </div>
            </div>
          </div>
          <div class='mx-auto d-flex justify-content-center py-5'>
            <label style='border-radius:20px 0 0 20px' class='btn1 px-4 py-3 btn btn-outline-success' for="first-class">
            first-class
              <input style='visibility:hidden;position:absolute;' type="radio" name="myComfort" id="first-class" value='first-class'>
            </label>
            <label style='border-radius:0;border-left:0;border-right:0' class='clicked btn2 px-4 py-3 btn btn-outline-success' for="seconde-class">
            seconde-class
              <input style='visibility:hidden;position:absolute;' type="radio" name="myComfort" id="seconde-class" value='seconde-class' checked>
            </label>
            <label style='border-radius:0 20px 20px 0' class='btn3 px-4 py-3 btn btn-outline-success' for="singel-bed">
            singel-bed
              <input style='visibility:hidden;position:absolute;' type="radio" name="myComfort" id="singel-bed" value='singel-bed'>
            </label>
          </div>
          <!-- Submit button -->
          <input class="btn btn-success w-100 d-block mx-auto mb-5" type="submit" value="complete" name="complete">
      </div>
    </div>
  </form>
  </section>
  <footer>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024-2026, weego.com, Inc. or its affiliates
    </div>
  </footer>
  <script>
    let btn1 = document.querySelector('.btn1');
    let btn2 = document.querySelector('.btn2');
    let btn3 = document.querySelector('.btn3');

    btn1.addEventListener('click', function () {
      btn1.classList.add('clicked');
      btn2.classList.remove('clicked');
      btn3.classList.remove('clicked');
    });
    btn2.addEventListener('click', function () {
      btn1.classList.remove('clicked');
      btn2.classList.add('clicked');
      btn3.classList.remove('clicked');
    });
    btn3.addEventListener('click', function () {
      btn1.classList.remove('clicked');
      btn2.classList.remove('clicked');
      btn3.classList.add('clicked');
    });

  </script>
</body>
</html>

