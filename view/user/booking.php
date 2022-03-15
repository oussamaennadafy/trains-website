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
    .clicked2 {
      color: #000;
      background-color: #d1e7dd;
    }
    .parent-div {
      /* width: 150px; */
      height: 50px;
      border-radius: 6.7px;
      background-color: #fff;
      border: #bfbfbf solid 1px;
      display: flex;
      margin: 0 auto;
      margin-bottom: 30px;
      overflow: hidden;
    }
    .labelOne, .labelTwo {
      width: 50%;
      height:100%;
      font-size: 18px;
      transition: 200ms all;
      color:#000;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor:pointer;
    }
    .labelOne {
      pointer-events : none;
    }
    .input {
      visibility:hidden;
      position:absolute;
    }

    /* .labelTwo {
      color: #000;
    } */
  </style>
</head>
<body>
  <!-- ///////include header/////// -->
      <?php include 'header.php'; ?>
  <!-- //////////////////////////////////// -->
  <section>
    <h1 class='text-center py-5'>your Trip</h1>
    <!-- ////////////////////// -->
    <div class='parent-div w-25'>
      <label class='labelOne clicked2' for="round_trip">round trip</label>
      <label class='labelTwo' for="One_way_trip">One way trip</label>
      <input checked class='input inputOne' type="radio" name="way" id="round_trip" value="round_trip">
      <input class='input inputTwo' type="radio" name="way" id="One_way_trip" value="One_way_trip">
    </div>
    <!-- ////////////////////// -->
    <?php if( isset($_POST['reserve']) || isset($_POST['complete']) && isset($_SESSION["depart"])) { ?>
      <table class='table rounded table-success mx-auto w-75'>
        <tr style='border:transparent;'>
            <td style='border-radius:5px 0 0 5px;' class='p-4'> from : <?php echo  $_SESSION["depart"] ?></td>
            <td class='p-4'> to : <?php echo $_SESSION["arrival"] ?> </td>
            <td class='p-4'> date of trip : <?php echo $_SESSION["date"]  ?></td>
            <td class='p-4'> Available Seats : <?php echo $_SESSION["AvailableSeats"]  ?></td>
            <td style='border-radius:0 5px 5px 0;' class='p-4 d-flex gap-2'> price of trip : <p class='price my-0'><?php echo $_SESSION["price"] ?></p> dh</td>
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
              <input class='input' type="radio" name="myComfort" id="first-class" value='first-class'>
            </label>
            <label style='border-radius:0;border-left:0;border-right:0' class='clicked btn2 px-4 py-3 btn btn-outline-success' for="seconde-class">
            seconde-class
              <input class='input' type="radio" name="myComfort" id="seconde-class" value='seconde-class' checked>
            </label>
            <label style='border-radius:0 20px 20px 0' class='btn3 px-4 py-3 btn btn-outline-success' for="singel-bed">
            singel-bed
              <input class='input' type="radio" name="myComfort" id="singel-bed" value='singel-bed'>
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
    let btn4 = document.querySelector('.labelOne');
    let btn5 = document.querySelector('.labelTwo');
    let inputOne = document.querySelector('.inputOne');
    let inputTwo = document.querySelector('.inputTwo');
    let price = document.querySelector('.price');

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



    btn4.addEventListener('click', function () {
      btn4.classList.add('clicked2');
      btn5.classList.remove('clicked2');
      price.innerHTML *= 0.5;
            

      btn4.style.pointerEvents = "none";
      btn5.style.pointerEvents = "auto";
    });



    btn5.addEventListener('click', function () {
      btn4.classList.remove('clicked2');
      btn5.classList.add('clicked2');
      price.innerHTML *= 2;


      btn4.style.pointerEvents = "auto";
      btn5.style.pointerEvents = "none";
    });


  </script>
</body>
</html>

