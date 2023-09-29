<?php
include './inc/connection.php';
include './inc/db.php';
//For Buy If User Logine
$name= $_GET['name'];
$user= mysqli_query($con, "SELECT * FROM userproducts WHERE userName='$name'");
$detail= mysqli_fetch_all($user,MYSQLI_ASSOC);

if(isset($_POST['sendDetails'])){
    $getUser=$_GET['name'];
    
    $sendDeatil=mysqli_query($con, "INSERT productdetails SELECT * FROM userproducts WHERE userName='$getUser'"); 
    if($sendDeatil){
        $note['sendDetails']= "Details is sent successfuly";
    }else{
        $note['sendDetails']= "Details is Not sent";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <div class="container-fluid">
        <h1 class="text-center color-primary my-4">Sales List</h1>
        <h5 class="text-center color-primary"><?php echo $note['sendDetails'] ?></h5>

    <table class="table text-center table-group-divider">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Number</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody class="my-auto">
            <?php foreach($detail as $detail1): ?>
                <tr>
                    <td>
                        <?php echo "<img src=./images/products/".$detail1['productImage']. " width=100 height=100 >"?>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo $detail1['productName'] ?></h5>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo $detail1['productNum'] ?></h5>
                    </td>
                 
                    <td class="pt-5">
                        <h5><?php echo "$". $detail1['productPrice'] ?></h5>
                    </td>
                    <td class="pt-5">
                    <h5><?php echo  $detail1['quantity'] ?></h5>
                    </td>
                    <td class="pt-5">
                        <?php echo '$'. $sub_total= $detail1['quantity'] * $detail1['productPrice'] ?>
                    </td>
                   
                </tr>
                <?php @$total_grand += $sub_total; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">
                    <a href="orders.php" class="btn btn-orange">Back To Orders</a>
                </td>
                <td>
                    Grand Total
                </td>
                <td colspan=2>
                    <p class="color-primary"><?php echo "$". @$total_grand  ?></p>
                </td>
                <td>
                    <form action="" method="post">
                        <input class="btn btn-orange" type="submit" name="sendDetails" Value="Send Details To <?php echo $_GET['name']  ?>">
                    </form>
                    
                </td>
            </tr>
        </tbody>
    </table>
  
    </div>
    <!-- Footer -->
    <?php include './inc/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>
</html>