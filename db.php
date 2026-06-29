<?php

$conn = mysqli_connect("localhost", "root", "", "complaint_system");

if(!$conn){
    die("Connection Failed");
}

mysqli_set_charset($conn, "utf8mb4");

?>