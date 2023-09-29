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
    <div class="vr-hero mt-5" >
        <div class="col">
            <div class="box">
                <img src="./images/access/vrglasses/about2.png" alt="">
            </div>
        </div>
        <div class="col">
            <div class="content">
                <h5>VIRTUAL REALITY</h5>
                <h1>Where Reality Ends and Imagination Begins</h1>
                <p>Welcome to a World You’ve Never Seen Before.</p>
                <a class="get" href="./vrGlasses.php#shop_vrGlasses">Get Started</a>
                <a class="learn" href="./vrGlasses.php#learnMore">Learn More</a>
                <!-- cout-up -->
                <div class="count-up2 row">
                    <div class="num1 col-lg-3 col-md-3 col-sm-12" >
                        <i class="fa fa-group"></i>
                        <h1 class="num" data-value="360">000</h1>
                        <p>Users Worldwide</p>
                    </div>
                    <div class=" num1 col-lg-3 col-md-3 col-sm-12" >
                        <i class="fa fa-street-view"></i>
                        <h1 class="num" data-value="550">000</h1>
                        <p>Popular Features</p>
                    </div>
                    <div class="num1 col-lg-3 col-md-3 col-sm-12" >
                        <i class=
                        "fa fa-smile-o"></i>
                        <h1 class="num" data-value="900">000</h1>
                        <p>Happy Coustomers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <div id="learnMore" class="about container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img class="img-fluid rounded" src="./images/access/vrglasses/about.jpg" alt="" >
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                <h5>ABOUT US</h5>
                <p>Etiam porta faucibus commodo. Duis nec tellus fermentum, congue lorem ut, pellentesque leo. Cras turpis massa, gravida at ullamcorper vitae, iaculis eu ante. Etiam eget tortor ligula.</p>
                <h4><i class="fa fa-check-square-o"></i> Always put your satisfaction first</h4>
                <h4><i class="fa fa-check-square-o"></i> The latest and greatest technology</h4>
                <h4><i class="fa fa-check-square-o"></i> Affordable and guaranteed prices</h4>
            </div>
        </div>
    </div>

    <!-- video -->
    <div class="vr-video">
        <video class="video1 toggle2">
            <source src="./images/access/vrglasses/video.mp4" type="video/mp4">
        </video>
    </div>
    <!-- products -->
    <div id="shop_vrGlasses" class="container vr-products">
        <h1 class="text-center my-5 title-airpods">Products</h1>
        <div class="text-center my-3"><h5 class="color-primary"><?php echo $note['postDone'] ?></h5></div>
          <div class="tab-content bg-white mt-4" >
            <!--VR Glasses-->
                <div  class="row row-cols-1 row-cols-md-3 g-4">
                  <?php foreach ($resultVrglasses as $resultVrglasses1): ?>
                    <?php $countGlasses= $resultVrglasses1['productCount'] ?>
                    <div class="col col-lg-3 col-md-6 col-sm-12">
                      <div class="card">
                        <?php echo "<img class=size-img src=./images/products/".$resultVrglasses1['productImage']. " >"?>
                        <div class="card-body text-center">
                          <h5 class="card-title"><?php echo $resultVrglasses1['productName'] ?></h5>
                          <p>SKU: <?php echo $resultVrglasses1['productNum'] ?></p>
                          <?php 
                            if(mysqli_num_rows($fetchUserproducts)>0){
                                foreach($resultUserProducts as $resultUserProducts1){
                                if($resultUserProducts1['productName']===$resultVrglasses1['productName']){
                                    $countGlasses= $resultVrglasses1['productCount'] - $resultUserProducts1['quantity'];
                                }                       
                                }
                            }
                            ?>
                          <p>PRODUCTS: <?php echo $countGlasses  ?></p>
                          <p class="card-text">$<?php echo $resultVrglasses1['productPrice'] ?></p>
                          <form action="vrGlasses.php#shop_vrGlasses" method="post">
                              <input type="hidden" name="productName" value="<?php echo $resultVrglasses1['productName'] ?>">
                              <input type="hidden" name="productNum" value="<?php echo $resultVrglasses1['productNum'] ?>">
                              <input type="hidden" name="productPrice" value="<?php echo $resultVrglasses1['productPrice'] ?>">
                              <input type="hidden" name="productCount" value="<?php echo $resultVrglasses1['productCount'] ?>">
                              <input type="hidden" name="productImage" value="<?php echo $resultVrglasses1['productImage'] ?>">
                              <input class="btn btn-orange <?=($countGlasses>=1)?'':'disabled'?>" type="submit" name="addToCart" name="addToCart" value="Add To Cart">
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
          </div>
    </div>
    <!-- Footer -->
    <?php include './inc/footer.php' ?>
  
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="/js/aos.js"></script>
    <script>
      AOS.init({
        offset: 400,
        duration: 1000
      });
    </script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    
    <script src="./js/script.js"></script>
    
</body>
</html>