<?php
  session_start();
  $uname = $_SESSION["name"];
  $ID = $_SESSION["id"];
  $HealthID = $_SESSION["hin"];
  $Email = $_SESSION["email"];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <style>
        <?php include('../src/login.css'); ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

</style>
</head>
<body>
	<div style="width:50%;height:100vh;background-color:#EDEDED;float:left;">
        <div class="mx-auto"style="width:60%;font-family:'Poppins';font-size:18px;font-weight:400">
            <div>
                <i class="fa fa-angle-double-right" aria-hidden="true" style="color: red;margin-left:265px;margin-top:40px"></i>
                <button class="btn btn-outline-none"><a href="SignUp.php" style="margin-left:5px;margin-top:40px;color: red;">Log out.</a></button>
            </div>
            <button class="btn" style="font-size: 24px" onclick="location.href='Hompage.php'"><i class="fa fa-arrow-left"></i>   Update</button>
            <p></p>

<form name="edit" method="post" action="update.php" enctype="multipart/form-data" onsubmit="return chk();">
            Name:
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="name" style="height: 45px" placeholder= <?php echo $uname ?> name="name" required />
  				<span class="input-group-text" id="addon-wrapping">@</span>
			</div>
            ID number:
            <div class="input-group mb-3">
            	<input type="text" class="form-control" aria-label="id" style="height: 45px" value = <?php echo $ID ?> placeholder= <?php echo $ID ?> name="id" readonly="readonly">
  				<span class="input-group-text" id="addon-wrapping">@</span>
            </div>
            Health insurance number:
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="hin" style="height: 45px" value = <?php echo $HealthID ?> placeholder= <?php echo $HealthID ?> name="hin" readonly="readonly">
  				<span class="input-group-text" id="addon-wrapping">@</span>
            </div>
            E-mail:
            <div class="input-group mb-3">
                <input type="email" class="form-control" aria-label="email" style="height: 45px" placeholder= <?php echo $Email ?> name="email" required/>
  				<span class="input-group-text" id="addon-wrapping">@</span>
  			</div>


            <div class="d-grid col-12">
                <input type="submit" class="btn btn-primary" value="Comfirm to update">
            </div>
        </div>
    </div>
<div style="width:50%;height:100vh;background-color:#222222;float:right;">
 <div  class="mx-auto" style="width:70%;font-family:'Poppins';font-size:18px;font-weight:300">
  <label style="margin-left:55px;margin-top:175px;color: white">Click to upload your vaccine veriation.</label>
    <div  class="mx-auto" style="width:50%;font-family:'Poppins';font-size:18px;font-weight:400">
     <input type="file" id="file" class="form-control" name="file">
    </div>
</form>
</body>

</html>
