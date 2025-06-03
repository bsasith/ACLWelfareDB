<?php
// Connection Configuration
$con = mysqli_connect('localhost', 'root', '', 'aclwelfare');
if (!$con) {
    die(mysqli_error("Error",$con));
}
?>