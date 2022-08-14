<?php
session_start();
?>
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="./img/jquery-3.5.1.min.js"></script>
</head>
 
<body>

<?php
  require_once('conn.php');
 
  $ID = $_SESSION["id"];
  $ftype = $_SESSION["type"];
  
 
      $sql = "SELECT * FROM `User` WHERE `U_ID`='$ID'";
      $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        $uname = $row['Name'];
        $HealthID = $row['HealthID'];
        $Email = $row['Email'];
    } else {
       
      echo "0 results";
    }

    $sql_t = "SELECT * FROM `Take` WHERE `U_ID`='$ID';";
    $result_t = $conn->query($sql_t);
    
    if ($result_t->num_rows > 0) {
        
        $vac_num = $result_t->num_rows;
    } else {
       
        $vac_num = 0;
    }
  
  $_SESSION["name"]=$uname;
  $_SESSION["id"]=$ID;
  $_SESSION["hin"]=$HealthID;
  $_SESSION["email"]=$Email;
  $_SESSION["status"]=$vac_num;
  $_SESSION["type"] = $ftype;

?>
 
    <div style="width:50%;height:100vh;background-color:#EDEDED;float:left;">
        <div class="mx-auto" style="width:75%;font-family:'Poppins';font-size:18px;font-weight:400">
            <div style="margin-top:60px;">
                <button class="btn rounded-pill" style="background-color:#D5D5D5">
                    <span id="badge" class="badge rounded-circle">&nbsp;</span><?php echo $uname; ?>
</button>
                <span id="log_out" style="margin-left:55%;"><a href="login.php" style="color:red;"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out.</a></span>
            </div>
            <div style="margin-top:10%">
                <h1 style="font-weight:600" id="uname" ><?php echo $uname; ?></h1>
                <label class="mt-3">ID number：<?php echo $ID; ?><br>
                    Health insurance number：<?php echo $HealthID; ?><br>
                    E-mail：<?php echo $Email; ?>
                </label>
            </div>
            
小黃卡&nbsp;:
<label style="text-decoration:underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        pic
                    </label>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img id="image" style="width: 750px;height: 500px;" src=<?php echo "./showpic.php?filename=" . $uname  ?> />
                                </div>
                            </div>
                        </div>
                    </div>
                </label>

        <div class="mt-4" style="font-size:16px;font-weight:600">
                <label>Status:&nbsp;&nbsp;</label>
                    <?php
                       if($vac_num >= 2){
                           
                           $color = '<label id="status" style="color:#48742C">';
                           $sign = '<i class="fa fa-check-circle"></i></label>';
                       }
                       elseif($vac_num <= 1){
                           
                           $color = '<label id="status" style="color:#B22222">';
                           $sign = '<i class="fa fa-times-circle"></i></label>';
                       }
                       echo $color.$vac_num." dose ".$sign;
                    ?>

            </div>

            <div class="mt-4 ">
                <div style="float:left;">
                    <button style="margin-left:30px;border:none;"><a href="map.php"><img style="width:250px;height:250px;" src="./img/MapBtn.png"></a></button>
                </div>
                <div class="d-grid col-5" style="float:right;margin-top:10%">
                    <button type="button" class="btn btn-primary"><a style="color:white" href="Edit.php">Update</a></button>
                    <p></p>
                    <button type="button" class="btn btn-outline-secondary">QRcode</button>
                </div>
            </div>
        </div>
    </div>

<form name="country" method="post" action="country.php">
    <div style="width:50%;height:100vh;background-color:#222222;float:right;">
        <div class="mx-auto" style="width:70%;font-family:'Poppins';font-size:18px;font-weight:300">
            <label style="margin-top:150px;color: white">Choose your destination.</label>
            <p></p>
        <div>
            <select name="cid" id="sel_country" class="form-select" aria-label="Default select example">
                    <option value="" disabled selected hidden>Country</option>
                    <option value="u,./img/america.png">USA</option>
                    <option value="uk,./img/uk.png">United Kingdom</option>
                    <option value="c,./img/china.png">China</option>
                    <option value="hk,./img/hk.png">HongKong</option>
                    <option value="s,./img/singapore.png">Singapore</option>
                    <option value="k,./img/korea.png">Korea</option>
                    <option value="j,./img/japan.png">Japan</option>
                    <option value="a,./img/australia.png">Australia</option>
                    <option value="f,./img/france.png">France</option>
                    <option value="g,./img/germany.png">Germany</option>
                    <option value="sw,./img/switzerland.png">Switzerland</option>
                    <option value="sp,./img/spain.png">Spain</option>
            </select>
        </div>
        <div class="d-grid col-12">
            <button type="submit" id="btn_next" class="btn btn-outline-secondary" style="margin-top:350px;" onclick="set()">Next→</a></button>
        </div>
        </div>
    </form>

</body>
 
</html>
 
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
 
    #badge {
        margin-right: 30px;
        background-color: #35E47B;
    }
 
    #btn_next:hover,
    #btn_next:active,
    #btn_next:focus {
        background-color: #222222;
    }
 
    .link {
        color: white;
    }
 
    #btn_next:hover .link,
    #btn_next:focus .link,
    #btn_next:active .link {
        color: white;
    }
</style>
 
<script>

   function set() {
        location.href = 'country.php';
        localStorage.uname = document.querySelector("#uname").innerHTML;
        localStorage.countryID = $('#sel_country').val().split(',')[0];
        localStorage.country = $('#sel_country').val().split(',')[1];
//        location.href = "country.php?value=" + localStorage.countryID;
        
    }


</script>
