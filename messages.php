<?php
include './inc/connection.php';
include './inc/db.php';
$messagesCount=mysqli_num_rows($fetchMessages);
?>
<!DOCTYPE html>
<html lang="en">
<?php include './inc/head.php' ?>

<body>
    <!-- Navabar -->
    <?php include './inc/headerEdit.php' ?>
    <div class="container">
        <h1 class="text-center color-primary my-4">Client Messages</h1>
        <table class="table text-center  table-group-divider">
            <thead class="table-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultMessages as $resultMessages1): ?>
                    <tr>
                        <td class="pt-5">
                            <?php echo $resultMessages1['firstName'] ?>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultMessages1['lastName'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultMessages1['email'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultMessages1['phoneNumber'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultMessages1['message'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <a class="btn btn-orange" href="messages.php?removeMessage=<?php echo $resultMessages1['id'] ?>" onclick="return confirm('Are You Sure You Want Delete This Message?')";>DELETE MESSAGE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr >
                    <td colspan="3"><a class="btn btn-orange <?=($messagesCount>0)?'': 'disabled'; ?>" href="messages.php?removeAllMessages" onclick="return confirm('Are You Sure You Want Delete All Messages?')";>Deleting All</a></td>
                    <td colspan="2"><a class="btn btn-orange " href="controlPanel.php" >Back To Control Panel</a></td>
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