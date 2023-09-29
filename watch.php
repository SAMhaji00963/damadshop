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
    <div class="watch-hero">
      <div class="content mt-5">
        <h1>The future of tech is here</h1>
        <p>Holisticly incentivize revolutionary collaboration and idea sharing before cost effective users. Actual focused services before highly efficient human capital.</p>
        <a href="watch.php#video">Play <i class="fa fa-toggle-right"></i> Video</a>
      </div>
        <img src="./images/access/watch/mobilewatch.png" alt="">
    </div>
    <div class="about">
          <h1 class="text-center my-5 title-airpods container">About</h1>
      <div class="product-prop">
        <img src="./images/access/watch/productimage.png" alt="">
        <i id="click-me" class="fa fa-plus click-me"></i>
        <i id="click-me2" class="fa fa-plus click-me2"></i>
        <i id="click-me3" class="fa fa-plus click-me3"></i>
        <i id="click-me4" class="fa fa-plus click-me4"></i>
  
      </div>
      <p class="prop1">METALIC STRAP</p>
      <p class="prop2">BLUETOOTH 4.2</p>
      <p class="prop3">GPS TRACKER</p>
      <p class="prop4">WATER RESISTANT</p>
  
    </div>
    <!-- video -->
    <div id="video" class="headphone-video">
        <div class="video-container">
            <video class="video3 toggle4">
                <source  src="./images/access/watch/videoplayback.mp4" type="video/mp4">
              </video>
        </div>
    </div>
    <div class="advantages container">
      <h1 class="text-center my-5 title-airpods">Advantages</h1>
      <div class="row">
        <div class="col col-lg-4 col-md-4 col-sm-12">
          <h1> <span class="fa fa-key"></span> Fast and secure</h1>
          <h1> <span class="fa fa-volume-up"></span> Fast and secure</h1>
          <h1> <span class="fa fa-diamond"></span> 	
            Voice Assistant</h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <img class="img-fluid" src="./images/access/watch/mobilewatch.png" alt="">
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-12">
          <h1> <span class="fa fa-thumbs-up"></span> Stay in touch</h1>
          <h1> <span class="fa fa-user"></span> Designed for you</h1>
          <h1> <span class="fa fa-clock-o"></span>Precise timepiece</h1>
        </div>
      </div>
    </div>
    <!-- products -->
    <div id="shop_watch" class="container watches-products">
      <h1 class="text-center my-5 title-airpods">Products</h1>
      <div class="text-center my-3"><h5 class="color-primary"><?php echo $note['postDone'] ?></h5></div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($resultWatch as $resultWatch1): ?>
            <?php $countWatch= $resultWatch1['productCount'] ?>
              <div class="col col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                  <?php echo "<img class=size-img src=./images/products/".$resultWatch1['productImage']. " >"?>
                  <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $resultWatch1['productName'] ?></h5>
                    <p>SKU: <?php echo $resultWatch1['productNum'] ?></p>
                    <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                          foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultWatch1['productName']){
                              $countWatch= $resultWatch1['productCount'] - $resultUserProducts1['quantity'];
                          }                       
                          }
                      }
                    ?>
                    <p>PRODUCTS: <?php echo $countWatch ?></p>
                    <p class="card-text">$<?php echo $resultWatch1['productPrice'] ?></p>
                        <form action="watch.php#shop_watch" method="post">
                              <input type="hidden" name="productName" value="<?php echo $resultWatch1['productName'] ?>">
                              <input type="hidden" name="productNum" value="<?php echo $resultWatch1['productNum'] ?>">
                              <input type="hidden" name="productPrice" value="<?php echo $resultWatch1['productPrice'] ?>">
                              <input type="hidden" name="productCount" value="<?php echo $resultWatch1['productCount'] ?>">
                              <input type="hidden" name="productImage" value="<?php echo $resultWatch1['productImage'] ?>">
                              <input class="btn btn-orange <?= ($countWatch>=1)?'':'disabled' ?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
                        </form>
                  </div>
                </div>
              </div>
          <?php endforeach; ?>
    </div>
    </div>
    <!-- Footer -->
    <?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>
</html>