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
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="./images/sign.svg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 my-auto">
            <h2 class="text-center"></h2>
            <form class="mt-3 text-center" action="" method="POST">
              <div class="text-center my-3"><h5><?php echo $note['postDone'] ?></h5></div>
                <!--Product Type-->
                <div class="text-center my-3"><h5><?php echo $errors['productType'] ?></h5></div>
                <div class="input-group my-3 w-75 mx-auto">
                    <input type="checkbox" class="btn-check mx-auto" id="airpods" autocomplete="off" name="airpodsEdit">
                    <label class="btn btn-outline-secondary mx-auto" for="airpods">Airpods</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="headPhone" autocomplete="off" name="headphoneEdit">
                    <label class="btn btn-outline-secondary mx-auto" for="headPhone">HeadPhone</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="mobile" autocomplete="off" name="mobileEdit">
                    <label class="btn btn-outline-secondary mx-auto" for="mobile">Mobile</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="vrGlasses" autocomplete="off" name="vrGlassesEdit">
                    <label class="btn btn-outline-secondary mx-auto" for="vrGlasses">VR Glasses</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="watch" autocomplete="off" name="watchEdit">
                    <label class="btn btn-outline-secondary mx-auto" for="watch">Watch</label>
                    
                </div>
                <!--Product Name-->
                <div class="input-group mb-2 mb-3 w-75 mx-auto">
                  <span class="input-group-text" id="inputGroup-sizing-default">Product Name</span>
                  <input type="text" class=" form-control" id="productName" name="productName" placeholder="<?php echo $errors['productName'] ?>" >
                </div>
                <!--Product Number-->
                <div class="input-group mb-3  w-75 mx-auto">
                  <span class="input-group-text" id="inputGroup-sizing-default">Product Number</span>
                  <input type="text" class=" form-control" id="productNumber" name="productNumber" placeholder="<?php echo $errors['productNumber'] ?>">
                </div>
                <div class="text-center my-2"></div>
                <!--Product Price-->
                <div class="input-group mb-3  w-75 mx-auto">
                  <span class="input-group-text" id="inputGroup-sizing-default">Product Price</span>
                  <input type="text" class=" form-control" id="productPrice" name="productPrice" placeholder="<?php echo $errors['productPrice'] ?>">
                </div>
                <!--Product Count-->
                <div class="input-group mb-3  w-75 mx-auto">
                  <span class="input-group-text" id="inputGroup-sizing-default">Product Count</span>
                  <input type="text" class=" form-control" id="productCount" name="productCount" placeholder="<?php echo $errors['productCount'] ?>">
                </div>
                <div class="text-center my-2"></div>
                <!--Product Image-->
                <div class="text-cent"><?php echo @$errors['productImage'] ?></div>
                <div class="input-group mb-3 w-75 mx-auto">
                  <span class="input-group-text">Image</span>
                <input type="file" class="form-control"name="productImage" id="productImage" >
                </div>
                <div class="text-center my-2">
                </div>
                <!--Mobile Type-->
                <div class="text-center my-3"><h5><?php echo $errors['mobileType'] ?></h5></div>
                <div class="input-group my-3 w-75 mx-auto mobile mobile1">
                    <input type="checkbox" class="btn-check mx-auto" id="btn-check-outlined1" autocomplete="off" name="iphone">
                    <label class="btn btn-outline-secondary mx-auto" for="btn-check-outlined1">Iphone</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="btn-check-outlined2" autocomplete="off" name="samsung">
                    <label class="btn btn-outline-secondary mx-auto" for="btn-check-outlined2">Samsung</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="btn-check-outlined3" autocomplete="off" name="xiaomi">
                    <label class="btn btn-outline-secondary mx-auto" for="btn-check-outlined3">Xiaomi</label>
                    
                    
                </div>
                <!--Submit-->
                <div class=" my-4 text-center">
                  <input class="mx-2 btn btn-orange <?php echo $note['disabled'] ?>" type="submit" id="postEdit" name="postEdit" value="Edit">
                  <input class="mx-2 btn btn-orange" type="submit" id="refresh" name="refresh" value="Refresh">
                </div>
            </form>
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