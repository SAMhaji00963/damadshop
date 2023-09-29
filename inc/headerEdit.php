 <?php
 $selectRows= mysqli_query($con, "SELECT * FROM cart");
 $countRows= mysqli_num_rows($selectRows);
 ?>
 <!-- NavBar -->
 <nav class="container-fluid mb-5 bg-white">
      <div class="logo">
          <a class="navbar-brand" href="./index.php">
              <img src="./images/logo.png" height="100px" alt="Logo" class="d-inline-block align-text-top">
          </a>
          <a class="navbar-brand text-dark logo-title" href="./index.php">
              <span>MobileTeck</span>                
          </a>
      </div>
      <div class="links">
          <ul  >
              <li><a href="./index.php">MOBILE</a></li>
              <li><a href="airpods.php">AIRPODS</a></li>    
              <li><a href="headphone.php">HEADPHONE</a></li> 
              <li><a href="./vrGlasses.php">VIRTUAL REALITY GLASSES</a></li>    
              <li><a href="./watch.php">WATCHES</a></li>
              <?php echo $note['loginInfo'] ?>
          </ul>
      </div>
      <span class="me-3"><a href="./cart.php">CART<?php echo ' ' . $countRows ?></a></span>

      <div id="btn-menu" class="fa fa-bars"></div>

</nav>