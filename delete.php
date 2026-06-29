<?php
session_start();

include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "delete from complaints 
        where id='$id' and user_id='$user_id'";

if(mysqli_query($conn, $sql)){
    header("Location: dashboard.php?deleted=1");
    exit();
} else {
    echo "Delete Error";
}
?>