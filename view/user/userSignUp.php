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

	  <section style="min-height: calc(100vh - 56px - 56px); class="mb-5">
      <h4 class="mt-5 pt-5 pb-3 text-center"><strong>User sign up</strong></h4>
      <div class="d-flex justify-content-center" style="width:100%">
        <div class="col-md-6">
          <form class='d-flex justify-content-center flex-column mx-auto w-50' action="http://localhost/projetmvc/User/userSignUp" method="POST">
            <div class="row mb-4">

              <div class="form-outline py-3">
								<label class="form-label pb-2">name<span class='text-danger'> *</span></label>
		            <input type="text" name="name" class="form-control">
              </div>
              <div class="form-outline py-3">
								<label class="form-label pb-2">email address<span class='text-danger'> *</span></label>
		            <input type="email" name="email" class="form-control">
              </div>
              <div class="form-outline py-3">
						   <label class="form-label pb-2">password<span class='text-danger'> *</span></label>
		           <input type="password" name="password" class="form-control">
              </div>
              <div class="form-outline py-3">
						   <label class="form-label pb-2">retype password<span class='text-danger'> *</span></label>
		           <input type="password" name="passwordRepeat" class="form-control">
              </div>
              <?php
              if($required == true)
              {
                echo"<p class='text-danger'>all inputs are required</p>";
              }
              if($pass == true)
              {
                echo"<p class='text-danger'>enter the same password</p>";
              }
              ?>
            </div>
              <!-- Submit button -->
              <button name='submit'  class="btn btn-primary btn-block mb-3 w-50 mx-auto">
                sign in
              </button>
           </form>

           
           <div class='d-flex justify-content-center mb-5'>
             <p class='px-2'>already have account?</p>
             <a class="link-secondary text-decoration-none" href="http://localhost/projetmvc/user/userLogin">Log in</a>
           </div>

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

