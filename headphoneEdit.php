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

    <!-- products -->
    <div class="container airpods-products">
        <h1 class="text-center title-airpods">Products</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($resultHeadphone as $resultHeadphone1): ?>
                <?php $countHeadphone= $resultHeadphone1['productCount'] ?>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                  <div class="card">
                    <?php echo "<img class=size-img src=./images/products/".$resultHeadphone1['productImage']. " >"?>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo $resultHeadphone1['productName'] ?></h5>
                      <p>SKU: <?php echo $resultHeadphone1['productNum'] ?></p>
                      <?php 
                      if(mysqli_num_rows($fetchUserproducts)>0){
                        foreach($resultUserProducts as $resultUserProducts1){
                          if($resultUserProducts1['productName']===$resultHeadphone1['productName']){
                             $countHeadphone= $resultHeadphone1['productCount'] - $resultUserProducts1['quantity'];
                           }                       
                         }
                      }
                      ?>
                      <p>PRODUCTS: <?php echo $countHeadphone ?></p>
                      <p class="card-text">$<?php echo $resultHeadphone1['productPrice'] ?></p>
                      <form action="headphone.php#shop_headphone" method="post">
                        <input type="hidden" name="productName" value="<?php echo $resultHeadphone1['productName'] ?>">
                        <input type="hidden" name="productNum" value="<?php echo $resultHeadphone1['productNum'] ?>">
                        <input type="hidden" name="productPrice" value="<?php echo $resultHeadphone1['productPrice'] ?>">
                        <input type="hidden" name="productCount" value="<?php echo $resultHeadphone1['productCount'] ?>">
                        <input type="hidden" name="productImage" value="<?php echo $resultHeadphone1['productImage'] ?>">
                        <a href="./processEdit.php?id=<?php echo $resultHeadphone1['id'] ?>" class="btn btn-orange">EDIT</a>
                        <a href="./processDelete.php?id=<?php echo $resultHeadphone1['id'] ?>" class="btn btn-orange">DELETE</a>
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