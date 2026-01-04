<?php
// mysqli method

$servername= "localhost";
$username = "root";
$password = "";
?>

<!-- PDO method -->
<?php

// connection create and check
try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!-- mysqli method -->


<!-- <?php
// connection create
$conn= new mysqli($servername, $username, $password);

// check connectoin
if($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}
echo "connected successfully";
?> -->