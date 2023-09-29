<?php
include './inc/connection.php';
include './inc/db.php';
$ordersCount=mysqli_num_rows($fetchOrders);

?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <div class="container-fluid">
        <h1 class="text-center color-primary my-4">Client Orders</h1>
        <table class="table text-center  table-group-divider">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Card Name</th>
                    <th>Card Number</th>
                    <th>CCV</th>
                    <th>Card Code</th>
                    <th>City</th>
                    <th>Street Name</th>
                    <th>Build Name</th>
                    <th>Flat Number</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="my-auto">
                <?php foreach($resultOrders as $resultOrders1): ?>
                    <tr>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['name'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['number'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['email'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['cardName'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['cardNumber'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['ccv'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['cardCode'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['city'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['streetName'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['buildName'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['flatNumber'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultOrders1['totalPrice'] ?></h5>
                        </td>
                        <td class="pt-5 w-25">
                            <a class="btn btn-orange mb-2" href="ordersdetail.php?name=<?php echo $resultOrders1['name'] ?>">DETAILS</a>
                            <a class="btn btn-orange mb-2" href="orders.php?removeOrder=<?php echo $resultOrders1['id'] ?>" onclick="return confirm('Are You Sure You Want Delete This Order?')";>DELETE</a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr >
                    <td colspan="6"><a class="btn btn-orange <?=($ordersCount>0)? '' : 'disabled'; ?>" href="orders.php?removeAllOrders" onclick="return confirm('Are You Sure You Want Delete All Orders?')";>Deleting All</a></td>
                    <td colspan="4"><a class="btn btn-orange " href="controlPanel.php" >Back To Control Panel</a></td>
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