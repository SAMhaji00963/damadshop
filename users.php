<?php
include './inc/connection.php';
include './inc/db.php';
$usersCount=mysqli_num_rows($fetchUsers);

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
                    <th>User Name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultUsers as $resultUsers1): ?>
                    <tr>
                        <td class="pt-5">
                            <?php echo $resultUsers1['userName'] ?>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultUsers1['email'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <h5><?php echo $resultUsers1['password'] ?></h5>
                        </td>
                        <td class="pt-5">
                            <a class="btn btn-orange" href="users.php?removeUser=<?php echo $resultUsers1['id'] ?>" onclick="return confirm('Are You Sure You Want Delete This User?')";>DELETE USER</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr >
                    <td colspan="2"><a class="btn btn-orange <?=($usersCount>0)?'': 'disabled'; ?>" href="users.php?removeAllUsers" onclick="return confirm('Are You Sure You Want Delete All Users?')";>Deleting All</a></td>
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