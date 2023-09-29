<?php
include './inc/connection.php';
include './inc/db.php';
//For Buy If User Login
$online1= mysqli_num_rows($online);
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <div class="container-fluid">
        <h1 class="text-center color-primary my-4">Products List</h1>
    <table class="table text-center table-group-divider">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Number</th>
                <th>Max Quantity</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="my-auto">
            <?php foreach($resultCart as $resultCart1): ?>
                <tr>
                    <td>
                        <?php echo "<img src=./images/products/".$resultCart1['productImage']. " width=100 height=100 >"?>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo $resultCart1['productName'] ?></h5>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo $resultCart1['productNum'] ?></h5>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo $resultCart1['productCount'] ?></h5>
                    </td>
                    <td class="pt-5">
                        <h5><?php echo "$". $resultCart1['productPrice']. " /-" ?></h5>
                    </td>
                    <td class="pt-5">
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $resultCart1['id']; ?>" >
                            <input class="w-50" type="number" name="update_quantity" min="1" max="<?php echo $resultCart1['productCount'] ?>"  value="<?php echo $resultCart1['quantity']; ?>" >
                            <input class="btn btn-orange" type="submit" value="update" name="update_update_btn">
                        </form>   
                    </td>
                    <td class="pt-5">
                        <?php echo '$'. $sub_total= $resultCart1['quantity'] * $resultCart1['productPrice'] ?>
                    </td>
                    <td class="pt-5">
                        <a class="btn btn-orange" href="cart.php?remove=<?php echo $resultCart1['id'] ?>" onclick="return confirm('Are You Sure You Want Delete This Product?')";>DELETE</a>
                    </td>
                </tr>
                <?php @$total_grand += $sub_total; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan=2><a class="btn btn-orange" href="./index.php">Continue Shopping</a></td>
                <td colspan=4>Grand Total</td>
                <td><?php echo "$". @$total_grand  ?></td>
                <td colspan="2"><a class="btn btn-orange" href="cart.php?removeAll" onclick="return confirm('Are You Sure You Want Delete All Products?')";>Deleting All</a></td>
            </tr>
        </tbody>
    </table>
    <div class="checkout-btn text-center">
      <a href="checkout.php" class="btn btn-orange <?= ($total_grand > 1 && $online1)?'':'disabled'; ?>">procced to checkout</a>
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