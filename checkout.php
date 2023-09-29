<?php
include './inc/connection.php';
include './inc/db.php';

$online1= mysqli_fetch_assoc($online);

if(isset($_POST['confirmOrder'])){
    @$totalPrice= $_POST['totalPrice'];
    @$name= $_POST['name'];
    @$email= $_POST['email'];
    @$phoneNumber= $_POST['phoneNumber'];
    @$cardName= $_POST['cardName'];
    @$cardNumber= $_POST['cardNumber'];
    @$ccv= $_POST['ccv'];
    @$cardCode= $_POST['cardCode'];
    @$city= $_POST['city'];
    @$streetName= $_POST['streetName'];
    @$buildName= $_POST['buildName'];
    @$flatNumber= $_POST['flatNumber'];
    @$method= $_POST['method'];
    if(empty($name)){
        $errors['nameError']= 'Please Input Your Name';
    }if(empty($email)){
        $errors['emailError']= 'Please Input Your Mail';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError']= 'Please Input Correct Email';
    }if(empty($phoneNumber)){
        $errors['phoneNumberError']= 'Please Input Your Phone Number';
    }if(empty($city)){
        $errors['cityError']= 'Please Input Your City Name';
    }if(empty($streetName)){
        $errors['streetNameError']= 'Please Input Your Street Name';
    }if(empty($buildName)){
        $errors['buildNameError']= 'Please Input Your Build Name';
    }if(empty($flatNumber)){
        $errors['flatNumberError']= 'Please Input Your Flat Number';
    }if(!array_filter($errors)){
        if($name === $online1['userName']){
            if(!empty($_POST['method'])){
                foreach($_POST['method'] as $selected){
                    if($selected === "selectOne"){
                        $errors['methodError']= "Please Choose Pay Method";
                    }if($selected === "cash"){
                        $orderInsert= "INSERT INTO orders(name, number, email, cardName, cardNumber, ccv, cardCode, city, streetName, buildName, flatNumber, totalPrice)VALUES('$name','$phoneNumber','$email','---','---','---','---','$city','$streetName','$buildName','$flatNumber','$totalPrice')";
                        if(mysqli_query($con, $orderInsert)){
                            mysqli_query($con, "INSERT userProducts SELECT * FROM cart"); 
                            mysqli_query($con, "DELETE FROM cart");
                            $note['thank']= '
                            <div class="thank text-center my-4">
                                <h5>Your Order Is Completed, Thanks For Shopping</h5>
                                <a href="index.php" class="btn btn-orange mt-4">Continue Shopping</a>
                            </div>
                                ';
                        }else{
                            echo "Fail: ". mysqli_error($con);

                        }
                    }if($selected === "credit"){
                        if(empty($cardName)){
                            $errors['cardNameError']= 'Please Input Your Card Name';
                        }if(empty($cardNumber)){
                            $errors['cardNumberError']= 'Please Input Your Card Number';
                        }if(empty($ccv)){
                            $errors['ccvError']= 'Please Input Your ccv';
                        }if(empty($cardCode)){
                            $errors['cardCodeError']= 'Please Input Your Card Code';
                        }if(!array_filter($errors)){
                            $orderInsert= "INSERT INTO orders(name, number, email, cardName, cardNumber, ccv, cardCode, city, streetName, buildName, flatNumber, totalPrice)VALUES('$name','$phoneNumber','$email','$cardName','$cardNumber','$ccv','$cardCode','$city','$streetName','$buildName','$flatNumber','$totalPrice')";
                            if(mysqli_query($con, $orderInsert)){
                                mysqli_query($con, "INSERT userProducts SELECT * FROM cart"); 
                                mysqli_query($con, "DELETE FROM cart");
                                $note['thank']= '
                                <div class="thank text-center my-4">
                                    <h5>Your Order Is Completed, Thanks For Shopping</h5>
                                    <a href="index.php" class="btn btn-orange mt-4">Continue Shopping</a>
                                </div>
                                    ';
                            }else{
                                echo "Fail: ". mysqli_error($con);
    
                            }
                        }
                        
                    }
                }
            }
            
        }else{
            $errors['nameError']= 'Please Choose Your Name';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>
<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
        <?php echo $note['thank'] ?>
        <div class="container cartProcess ">
        <h3 class="">Your Order</h3>
        <hr>
        <h4 class="color-primary">Products</h4>
        <?php foreach($resultCart as $resultCart1): ?>
            <span><?php echo $resultCart1['productName']. " - " ?></span>
            <?php @$total_price+=$resultCart1['productPrice'] * $resultCart1['quantity'] ?>
        <?php endforeach; ?>
        <h4 class="color-primary mt-5">Total Price</h4>
        <h5><?php echo '$'. @$total_price ?></h5>
        <a href="cart.php" class="btn btn-orange my-3">Edit List</a>
    </div>
    <form  action="checkout.php?removeAllForCheckOut=" method="post">
        <div id="order" class="row container mx-auto mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12  ">
                <!--Name-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >UserName</span>
                    <input type="text" name="name" class="form-control" placeholder="<?php echo @$errors['nameError'] ?>"  >
                </div>
                <!--Email-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >Email</span>
                    <input type="text" name="email" class="form-control" placeholder="<?php echo @$errors['emailError'] ?>" >
                </div>
                <!--Card Name-->
                <div class="input-group mb-3 pay credit">
                    <span class="input-group-text" >Card Name</span>
                    <input type="text" name="cardName" class="form-control" placeholder="<?php echo @$errors['cardNameError'] ?>" value="<?php echo @$cardName ?>" >
                </div>
                <!--CCV-->
                <div class="input-group mb-3 pay credit">
                    <span class="input-group-text" >CCV</span>
                    <input type="text" name="ccv" class="form-control" placeholder="<?php echo @$errors['ccvError'] ?>" value="<?php echo @$ccv ?>" >
                </div>
                <!--City-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >City</span>
                    <input type="text" name="city" class="form-control" placeholder="<?php echo @$errors['cityError'] ?>" value="<?php echo @$email ?>" >
                </div>
                <!--Build Name-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >Build Name</span>
                    <input type="text" name="buildName" class="form-control" placeholder="<?php echo @$errors['buildNameError'] ?>" value="<?php echo @$buildName ?>" >
                </div>
                <!--Total Price-->
                <div class="input-group mb-3">
                    <input type="hidden" name="totalPrice" class="form-control" placeholder="<?php echo @$errors['nameError'] ?>" value="<?php echo @$total_price ?>" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
                <!--Number-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >phone Number</span>
                    <input type="text" name="phoneNumber" class="form-control" placeholder="<?php echo @$errors['phoneNumberError'] ?>" value="<?php echo @$phoneNumber ?>"  >
                </div>
                <!--paymentType-->
                <p><?php echo $errors['methodError'] ?></p>
                <div class="input-group mb-3">
                    <span class="input-group-text" >Payment Type</span>
                    <select name="method[]" id="test-dropdown" onchange="choice1()" class="form-control">
                        <option value="selectOne">Select One</option>
                        <option value="cash" name="cash">Cash on delevery</option>
                        <option value="credit" name="credit">Credit card</option>
                    </select>
                </div>
                <!--Card Number-->
                <div class="input-group mb-3 pay credit">
                    <span class="input-group-text" >Card Number</span>
                    <input type="text" name="cardNumber" class="form-control" placeholder="<?php echo @$errors['cardNumberError'] ?>" value="<?php echo @$cardNumber ?>" >
                </div>
                <!--Code Number-->
                <div class="input-group mb-3 pay credit">
                    <span class="input-group-text" >Code Number</span>
                    <input type="text" name="cardCode" class="form-control" placeholder="<?php echo @$errors['cardCodeError'] ?>" value="<?php echo @$cardCode ?>" >
                </div>
                <!--Street Name-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >Steet Name</span>
                    <input type="text" name="streetName" class="form-control" placeholder="<?php echo @$errors['streetNameError'] ?>" value="<?php echo @$streetName ?>" >
                </div>
                <!--Flat Number-->
                <div class="input-group mb-3">
                    <span class="input-group-text" >Flat Number</span>
                    <input type="text" name="flatNumber" class="form-control" placeholder="<?php echo @$errors['flatNumberError'] ?>" value="<?php echo @$flatNumber ?>" >
                </div>
            </div>
            <input class="btn btn-orange w-25 mx-auto my-3 <?= ($total_price>1)?'':'disabled'; ?>" value="Confirm Order" type="submit" name="confirmOrder" onclick= "return confirm('Your Order Is Complete, Thanks For Shopping')">
        </div>
    </form>

    <!-- Footer -->
    <?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>
</html>