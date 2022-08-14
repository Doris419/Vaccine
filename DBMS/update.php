
<?php
  session_start();

  require_once('conn.php');

  $uname = $_POST['name'];
  $ID = $_POST['id'];
  $HealthID = $_POST['hin'];
  $Email = $_POST['email'];

    $type = $_FILES['file']['type'];
    $_SESSION['type'] = $type;

    if($type === ''){
        
       
        $sql = "UPDATE `User` SET `Name`='$uname',`Email`='$Email' WHERE `User`.`U_ID` = '$ID' AND `User`.`HealthID` = '$HealthID'";
        //      echo $sql;
        $conn->query($sql);
        $_SESSION["id"]=$ID;
        header("Location: Hompage.php");
       
    }else {
        
        if($_FILES['file']['error'] >0 ) {
            switch ($_FILES['file']['error'] ) {
                case 1:die("檔案大小超出php.ini:upload_max_filesize 限制 ");
                case 2:die("檔案大小超出MAX_FILE_SIZE 限制");
                case 3:die("檔案大小僅被部份上傳");
                case 4:die("檔案未被上傳");
              }
            }

        $file = fopen($_FILES['file']["tmp_name"], "rb");
        $fileContents = fread($file, filesize($_FILES['file']["tmp_name"]));
        fclose($file);
        $fileContents = base64_encode($fileContents);
        
        $sql = "UPDATE `User` SET `Name`='$uname',`Email`='$Email',`pic`='$fileContents' WHERE `User`.`U_ID` = '$ID' AND `User`.`HealthID` = '$HealthID'";
        //      echo $sql;
        $conn->query($sql);
        $_SESSION["id"]=$ID;
        header("Location: Hompage.php");
       
      
    }

?>

