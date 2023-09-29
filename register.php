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
    <div class="col-lg-6 col-md-6 col-sm-12 text-center my-auto">
            <img src="./images/signup.svg" alt="" class="img-fluid w-75">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 my-auto">
            <form class="mt-3" action="register.php" method="POST">
                <div class="text-center my-3 mb-2  color-primary"><h5><?php echo $note['regComplete'] ?></h5></div>
                <div class="text-center mb-2"><?php echo $errors['failSign']?></div>

                <!--User Name-->
                <div class="input-group mb-2 mb-3 w-50 mx-auto">
                  <span class="input-group-text" id="">UserName</span>
                  <input type="text" class="me-2 form-control" id="userName" name="userName" placeholder="<?php echo$errors['userName'] ?>">
                </div>
                  <!--Email-->
                  <div class="input-group mb-2  w-50 mx-auto">
                  <span class="input-group-text" id="">Email</span>
                  <input type="text" class="me-2 form-control" id="email" name="email" placeholder="<?php echo $errors['emailError'] ?>">
                  </div>
                  <!--Password-->
                  <div class="input-group mb-2  w-50 mx-auto">
                  <span class="input-group-text" id="">password</span>
                  <input type="password" class="me-2 form-control" id="password" name="password" placeholder="<?php echo$errors['password'] ?>">
                </div>
                  <!--Confirm Password-->
                  <div class="input-group mb-2  w-50 mx-auto">
                  <span class="input-group-text" id="">Confirm Password</span>
                  <input type="password" class="me-2 form-control" id="confirmPassword" name="confirmPassword" placeholder="<?php echo$errors['confirmPassword'] ?>">
                </div>
                <p class="text-center">Already a User? <a href="sign.php">Login</a> Now</p>
                <!--Submit-->
                <div class="text-center my-2">
                  <input class="btn btn-orange my-2 " type="submit" id="register" name="register" value="Register">
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