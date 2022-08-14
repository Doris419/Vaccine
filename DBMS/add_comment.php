<?php
session_start();
 
include('conn.php');
 
    $C_ID = $_POST['C_ID'];
    $U_Name = $_POST['U_Name'];
    $Context = $_POST['Context'];
 
    $created_at = date('Y-m-d H:i:s',(time()+6*3600));
    $sql = "INSERT INTO `comment`(`C_ID`, `U_Name`, `Context`) VALUES ('$C_ID', '$U_Name', '$Context')";
   
    $conn->query($sql);
 
   
    echo json_encode($created_at);
   



