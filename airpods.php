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
    <!-- hero -->
    <div class="airpods-hero mt-5">
        <img src="./images/access/airpods/hero.webp" alt="">
        <div class="content">
            <h2>Sing Along</h2>
            <h1>Inspired Design & Quality Sound With Beats</h1>
            <p>Love what you listen, listen to what you love. Music speaks when words dont. Make it clear. Let music reach your heart.</p>
            <a class="btn btn-orange w-25" href="#shop-airpods">Buy Now</a>

        </div>
    </div>
    <!-- about -->
    <h1 class="text-center my-5 title-airpods">Advantages</h1>
    <div class="about-airpods">
        <img class="about-pic" src="./images/access/airpods/about.jpg" alt="">
        <div class="about">
            <h2>Advanced Features</h2>
            <h1>Ultimate comfort and best sound</h1>
            <h5 ><i class="fa fa-bluetooth"></i>
                Bluetooth connectivity</h5>
            <h5><i class="fa fa-battery"></i>Long lasting battery</h5>
            <h5><i class="fa fa-tint"></i>Higher water & dust resistance</h5>
            <h5 ><i class="fa fa-microphone"></i>One Touch Control</h5>
            <h5><i class="fa fa-volume-up"></i>Active noise cancelling</h5>
        </div>
    </div>
    <!-- video -->
    <div class="headphone-video mt-5">
      <div class="video-container">
          <video class="video2 toggle3">
              <source  src="./images/access/airpods/videoplayback.mp4" type="video/mp4">
            </video>
      </div>
    </div>
    <!-- products -->
    <div id="shop-airpods" class="container airpods-products">
        <h1 class="text-center title-airpods">Products</h1>
        <div class="text-center my-3"><h5 class="color-primary"><?php echo $note['postDone'] ?></h5></div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php foreach ($resultAirpods as $resultAirpods1): ?>
                <?php $countAirpods= $resultAirpods1['productCount'] ?>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                  <div class="card">
                    <?php echo "<img class=size-img src=./images/products/".$resultAirpods1['productImage']. " >"?>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo $resultAirpods1['productName'] ?></h5>
                      <p>SKU: <?php echo $resultAirpods1['productNum'] ?></p>
                      <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                        foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultAirpods1['productName']){
                             $countAirpods= $resultAirpods1['productCount'] - $resultUserProducts1['quantity'];
                           }                       
                         }
                      }
                      ?>
                      <p>PRODUCTS: <?php echo $countAirpods ?></p>
                      <p class="card-text">$<?php echo $resultAirpods1['productPrice'] ?></p>
                      <form action="airpods.php#shop-airpods" method="post">
                        <input type="hidden" name="productName" value="<?php echo $resultAirpods1['productName'] ?>">
                        <input type="hidden" name="productNum" value="<?php echo $resultAirpods1['productNum'] ?>">
                        <input type="hidden" name="productPrice" value="<?php echo $resultAirpods1['productPrice'] ?>">
                        <input type="hidden" name="productCount" value="<?php echo $resultAirpods1['productCount'] ?>">
                        <input type="hidden" name="productImage" value="<?php echo $resultAirpods1['productImage'] ?>">
                        <input class="btn btn-orange <?=($countAirpods>=1)?'':'disabled'?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
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