<!-- mysqli method -->

<?php

$servername= "localhost";
$username = "root";
$password = "";

// connection create
$conn= new mysqli($servername, $username, $password);

// check connectoin
if($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}
echo "connected successfully";
?>