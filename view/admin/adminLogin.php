<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>create trip</title>
  </head>
  <body>
	
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-xxl">
      <a href="http://localhost/projetmvc/user/index" class="navbar-brand">weego</a>
      <a href="http://localhost/projetmvc/user/index" class="nav-link link-secondary">back to home</a>
      </div>
    </div>
  </nav>

	  <section style="min-height: calc(100vh - 56px - 56px);" class="mb-5">
      <h4 class="mt-5 pt-5 pb-3 text-center"><strong>Admin Log in</strong></h4>
      <div class="d-flex justify-content-center" style="width:100%">
        <div class="col-md-6">
          <form class='d-flex justify-content-center flex-column mx-auto w-50' action="http://localhost/projetmvc/Admin/adminLogin" method="POST">
            <div class="row mb-4">

              <div class="form-outline py-3">
								<label class="form-label pb-2">email address</label>
		            <input type="email" name="emailSearch" class="form-control">
              </div>
              <div class="form-outline py-3">
						   <label class="form-label pb-2">password</label>
		           <input type="password" name="passwordSearch" class="form-control">
              </div>

              <?php
            if($inccorect == true)
            {
              echo"<p class='text-danger'>email or password is incorrect</p>";
            }
            ?>

            </div>
              <!-- Submit button -->
              <button name='submit' type="log in" class="btn btn-primary btn-block mb-5 w-50 mx-auto">
                log in
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
