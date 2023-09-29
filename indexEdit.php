<?php
include './inc/connection.php';
include './inc/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <!-- Mobiles Types -->
    <div class="container ">
          <h1 class="text-center my-5 title-airpods">Edit\Delete Products</h1>
      <nav class=" ">
        <div class="nav nav-tabs mx-auto w-75 d-flex justify-content-between " id="nav-tab">
            <button class="nav-link text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#Iphone" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Iphone</button>
            <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#Samsung" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Samsung</button>
            <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#Xiamoi" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Xiaomi</button>
        </div>
      </nav>
      <div class="tab-content bg-light " id="nav-tabContent">
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
                              <a href="./processEdit.php?id=<?php echo $resultIphone1['id'] ?>" class="btn btn-orange">EDIT</a>
                              <a href="./processDelete.php?id=<?php echo $resultIphone1['id'] ?>" class="btn btn-orange">DELETE</a>
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
                              <a href="./processEdit.php?id=<?php echo $resultSamsung1['id'] ?>" class="btn btn-orange">EDIT</a>
                              <a href="./processDelete.php?id=<?php echo $resultSamsung1['id'] ?>" class="btn btn-orange">DELETE</a>
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
                              <a href="./processEdit.php?id=<?php echo $resultXiaomi1['id'] ?>" class="btn btn-orange">EDIT</a>
                              <a href="./processDelete.php?id=<?php echo $resultXiaomi1['id'] ?>" class="btn btn-orange">DELETE</a>
                      </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
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