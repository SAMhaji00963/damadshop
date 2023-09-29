<?php 
include 'inc/connection.php';
include 'inc/db.php';
@$id = $_GET['id'];
@$total__Price=0;
//for user information
@$info= mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
@$infoUser= mysqli_fetch_assoc($info);
$userOrder=$infoUser['userName'];
//for user orders
$userProducts= mysqli_query($con, "SELECT * FROM productdetails WHERE userName='$userOrder'");
$fetchUserProducts= mysqli_fetch_all($userProducts, MYSQLI_ASSOC);

//DELETE ALL PRODUCT DETAILS
if(isset($_POST['removeProductDetails'])){
    mysqli_query($con, "DELETE FROM productdetails WHERE userName='$userOrder'");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php' ?>
<body>
  <!-- Navabar -->
  <?php include './inc/headerEdit.php' ?>

      <div class="personalPage">
          <h5 class="text-center my-3 color-primary"><?php echo $note['postDone'] ?></h5>
          <div class="pic mb-4">
              <?php echo "<img class=userImg src=./images/". $infoUser['image'] . " class=rounded-circle >"?>
              <h5 class="my-3">Welcome Back <?php echo $infoUser['userName'] ?></h5>
              <h4 class="mb-3"> <?php echo $infoUser['email'] ?></h4>
              <a class='btn btn-orange' href="index.php">Shopping Now</a>
              <h4 class="my-5 color-primary">Your Sales</h4>
              <table class="table text-center table-group-divider">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody class="my-auto">
                    
                    <?php foreach($fetchUserProducts as $fetchUserProducts1): ?>
                        <tr>
                            <td>
                                <?php echo "<img src=./images/products/".$fetchUserProducts1['productImage']. " width=100 height=100 >"?>
                            </td>
                            <td class="pt-5">
                                <h5><?php echo $fetchUserProducts1['productName'] ?></h5>
                            </td>
                            <td class="pt-5">
                                <h5><?php echo $fetchUserProducts1['productNum'] ?></h5>
                            </td>
                            <td class="pt-5">
                                <h5><?php echo $fetchUserProducts1['quantity']?></h5>
                            </td>
                            <td class="pt-5">
                                <h5><?php echo "$". $fetchUserProducts1['productPrice']?></h5>
                            </td>
                            <td class="pt-5">
                                <h5><?php echo "$". $fetchUserProducts1['productPrice']*$fetchUserProducts1['quantity']?></h5>
                            </td>
                            <?php @$total__Price+= $fetchUserProducts1['productPrice']*$fetchUserProducts1['quantity'] ?>
                        </tr>
                    <?php endforeach; ?>
                        <tr >
                            <td colspan="3">
                                <form action="" method="post">
                                    <input onclick="return confirm('You Want To Remove Products Details?') " class="btn btn-orange" value="DELETE PRODUCTS DETAILS" type="submit" name="removeProductDetails">
                                </form>

                            </td>
                            <td colspan="2">
                                <p>Total Price: <span class="color-primary"><?php echo $total__Price ?></span></p>
                            </td>
                        </tr>
                </tbody>
              </table>
              <h4 class="my-5 color-primary">Update Your Informtion</h4>
              <form class="mt-5" action="" method="post">
                  <!--User Name-->
                  <div class="input-group mb-2 mb-3 w-75 mx-auto">
                    <span class="input-group-text" id="inputGroup-sizing-default">Edit User Name</span>
                    <input type="text" class=" form-control" id="userName" name="userName" placeholder="<?php echo $errors['userName'] ?>" >
                  </div>
                  <!--Email-->
                  <div class="input-group mb-2 mb-3 w-75 mx-auto">
                    <span class="input-group-text" id="inputGroup-sizing-default">Edit Email</span>
                    <input type="text" class=" form-control" id="email" name="email" placeholder="<?php echo $errors['emailError'] ?>" >
                  </div>
                  <!--password-->
                  <div class="input-group mb-2 mb-3 w-75 mx-auto">
                    <span class="input-group-text" id="inputGroup-sizing-default">Edit Password</span>
                    <input type="password" class=" form-control" id="password" name="password" placeholder="<?php echo $errors['password'] ?>" >
                  </div>
                  <!--Image-->
                  <div><?php echo $errors['image'] ?></div>

                  <div class="input-group mb-2 mb-3 w-75 mx-auto">
                    <span class="input-group-text" id="inputGroup-sizing-default">Edit Image</span>
                    <input type="file" class=" form-control" id="image" name="image">
                  </div>
                  <input id="edit" class="btn btn-orange" type="submit" name="editInfoUser" value="Update Information">
                  <input id="signOut" class="btn btn-orange" type="submit" onclick="return confirm('You Want Sign Out?') " name="signOut" value="SignOut">
                  
              </form>
          </div>
      </div>
<?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>