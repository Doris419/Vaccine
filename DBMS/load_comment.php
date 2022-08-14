<?php
session_start();
 
include('conn.php');
 
    $C_ID = $_POST['C_ID'];
    $sql = "SELECT `U_Name`, `Context`, `created_at`, `Comment_ID` FROM `comment` WHERE `C_ID` = '$C_ID' ORDER BY `Comment_ID`";
 
    $result = $conn->query($sql);
    $discussion = [];
    while ($row = $result->fetch_assoc()) {
        array_push($discussion, [
            'U_Name' => $row['U_Name'],
            'Context' => $row['Context'],
            'created_at' => $row['created_at'],
            'Comment_ID' => $row['Comment_ID']
        ]);
    }
 
     echo json_encode($discussion);
 


