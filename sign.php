<?php
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
            <form class="mt-3" action="sign.php" method="POST">
                <div class="text-center my-4"><h5><?php echo $errors['failSign']?></h5></div>
                <div class="text-center my-4"><h5><?php echo $note['loginSuccess']?></h5></div>
                <!--User Name-->
                <div class="input-group mb-2 mb-3 w-50 mx-auto">
                  <span class="input-group-text" id="">UserName</span>
                  <input type="text" class="me-2 form-control" id="userName" name="userName" placeholder="<?php echo$errors['userName'] ?>" value="<?php echo @$userName ?>">
                </div>

                <!--Password-->
                <div class="input-group mb-2  w-50 mx-auto">
                  <span class="input-group-text" id="">password</span>
                  <input type="password" class="me-2 form-control" id="password" name="password" placeholder="<?php echo$errors['password'] ?>" value="<?php echo @$password ?>">
                </div>
                <p class="text-center">Don't Have An Acount Yet? <a href="register.php">Sign Up</a> Now</p>
                <!--Submit-->
                <div class="text-center my-2">
                  <input class="btn btn-orange my-2 " type="submit" id="signIn" name="signIn" value="Login">
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