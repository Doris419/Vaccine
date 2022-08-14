<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <form name="login" method="post" action="check.php">
        <div style="width:50%;height:100vh;background-color:#EDEDED;float:left;">
            <div  class="mx-auto"style="width:55%;font-family:'Poppins';font-size:18px;font-weight:400">
                <div>
                    <label  style="margin-top:120px;">Don't have an account?</label>
                    <button id="sign" style="margin-left:50px;"><a href="SignUp.php">Sign up!</a></button>
                </div>
                <div style="display:flex;margin-top:90px">
                    <h1 style="font-weight:600;margin:auto">Welcome!</h1>
                </div>
                <label style="margin-left:27%">Login into your account.</label>
                <div class="input-group mb-3 mt-5">
                    <input type="text" id="name" class="form-control" style="height: 65px;" placeholder="User name" name="name">
                </div>
                <div class="input-group mb-5">
                    <input type="password" id="id_no" class="form-control" style="height: 65px;" placeholder="ID number" name="id">
                </div>
                <div class="d-grid col-12" style="margin-top:100px">
                    
                    <input type="submit" class="btn btn-outline-secondary" value="Log In">
                </div>
            </div>
        </div>
        <div style="width:50%;height:100vh;background-color:#222222;float:right;"> </div>
   </form>


</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

#sign{
    border: none;
    color:blue;
}
</style>

