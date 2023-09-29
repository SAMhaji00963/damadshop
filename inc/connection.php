<?php
//connection
@$con=mysqli_connect('localhost','root','','mobilestore');
if(!$con){
    echo "Fail: ". mysqli_connect_error();
}

