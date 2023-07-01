<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
    // echo "connection successful";
}else{
    die("connection failed" . mysqli_connect_error());
}
