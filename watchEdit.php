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
    <div class="container watches-products">
      <h1 class="text-center my-5 title-airpods">Edit/Delete Products</h1>
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
                              <a href="./processEdit.php?id=<?php echo $resultWatch1['id'] ?>" class="btn btn-orange">EDIT</a>
                              <a href="./processDelete.php?id=<?php echo $resultWatch1['id'] ?>" class="btn btn-orange">DELETE</a>
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