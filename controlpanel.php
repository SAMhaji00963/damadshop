<?php
include './inc/connection.php';
include './inc/db.php';

 if(isset($_POST['orders'])){
  header('location: orders.php');
 }
 if(isset($_POST['messages'])){
  header('location: messages.php');
 }
 if(isset($_POST['users'])){
  header('location: users.php');
 }

 $ordersCount=mysqli_num_rows($fetchOrders);
 $messagesCount=mysqli_num_rows($fetchMessages);
 $usersCount=mysqli_num_rows($fetchUsers);

?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
            <img src="./images/controlpanel.svg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 my-auto">
            <h2 class="text-center"></h2>
            <form class="mt-3 text-center" action="controlPanel.php" method="POST">
              <div class="text-center my-3 color-primary"><h5><?php echo $note['postDone'] ?></h5></div>
                <!-- For Edit Products -->
                <div class="editType">
                  <input type="checkbox" class="btn-check mx-auto" id="editProducts" autocomplete="off" name="editProducts">
                  <label class="btn btn-outline-secondary mx-auto" for="editProducts">Edit Products</label>
                
                </div>
                <!--Product Type-->
                <div class="text-center my-3"><h5><?php echo $errors['productType'] ?></h5></div>
                <div class="input-group my-3 w-75 mx-auto">
                    <input type="checkbox" class="btn-check mx-auto" id="airpods" autocomplete="off" name="airpodsPost">
                    <label class="btn btn-outline-secondary mx-auto" for="airpods">Airpods</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="headPhone" autocomplete="off" name="headphonePost">
                    <label class="btn btn-outline-secondary mx-auto" for="headPhone">HeadPhone</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="mobile" autocomplete="off" name="mobilePost">
                    <label class="btn btn-outline-secondary mx-auto" for="mobile">Mobile</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="vrGlasses" autocomplete="off" name="vrglassesPost">
                    <label class="btn btn-outline-secondary mx-auto" for="vrGlasses">VR Glasses</label>
                    <div class="mx-1"></div>
                    <input type="checkbox" class="btn-check mx-auto" id="watch" autocomplete="off" name="watchPost">
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
                  <input class="mx-2 btn btn-orange <?php echo $note['disabled'] ?>" type="submit" id="postProduct" name="postProduct" value="Confirm">
                  <input class="mx-2 btn btn-orange <?=($ordersCount>0)?'':'disabled' ?>" type="submit" id="orders" name="orders" value="Orders <?php echo $ordersCount?>">
                  <input class="mx-2 btn btn-orange <?=($messagesCount>0)?'':'disabled' ?> " type="submit" id="messages" name="messages" value="Messages <?php echo $messagesCount ?>">
                  <input class="mx-2 btn btn-orange  " type="submit" id="users" name="users" value="users <?php echo $usersCount ?>">
                  <input class="mx-2 btn btn-orange " type="submit" id="refreshControl" name="refreshControl" value="Refresh">
                </div>
                <div class=" my-4 text-center">
                  
                </div>
                
            </form>
            <!-- For Edit Informaion -->
            <form action="" method="post">
              <div class="my-3 text-center">
                    <h5 class="color-primary">Update Information</h5>
                      <div class="input-group mb-3 w-75 mx-auto">
                        <span class="input-group-text">Edit UserName</span>
                        <input type="text" class="form-control"name="editUserName" id="editUserName" placeholder="<?php echo  $errors['userName']?>">
                      </div>
                      <div class="input-group mb-3 w-75 mx-auto">
                        <span class="input-group-text">Edit Email</span>
                        <input type="text" class="form-control"name="editEmail" id="editUserName" placeholder="<?php echo  $errors['emailError']?>">
                      </div>
                      <div class="input-group mb-3 w-75 mx-auto">
                        <span class="input-group-text">Edit Password</span>
                        <input type="password" class="form-control"name="editPassword" id="editPassword" placeholder="<?php echo  $errors['password']?>">
                      </div>
                      <div class="my-2 text-cente">
                        <input class="mx-2 btn btn-orange" type="submit" id="editInfoManager" name="editInfoManager" value="Edit Info">
                        <input class="mx-2 btn btn-orange " type="submit" id="signOut" onclick="return confirm('You Want Sign Out?') " name="signOut" value="SignOut">
                      </div>
                  </div>
              </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/Script.js"></script>
    
</body>
</html>