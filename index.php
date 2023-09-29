<?php
include './inc/connection.php';
include './inc/db.php';


?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/header.php' ?>

    <!-- SliderShow -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
          <div class="carousel-item active">
                <img src="./images/hero/iphone.webp" height="400px" class="d-block w-100" alt="iphone">
          </div>
          <div class="carousel-item">            
                <img src="./images/hero/redmi.png" height="400px" class="d-block w-100" alt="redmi">
          </div>
          <div class="carousel-item">
                <img src="./images/hero/samsung.jpg" height="400px" class="d-block w-100" alt="samsung">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Mobiles Types -->
    <div id="shop_mobile" class="container">
          <h1 class="text-center my-5 title-airpods ">Products</h1>

      <nav class="my-3 bg-white">
        <div class="nav nav-tabs mx-auto w-75 d-flex justify-content-between" id="nav-tab">
              <button class="nav-link text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#Iphone" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Iphone</button>
              <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#Samsung" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Samsung</button>
              <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#Xiamoi" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Xiaomi</button>
        </div>

      </nav>
      <div class="text-center my-3"><h5 class="color-primary"><?php echo $note['postDone'] ?></h5></div>
      <div class="tab-content mt-4" id="nav-tabContent">
        <!--Iphone-->
        <div class="tab-pane fade show active" id="Iphone" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($resultIphone as $resultIphone1):  ?>
                <?php $countIphone= $resultIphone1['productCount'] ?>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                  <div class="card">
                    <?php echo "<img class=size-img src=./images/mobiles/Iphone/".$resultIphone1['productImage']. " >"?>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo $resultIphone1['productName'] ?></h5>
                      <p>SKU: <?php echo $resultIphone1['productNum'] ?></p>      
                      <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                        foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultIphone1['productName']){
                             $countIphone= $resultIphone1['productCount'] - $resultUserProducts1['quantity'];
                           }                       
                         }
                      }
                      ?>
                        <p>PRODUCTS: <?php echo $countIphone; ?></p>
                      <p class="card-text">$<?php echo $resultIphone1['productPrice'] ?></p>
                      <form action="index.php#shop_mobile" method="post">
                              <input type="hidden" name="productName" value="<?php echo $resultIphone1['productName'] ?>">
                              <input type="hidden" name="productNum" value="<?php echo $resultIphone1['productNum'] ?>">
                              <input type="hidden" name="productPrice" value="<?php echo $resultIphone1['productPrice'] ?>">
                              <input type="hidden" name="productCount" value="<?php echo $resultIphone1['productCount'] ?>">
                              <input type="hidden" name="productImage" value="<?php echo $resultIphone1['productImage'] ?>">
                              <input class="btn btn-orange <?=($countIphone >= 1)? '':'disabled'; ?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
                      </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
        <!--Samsung-->
        <div class="tab-pane fade" id="Samsung" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($resultSamsung as $resultSamsung1): ?>
                <?php $countSamsung= $resultSamsung1['productCount'] ?>

                <div class="col col-lg-3 col-md-6 col-sm-12">
                  <div class="card">
                    <?php echo "<img class=size-img src=./images/mobiles/Samsung/".$resultSamsung1['productImage']. " >"?>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo $resultSamsung1['productName'] ?></h5>
                      <p>SKU: <?php echo $resultSamsung1['productNum'] ?></p>
                      <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                        foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultSamsung1['productName']){
                             $countSamsung= $resultSamsung1['productCount'] - $resultUserProducts1['quantity'];
                           }                       
                         }
                      }
                      ?>
                      <p>PRODUCTS: <?php echo $countSamsung;?></p>
                      <p class="card-text">$<?php echo $resultSamsung1['productPrice'] ?></p>
                      <form action="index.php#shop_mobile" method="post">
                              <input type="hidden" name="productName" value="<?php echo $resultSamsung1['productName'] ?>">
                              <input type="hidden" name="productNum" value="<?php echo $resultSamsung1['productNum'] ?>">
                              <input type="hidden" name="productPrice" value="<?php echo $resultSamsung1['productPrice'] ?>">
                              <input type="hidden" name="productCount" value="<?php echo $resultSamsung1['productCount'] ?>">
                              <input type="hidden" name="productImage" value="<?php echo $resultSamsung1['productImage'] ?>">
                              <input class="btn btn-orange <?=($countSamsung >= 1)? '':'disabled'; ?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
                      </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
        <!--Xiaomi-->
        <div class="tab-pane fade" id="Xiamoi" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($resultXiaomi as $resultXiaomi1): ?>
                <?php $countXiaomi= $resultXiaomi1['productCount'] ?>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                  <div class="card">
                    <?php echo "<img class=size-img src=./images/mobiles/Xiaomi/".$resultXiaomi1['productImage']. " >"?>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo $resultXiaomi1['productName'] ?></h5>
                      <p>SKU: <?php echo $resultXiaomi1['productNum'] ?></p>
                      <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                        foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultXiaomi1['productName']){
                             $countXiaomi= $resultXiaomi1['productCount'] - $resultUserProducts1['quantity'];
                           }                       
                         }
                      }
                      ?>
                      <p>PRODUCTS: <?php echo $countXiaomi ?></p>
                      <p class="card-text">$<?php echo $resultXiaomi1['productPrice'] ?></p>
                      <form action="index.php#shop_mobile" method="post">
                              <input type="hidden" name="productName" value="<?php echo $resultXiaomi1['productName'] ?>">
                              <input type="hidden" name="productNum" value="<?php echo $resultXiaomi1['productNum'] ?>">
                              <input type="hidden" name="productPrice" value="<?php echo $resultXiaomi1['productPrice'] ?>">
                              <input type="hidden" name="productCount" value="<?php echo $resultXiaomi1['productCount'] ?>">
                              <input type="hidden" name="productImage" value="<?php echo $resultXiaomi1['productImage'] ?>">
                              <input class="btn btn-orange <?=($countXiaomi >= 1)? '':'disabled'; ?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
                      </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
      </div>
    </div>
    <!--CONTACT US-->
    <div class="container mt-3" id="contactUs">
      <h1 class="text-center my-5 title-airpods">Contact Us</h1>
      <h5 class="text-center color-primary"><?php echo @$note['formDone'] ?></h5>
      <form action="index.php" method="post" class="row" >
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3 form-group">
            <i class="fa fa-user-o "></i>
            <input type="text" class="form-control  p-3" id="firstName" name="firstName" placeholder="First Name" required >
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3 form-group">
            <i class="fa fa-user-o "></i>
            <input type="text" class="form-control  p-3" id="lastName" name="lastName" placeholder="Last Name" required>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3 form-group">
          <i class="fa fa-envelope-open-o "></i>
          <input type="email" class="form-control  p-3" id="email" name="email" placeholder="Email" required>
          </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3 form-group">
          <i class="fa fa-phone "></i>
          <input type="text" class="form-control  p-3" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
        </div>
        <div class="form-group col-lg-12">
        <i class="fa fa-comment-o "></i>
        <textarea class="form-control" placeholder="Message" name="letter" required></textarea>
        </div>
        <input class="btn btn-orange confirm rounded-pill text mx-auto mt-4 w-25" value="Send" type="submit" name="formSubmit" id="formSubmit">
        
      </form>
      </div>
    <!-- Footer -->
    <?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/Script.js"></script>   
    
</body>
</html>