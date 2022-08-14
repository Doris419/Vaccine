<?php

    session_start();

    require_once('conn.php');
    $ID = $_SESSION['id'];
    $ftype = $_SESSION['type'];
//    echo $ID.$ftype;
   
    $sql="SELECT `pic` FROM `User` WHERE `U_ID`='$ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $file = $row['pic'];
//        echo $file;
        $pic = base64_decode($file);

    } else {

      echo "0 results";
    }

    header("Content-Type: $ftype");
    echo $pic;
?>

