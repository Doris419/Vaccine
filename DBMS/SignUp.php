<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <style>
        <?php include('../src/login.css');?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

#sign{
    border: none;
    color:blue
}
</style>
</head>
<body>
    
    <form name="sign-up" method="post" action="sign.php" enctype="multipart/form-data">
        
<div style="width:50%;height:100vh;background-color:#EDEDED;float:left;">
    <div  class="mx-auto"style="width:55%;font-family:'Poppins';font-size:18px;font-weight:400">
        <div>
            <label  style="margin-top:50px;">Already had an account?</label>
            <button id="sign" style="margin-left:50px;"><a href="login.php">Login.</a></button>
        </div>
        <div class="mx-auto"style="width:50%;margin-top:20px">
            <h1 style="font-weight:600">Welcome!</h1>
        </div>
        <label style="margin-left:65px;margin-top:20px;">Fill in to start your account.</label>
        <div class="input-group mb-3 mt-5">
            <input type="text" id="name" class="form-control" style="height: 45px;" placeholder="User name" name="name">
        </div>
        <div class="input-group mb-3">
            <input type="password" id="id" class="form-control" style="height: 45px;" placeholder="ID number" name="id">
        </div>
        <div class="input-group mb-3">
            <input type="text" id="hin" class="form-control" style="height: 45px;" placeholder="Health insurance number" name="hin">
        </div>
        <div class="input-group mb-3">
            <input type="email" id="email" class="form-control" style="height: 45px;" placeholder="E-mail" name="email">
        </div>
        <div class="d-grid col-12">
                <input type="submit" class="btn btn-outline-secondary" value="Sign up">
        </div>
        </div>
    </div>
    <div style="width:50%;height:100vh;background-color:#222222;float:right;">
     <div  class="mx-auto" style="width:70%;font-family:'Poppins';font-size:18px;font-weight:300">
      <label style="margin-left:55px;margin-top:175px;color: white">Click to upload your vaccine veriation.</label>
        <div  class="mx-auto" style="width:50%;font-family:'Poppins';font-size:18px;font-weight:400">
         <input type="file" id="file" class="form-control" name="file">
        </div>
        </div>
        <p></p>
    </div>
    </form>
</body>

</html>
