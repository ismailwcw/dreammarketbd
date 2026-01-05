<?php
// mysqli method

$db_servername= "localhost";
$db_username = "root";
$db_password = "";
$db_name = "dmdb";
?>

<!-- PDO method -->
<?php

// connection create and check
try {
  $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>