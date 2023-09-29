<?php
include './inc/connection.php';
include './inc/array.php';

//for sign In
$loginManager= mysqli_query($con, "SELECT * FROM manager ") ;
$loginUser= mysqli_query($con, "SELECT * FROM users ") ;
$loginManager1= mysqli_fetch_all($loginManager,MYSQLI_ASSOC);
$loginUser1= mysqli_fetch_all($loginUser,MYSQLI_ASSOC);

if(@$_COOKIE['me'] !=="YES" && @$_COOKIE['user'] !=="YES"){
    $status= mysqli_query($con, "UPDATE users SET status='offline'");
    $note['loginInfo']= '<li><a href="./sign.php">SIGN IN</a></li>';
}else{
    if(@$_COOKIE['me'] ==="YES"){
        foreach($loginManager1 as $loginManager11){
            $note['loginInfo']= '<li><a style=text-transform:uppercase href="./controlpanel.php?id='.@$loginManager11['id'].'">'.$loginManager11['userName'].'</a></li>';
        }
        
        
       
    }if(@$_COOKIE['user'] ==="YES"){
        foreach($loginUser1 as $loginUser11){
            if($loginUser11['status']==="online"){
                $note['loginInfo']= '<li><a style=text-transform:uppercase href="personPage.php?id='. @$loginUser11['id'].'">'.$loginUser11['userName'].'</a></li>';
            }
            
        }
    }
}

//For any users & manager
if(isset($_POST['signIn'])){
    @$userName=$_POST['userName'];
    @$password=$_POST['password'];
    if(empty($userName)){
        $errors['userName']= "Please Input User Name";
    }if(empty($password)){
        $errors['password']= "Please Input Your Password";
    }if(!array_filter($errors)){
        $pass= md5($password);
        // for users
        // for manager
        if(mysqli_num_rows($loginManager)){
            foreach($loginManager1 as $loginManager11){
                if($userName === $loginManager11['userName'] && $pass=== $loginManager11['password']){
                    setcookie('me', 'YES', time() + 3600);
                    header('location: controlPanel.php?id='.$loginManager11['id']);
                }else{
                    $errors['failSign']= 'UserName Or Password Is Wrong';
                }
            }
        }if(mysqli_num_rows($loginUser)){
            $status= mysqli_query($con, "UPDATE users SET status='offline'");
            foreach($loginUser1 as $loginUser11){   
                $idUser= $loginUser11['id'];
                if($userName === $loginUser11['userName'] && $pass===$loginUser11['password']){
                    $status= mysqli_query($con, "UPDATE users SET status='online' WHERE id= '$idUser'  ");
                    setcookie('user', 'YES', time() + 3600);
                    header('location: personPage.php?id='.$loginUser11['id']);
                }else{
                    $errors['failSign']= 'UserName Or Password Is Wrong';
                }
            }
        }
    }
}
//for edit info and SignOut users
if(isset($_POST['editInfoUser'])){
    @$id = $_GET['id'];
    @$userName= $_POST['userName'];
    @$email= $_POST['email'];
    @$image= $_POST['image'];
    @$password = $_POST['password'];
    if(empty(@$userName)){
      $errors['userName']= "userName is required";
    }
    if(empty(@$email)){
      $errors['emailError']= "email is required";
    }
    if(empty(@$image)){
      $errors['image']= "Image is required";
    }
    if(empty(@$password)){
      $errors['password']= "Password is required";
    }
    if(!array_filter($errors)) {
        @$passedit= md5($password);
        @$updateInfo = "UPDATE users SET userName='$userName',  image='$image', email='$email', password='$passedit' WHERE id='$id' ";
        if(mysqli_query(@$con, @$updateInfo)){
            $note['postDone']="Your Information Is Updated, Please Login Now <a href=./sign.php>Login</a>";
        }else{
            $note['postDone']="Your Information Is Not Updated";
        }
     
    }
   
    
}

//For Edit Manager
if(isset($_POST['editInfoManager'])){
    @$editUserName=$_POST['editUserName'];
    @$editPassword=$_POST['editPassword'];
    @$editEmail=$_POST['editEmail'];
    @$id= $_GET['id'];
    if(empty($editUserName)){
      $errors['userName']= "Please Input UserName To Update";
    }if(empty($editPassword)){
      $errors['password']= "Please Input Password To Update";
    }if(empty($editPassword)){
        $errors['emailError']= "Please Input Mail To Update";
      }else{
      $editPassword1=md5($editPassword);
      $updateInfo= mysqli_query($con, "UPDATE manager SET userName='$editUserName',email='$editEmail', password='$editPassword1' WHERE id='$id'");
      if($updateInfo){
        setcookie('me', 'NO', time() - 20);
        $note['postDone']="Your Information Is Updated, Please Login Now <a href=./sign.php>Login</a>";
      }else{
        $note['postDone']="Your Information Is Not Uploaded";
      }
    }
  
  
  }

//Register
if(isset($_POST['register'])){
    @$userName= $_POST['userName'];
    @$email= $_POST['email'];
    @$password= $_POST['password'];
    @$confirmPassword= $_POST['confirmPassword'];
    @$image= $_POST['image'];
    if(empty($userName)){
        $errors['userName']= 'Please Input UserName';
    }if(empty($email)){
        $errors['emailError']= 'Please Input Email';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError']= 'Please Input Correct Email';
    }if(empty($password)){
        $errors['password']= 'Please Input Password';
    }if(empty($confirmPassword)){
        $errors['confirmPassword']= 'Please Re-Password';
    }else{
        if($password !== $confirmPassword){
            $errors['failSign']= 'Password does not match';
        }else{
            @$userCheck= "SELECT * FROM users WHERE userName = '$userName' or email= '$email'";
            @$result= mysqli_query($con, $userCheck);
            @$user = mysqli_fetch_assoc($result);
            if($user['userName'] !==$userName && $user['email'] !== $email){
                @$pass = md5($password);
                @$image= "profile.svg";
                $insertUser= "INSERT INTO users(userName,image, email, password, status)VALUES ('$userName','$image', '$email','$pass', 'offline')";
                if(mysqli_query($con, $insertUser)){
                    $note['regComplete']= "Congratulations $userName, <a href=./sign.php>Login</a> Now";
                }else{
                    echo 'Fail: '. mysqli_error($con);
                }
            }else{
                if($user['userName'] === $userName){
                    $errors['userName']= 'UserName is already exsist';
                }if($user['email'] === $email){
                    $errors['emailError']= 'email is taken';
                }
            }
        }
        
    }
}
//signOut
if(isset($_POST['signOut'])){
    foreach($loginUser1 as $loginUser11){   
        $idUser= $loginUser11['id'];
        if($_GET['id'] === $loginUser11['id']){
            setcookie('user', 'NO', time() - 20);
            $status= mysqli_query($con, "UPDATE users SET status='offline' WHERE id= '$idUser'  ");
            mysqli_query($con, "DELETE FROM cart");
            header('location: sign.php');
        }
    }
    foreach($loginManager1 as $loginManager11){   
        $idUser= $loginManager11['id'];
        if($_GET['id'] === $loginManager11['id']){
            setcookie('me', 'NO', time() - 20);
            header('location: sign.php');
        }
    }

}
//Insert Products
if(isset($_POST['postProduct'])){
    @$productName= $_POST['productName'];
    @$productNumber= $_POST['productNumber'];
    @$productPrice= $_POST['productPrice'];
    @$productCount= $_POST['productCount'];
    @$productImage= $_POST['productImage'];
    if(empty(@$_POST['mobilePost'] || @$_POST['airpodsPost'] || @$_POST['headphonePost'] || @$_POST['vrglassesPost'] || @$_POST['watchPost'])){
        $errors['productType']= 'Please Input Product Type';
    }else{
        if(@$_POST['mobilePost']){
            if(empty(@$_POST['iphone'] || @$_POST['samsung'] || @$_POST['xiaomi'])){
                $errors['mobileType']= "Please Choose Mobile Type";
            }else{
                if(@$_POST['iphone']){
                    $sqlIphone= "INSERT INTO iphone(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
                    if(empty($productName)){
                        $errors['productName']= "Please Input Product Name";
                    }if(empty($productNumber)){
                        $errors['productNumber']= "Please Input Product Number";
                    }if(empty($productPrice)){
                        $errors['productPrice']= "Please Input Product Price";
                    }if(empty($productCount)){
                        $errors['productCount']= "Please Input Product Count";
                    }if(empty($productImage)){
                        $errors['productImage']= "Please Input Product image";
                    }else{
                        if(mysqli_query($con,$sqlIphone)){
                            $note['postDone']= 'Your Product Is Posting Successfully';
                            $note['disabled']= "disabled";
                        }else{
                            echo "Fail: ".mysqli_error($con);
                        }
                    }
                }if(@$_POST['samsung']){
                    $sqlSamsung= "INSERT INTO samsung(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
                    if(empty($productName)){
                        $errors['productName']= "Please Input Product Name";
                    }if(empty($productNumber)){
                        $errors['productNumber']= "Please Input Product Number";
                    }if(empty($productPrice)){
                        $errors['productPrice']= "Please Input Product Price";
                    }if(empty($productCount)){
                        $errors['productCount']= "Please Input Product Count";
                    }if(empty($productImage)){
                        $errors['productImage']= "Please Input Product image";
                    }else{
                        if(mysqli_query($con,$sqlSamsung)){
                            $note['postDone']= 'Your Product Is Posting Successfully';
                            $note['disabled']= "disabled";
                        }else{
                            echo "Fail: ".mysqli_error($con);
                        }
                    }
                }if(@$_POST['xiaomi']){
                    $sqlXiaomi= "INSERT INTO xiaomi(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
                    if(empty($productName)){
                        $errors['productName']= "Please Input Product Name";
                    }if(empty($productNumber)){
                        $errors['productNumber']= "Please Input Product Number";
                    }if(empty($productPrice)){
                        $errors['productPrice']= "Please Input Product Price";
                    }if(empty($productCount)){
                        $errors['productCount']= "Please Input Product Count";
                    }if(empty($productImage)){
                        $errors['productImage']= "Please Input Product image";
                    }else{
                        if(mysqli_query($con,$sqlXiaomi)){
                            $note['postDone']= 'Your Product Is Posting Successfully';
                            $note['disabled']= "disabled";
                        }else{
                            echo "Fail: ".mysqli_error($con);
                        }
                    }
                }
            }
        }if(@$_POST['airpodsPost']){
            $sqlAirpods= "INSERT INTO airpods(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
            if(empty($productName)){
                $errors['productName']= "Please Input Product Name";
            }if(empty($productNumber)){
                $errors['productNumber']= "Please Input Product Number";
            }if(empty($productPrice)){
                $errors['productPrice']= "Please Input Product Price";
            }if(empty($productCount)){
                $errors['productCount']= "Please Input Product Count";
            }if(empty($productImage)){
                $errors['productImage']= "Please Input Product image";
            }else{
                if(mysqli_query($con,$sqlAirpods)){
                    $note['postDone']= 'Your Product Is Posting Successfully';
                    $note['disabled']= "disabled";
                }else{
                    echo "Fail: ".mysqli_error($con);
                }
            }
           
        }if(@$_POST['headphonePost']){
            $sqlHeadphone= "INSERT INTO headphone(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
            if(empty($productName)){
                $errors['productName']= "Please Input Product Name";
            }if(empty($productNumber)){
                $errors['productNumber']= "Please Input Product Number";
            }if(empty($productPrice)){
                $errors['productPrice']= "Please Input Product Price";
            }if(empty($productCount)){
                $errors['productCount']= "Please Input Product Count";
            }if(empty($productImage)){
                $errors['productImage']= "Please Input Product image";
            }else{
                if(mysqli_query($con,$sqlHeadphone)){
                    $note['postDone']= 'Your Product Is Posting Successfully';
                    $note['disabled']= "disabled";
                }else{
                    echo "Fail: ".mysqli_error($con);
                }
            }
           
        }if(@$_POST['vrglassesPost']){
            $sqlVrglasses= "INSERT INTO vrglasses(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
            if(empty($productName)){
                $errors['productName']= "Please Input Product Name";
            }if(empty($productNumber)){
                $errors['productNumber']= "Please Input Product Number";
            }if(empty($productPrice)){
                $errors['productPrice']= "Please Input Product Price";
            }if(empty($productCount)){
                $errors['productCount']= "Please Input Product Count";
            }if(empty($productImage)){
                $errors['productImage']= "Please Input Product image";
            }else{
                if(mysqli_query($con,$sqlVrglasses)){
                    $note['postDone']= 'Your Product Is Posting Successfully';
                    $note['disabled']= "disabled";
                }else{
                    echo "Fail: ".mysqli_error($con);
                }
            }
           
        }if(@$_POST['watchPost']){
            $sqlWatch= "INSERT INTO watch(productName, productNum, productPrice,productCount, productimage)
                                    VALUES('$productName','$productNumber','$productPrice','$productCount','$productImage')";
            if(empty($productName)){
                $errors['productName']= "Please Input Product Name";
            }if(empty($productNumber)){
                $errors['productNumber']= "Please Input Product Number";
            }if(empty($productPrice)){
                $errors['productPrice']= "Please Input Product Price";
            }if(empty($productCount)){
                $errors['productCount']= "Please Input Product Count";
            }if(empty($productImage)){
                $errors['productImage']= "Please Input Product image";
            }else{
                if(mysqli_query($con,$sqlWatch)){
                    $note['postDone']= 'Your Product Is Posting Successfully';
                    $note['disabled']= "disabled";
                }else{
                    echo "Fail: ".mysqli_error($con);
                }
            }
           
        }
    }
}

//Edit Products
if(isset($_POST['editProducts'])){
    if(isset($_POST['airpodsPost'])){
        header("location:airpodsEdit.php");
    }if(isset($_POST['headphonePost'])){
        header("location:headphoneEdit.php");
    }if(isset($_POST['mobilePost'])){
        header("location:indexEdit.php");
    }if(isset($_POST['vrglassesPost'])){
        header("location:vrglassesEdit.php");
    }if(isset($_POST['watchPost'])){
        header("location:watchEdit.php");
    }
}
if(isset($_POST['postEdit'])){
    if(isset($_POST['airpodsEdit'])){
        @$productName= $_POST['productName'];
        @$productNumber= $_POST['productNumber'];
        @$productPrice= $_POST['productPrice'];
        @$productCount= $_POST['productCount'];
        @$productImage= $_POST['productImage'];
        $id= $_GET['id'];
        $airpodsEdit= "UPDATE airpods SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
        if(mysqli_query($con,$airpodsEdit)){
            $note['postDone']= "Your product has been modified";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['headphoneEdit'])){
        @$productName= $_POST['productName'];
        @$productNumber= $_POST['productNumber'];
        @$productPrice= $_POST['productPrice'];
        @$productCount= $_POST['productCount'];
        @$productImage= $_POST['productImage'];
        $id= $_GET['id'];
        $headphoneEdit= "UPDATE headphone SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
        if(mysqli_query($con,$headphoneEdit)){
            $note['postDone']= "Your product has been modified";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['vrGlassesEdit'])){
        @$productName= $_POST['productName'];
        @$productNumber= $_POST['productNumber'];
        @$productPrice= $_POST['productPrice'];
        @$productCount= $_POST['productCount'];
        @$productImage= $_POST['productImage'];
        @$id= $_GET['id'];
        $vrGlassesEdit= "UPDATE vrglasses SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
        if(mysqli_query($con,$vrGlassesEdit)){
            $note['postDone']= "Your product has been modified";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['watchEdit'])){
        @$productName= $_POST['productName'];
        @$productNumber= $_POST['productNumber'];
        @$productPrice= $_POST['productPrice'];
        @$productCount= $_POST['productCount'];
        @$productImage= $_POST['productImage'];
        $id= $_GET['id'];
        $watchEdit= "UPDATE watch SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
        if(mysqli_query($con,$watchEdit)){
            $note['postDone']= "Your product has been modified";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['mobileEdit'])){
        if(isset($_POST['iphone'])){
            @$productName= $_POST['productName'];
            @$productNumber= $_POST['productNumber'];
            @$productPrice= $_POST['productPrice'];
            @$productCount= $_POST['productCount'];
            @$productImage= $_POST['productImage'];
            $id= $_GET['id'];
            $iphoneEdit= "UPDATE iphone SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
            if(mysqli_query($con,$iphoneEdit)){
                $note['postDone']= "Your product has been modified";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }if(isset($_POST['samsung'])){
            @$productName= $_POST['productName'];
            @$productNumber= $_POST['productNumber'];
            @$productPrice= $_POST['productPrice'];
            @$productCount= $_POST['productCount'];
            @$productImage= $_POST['productImage'];
            $id= $_GET['id'];
            $samsungEdit= "UPDATE samsung SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
            if(mysqli_query($con,$samsungEdit)){
                $note['postDone']= "Your product has been modified";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }if(isset($_POST['xiaomi'])){
            @$productName= $_POST['productName'];
            @$productNumber= $_POST['productNumber'];
            @$productPrice= $_POST['productPrice'];
            @$productCount= $_POST['productCount'];
            @$productImage= $_POST['productImage'];
            $id= $_GET['id'];
            $xiaomiEdit= "UPDATE samsung SET productName='$productName', productNum= '$productNumber', productPrice='$productPrice',productCount='$productCount', productimage='$productImage' WHERE id='$id' ";
            if(mysqli_query($con,$xiaomiEdit)){
                $note['postDone']= "Your product has been modified";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }
    }else{
        $errors['productType']= "Please Choose Product Type For Edit";
    }
}

//Delete Products
if(isset($_POST['postDelete'])){
    if(isset($_POST['airpodsDelete'])){
        $id= $_GET['id'];
        $airpodsDelete= "DELETE FROM airpods WHERE id='$id' ";
        if(mysqli_query($con,$airpodsDelete)){
            $note['postDone']= "Your Product Has Been Deleted!";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['headphoneDelete'])){
        $id= $_GET['id'];
        $headphoneDelete= "DELETE FROM headphone WHERE id='$id' ";
        if(mysqli_query($con,$headphoneDelete)){
            $note['postDone']= "Your Product Has Been Deleted!";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['vrGlassesDelete'])){
        @$id= $_GET['id'];
        $vrGlassesDelete= "DELETE FROM vrglasses WHERE id='$id' ";
        if(mysqli_query($con,$vrGlassesDelete)){
            $note['postDone']= "Your Product Has Been Deleted!";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['watchDelete'])){
        $id= $_GET['id'];
        $watchDelete= "DELETE FROM watch WHERE id='$id' ";
        if(mysqli_query($con,$watchDelete)){
            $note['postDone']= "Your Product Has Been Deleted!";
            $note['disabled']= "disabled";
        }else{
            echo "Fail: ".mysqli_error($con);
        }
    }elseif(isset($_POST['mobileDelete'])){
        if(isset($_POST['iphone'])){
            $id= $_GET['id'];
            $iphoneDelete= "DELETE FROM iphone WHERE id='$id' ";
            if(mysqli_query($con,$iphoneDelete)){
                $note['postDone']= "Your Product Has Been Deleted!";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }if(isset($_POST['samsung'])){
            @$id= $_GET['id'];
            $iphoneDelete= "DELETE FROM samsung WHERE id='$id' ";
            if(mysqli_query($con,$iphoneDelete)){
                $note['postDone']= "Your Product Has Been Deleted!";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }if(isset($_POST['xiaomi'])){
            $id= $_GET['id'];
            $iphoneDelete= "DELETE FROM xiaomi WHERE id='$id' ";
            if(mysqli_query($con,$iphoneDelete)){
                $note['postDone']= "Your Product Has Been Deleted!";
                $note['disabled']= "disabled";
            }else{
                echo "Fail: ".mysqli_error($con);
            }
        }
    }
}
//refresh For Control Panel
if(isset($_POST['refreshControl'])){
    header("Location: controlpanel.php");
}

//for Add To Cart
if(isset($_POST['addToCart'])){
    $productName= $_POST['productName'];
    $productNum= $_POST['productNum'];
    $productPrice= $_POST['productPrice'];
    $productCount= $_POST['productCount'];
    $productImage= $_POST['productImage'];
    $quantity= 1;
    @$cart= mysqli_query($con, "SELECT * FROM cart WHERE productName= '$productName'");
    if(mysqli_num_rows($cart) > 0){
    $note['postDone']= "Product Already Added!";
    }else{
        $online= mysqli_query($con, "SELECT * FROM users  WHERE status='online'  ");
        $online1= mysqli_fetch_assoc($online);
        $onlineUser= $online1['userName'];
        if(mysqli_num_rows($online) > 0){
            $sqlCart= mysqli_query($con, "INSERT INTO cart(userName,productName, productNum, productPrice,productCount, productImage, quantity)
            VALUES('$onlineUser','$productName','$productNum','$productPrice','$productCount','$productImage','$quantity')");
            $note['postDone']= "product Is Added Successfully";
        }else{
            echo $note['postDone']="please <a href=sign.php>Login</a> first";
        }
    
    }
}

//cart Process
if(isset($_POST['update_update_btn'])){
    @$quantityValue= $_POST['update_quantity'];
    @$id= $_POST['update_quantity_id'];
    @$total_grand=0;
    if(mysqli_query($con, "UPDATE cart SET quantity= '$quantityValue' WHERE id= '$id' ")){
        header("Location: cart.php");
    }
}
if(isset($_GET['remove'])){
    $removeId= $_GET['remove'];
    if(mysqli_query($con, "DELETE FROM cart WHERE id='$removeId' ")){
        header("Location:cart.php");
    }
}
if(isset($_GET['removeAll'])){
    if(mysqli_query($con, "DELETE FROM cart")){
        header("Location:cart.php");
    }
}
if(isset($_GET['removeAll'])){
    if(mysqli_query($con, "DELETE FROM cart")){
        header("Location:cart.php");
    }
}

// For Messages
if(isset($_GET['removeMessage'])){
    $removeMessage= $_GET['removeMessage'];
    if(mysqli_query($con, "DELETE FROM form WHERE id='$removeMessage' ")){
        header("Location:messages.php");
    }
}
if(isset($_GET['removeAllMessages'])){
    if(mysqli_query($con, "DELETE FROM form")){
        header("Location:messages.php");
    }
}

// For Orders
if(isset($_GET['removeOrder'])){
    $removeOrder= $_GET['removeOrder'];
    mysqli_query($con, "DELETE FROM userProducts WHERE id='$removeOrder'");
    mysqli_query($con, "DELETE FROM orders WHERE id='$removeOrder'");
        header("Location:orders.php");
}
if(isset($_GET['removeAllOrders'])){
    if(mysqli_query($con, "DELETE FROM orders") && mysqli_query($con, "DELETE FROM userProducts" )){
        header("Location:orders.php");
    }
}
// For Users
if(isset($_GET['removeUser'])){
    $removeUser= $_GET['removeUser'];
    if(mysqli_query($con, "DELETE FROM users WHERE id='$removeUser' ")){
        header("Location:users.php");
    }
}
if(isset($_GET['removeAllUsers'])){
    if(mysqli_query($con, "DELETE FROM users")){
        header("Location:users.php");
    }
}

//Form 
if(@$_POST['formSubmit']){
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $email= $_POST['email'];
    $phoneNumber= $_POST['phoneNumber'];
    $letter= $_POST['letter'];
      $sqlForm= "INSERT INTO form(firstName, lastName, email, phoneNumber, message)VALUES('$firstName','$lastName','$email','$phoneNumber','$letter')";
      if(mysqli_query($con, $sqlForm)){
        $note['formDone']='Your Message Sent Successfuly';
      }else{
        $note['formDone']='Your Message Not Sent';
      }
}

//Select Product
$fetchIphone= mysqli_query($con,"SELECT * FROM iphone") ;
$fetchSamsung= mysqli_query($con,"SELECT * FROM samsung");
$fetchXiaomi= mysqli_query($con,"SELECT * FROM xiaomi");
$fetchAirpods=mysqli_query($con,"SELECT * FROM airpods") ;
$fetchHeadphone=mysqli_query($con,"SELECT * FROM headphone") ;
$fetchVrglasses= mysqli_query($con,"SELECT * FROM vrglasses");
$fetchWatch= mysqli_query($con,"SELECT * FROM watch");
$fetchCart= mysqli_query($con,"SELECT * FROM cart");
$fetchUsers= mysqli_query($con,"SELECT * FROM users");
$fetchOrders= mysqli_query($con,"SELECT * FROM orders");
$fetchMessages= mysqli_query($con,"SELECT * FROM form");
$online= mysqli_query($con, "SELECT * FROM users  WHERE status='online'  ");
$fetchUserproducts= mysqli_query($con, "SELECT * FROM productdetails");

$resultIphone=mysqli_fetch_all($fetchIphone, MYSQLI_ASSOC);
$resultSamsung=mysqli_fetch_all($fetchSamsung, MYSQLI_ASSOC);
$resultXiaomi=mysqli_fetch_all($fetchXiaomi, MYSQLI_ASSOC);
$resultAirpods=mysqli_fetch_all($fetchAirpods, MYSQLI_ASSOC);
$resultHeadphone=mysqli_fetch_all($fetchHeadphone, MYSQLI_ASSOC);
$resultVrglasses=mysqli_fetch_all($fetchVrglasses, MYSQLI_ASSOC);
$resultWatch=mysqli_fetch_all($fetchWatch, MYSQLI_ASSOC);
$resultCart=mysqli_fetch_all($fetchCart, MYSQLI_ASSOC);
$resultUsers=mysqli_fetch_all($fetchUsers, MYSQLI_ASSOC);
$resultOrders=mysqli_fetch_all($fetchOrders, MYSQLI_ASSOC);
$resultMessages=mysqli_fetch_all($fetchMessages, MYSQLI_ASSOC);
$resultUserProducts=mysqli_fetch_all($fetchUserproducts, MYSQLI_ASSOC);
