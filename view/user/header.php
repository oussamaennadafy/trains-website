<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-xxl">
      <a href="http://localhost/projetmvc/user" class="navbar-brand">weego</a>
      <?php
      if(isset($_SESSION['user'])) {
      ?>
      <div class='d-flex'>
        <!-- <p class='text-light my-auto mx-5'>hi, <?php echo $_SESSION['user']; ?></p> -->
        <!-- <<img style='width:40px; height:40px;' class='' src="../img/user.png" alt="profil"> -->
        <a href="#" class="nav-link link-secondary">my profil</a>
        <a href="#" class="nav-link link-secondary">my trips</a>
        <a href="http://localhost/projetmvc/user/logout" class="nav-link link-secondary">log out</a>
        </div>
      </div>


      <?php
      } else {
      ?>
      <div class='d-flex'>
        <a href="http://localhost/projetmvc/admin/adminLogin" class="nav-link link-secondary">admin</a>
        <a href="http://localhost/projetmvc/user/userLogin" class="nav-link link-secondary">user</a>
      </div>
      <?php
      }
      ?>
    </div>
  </nav>