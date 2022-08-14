<?php
  $server_name = 'localhost';
  $username = 'root';
  $password = 'W(lkEF11z0hR8LB/';
  $db_name = 'testforDBMS';

  $conn = new mysqli($server_name, $username, $password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//PDO
//try {
//  $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
//  // set the PDO error mode to exception
//  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//} catch(PDOException $e) {
//  echo $e->getMessage();
//}

?>
