<?php
session_start();
?>

<?php
  include('conn.php');

  $uname = $_POST['name'];
  $ID = $_POST['id'];
  $HealthID = $_POST['hin'];
  $Email = $_POST['email'];

    echo "Filename: " . $_FILES['file']['name']."<br>";
    echo "Type : " . $_FILES['file']['type'] ."<br>";
    echo "Size : " . $_FILES['file']['size'] ."<br>";
    echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
    echo "Error : " . $_FILES['file']['error'] . "<br>";

$type = $_FILES['file']['type'];
$_SESSION['type'] = $type;

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

  $SQLSTR = "INSERT INTO `User`(`Name`, `U_ID`, `HealthID`, `Email`,`PCR`,`pic`) VALUES ('$uname','$ID','$HealthID','$Email','0','$fileContents')";

$_SESSION["id"]=$ID;
header("Location: Hompage.php");
  echo $SQLSTR.'<br>';
  $conn->query($SQLSTR);
echo $SQLSTR.'<br>';

?>
