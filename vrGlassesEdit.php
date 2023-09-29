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
    <!-- products -->
    <div class="container vr-products">
        <h1 class="text-center my-5 title-airpods">Edit/Delete Products</h1>
          <div class="tab-content bg-light mt-4" id="">
            <!--VR Glasses-->
            <div class="tab-pane fade show active" id="Iphone" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="row row-cols-1 row-cols-md-3 g-4">
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
                              <a href="./processEdit.php?id=<?php echo $resultVrglasses1['id'] ?>" class="btn btn-orange">EDIT</a>
                              <a href="./processDelete.php?id=<?php echo $resultVrglasses1['id'] ?>" class="btn btn-orange">DELETE</a>
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