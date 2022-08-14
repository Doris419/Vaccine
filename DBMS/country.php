<?php
  session_start();
  $uname = $_SESSION["name"];
  $ID = $_SESSION["id"];
  $vac_num = $_SESSION["status"];
  $cID = $_POST["cid"];
  $cID = substr($cID,0,strpos($cID, ','));
?>

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
    <script src="./img/jquery-3.5.1.min.js"></script>
</head>
 
<body>

<?php
  require_once('conn.php');
 
    $sql = "SELECT * FROM Country WHERE C_ID ='$cID';";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        $cname = $row['Name'];
    } else {
       
      echo "0 results1";
    }

    $sql_r = "SELECT * FROM Regulation WHERE `C_ID` = '$cID';";
    $result_r = $conn->query($sql_r);

    if ($result_r->num_rows > 0) {

        $requi = array(
                      
          "ID" => array(),
          "Name" => array(),
          "PCR" => array(),
          "Quarantine" =>array(),
          "Description" => array());
        
        $i = 0;
        
        while($row_r = $result_r->fetch_assoc()){
            
            array_push($requi["ID"],$row_r['R_ID']);
            array_push($requi["Name"],$row_r['R_Name']);
            array_push($requi["PCR"],$row_r['PCR']);
            array_push($requi["Quarantine"],$row_r['Quarantine']);
            array_push($requi["Description"],$row_r['Description']);;
            $i++;
        }
    } else {
        
        echo "0 results2";
    }

    $sql_v = "SELECT * FROM Required as A, Vaccine as B WHERE A.V_ID = B.V_ID AND A.C_ID ='$cID';";
    $result_v = $conn->query($sql_v);

  $_SESSION["name"]=$uname;
  $_SESSION["id"]=$ID;
//  $_SESSION["hin"]=$HealthID;
//  $_SESSION["email"]=$Email;
?>

    <div style="width:50%;height:120vh;background-color:#EDEDED;float:left;">
        <div class="mx-auto" style="width:75%;font-family:'Poppins';font-size:18px;font-weight:400">
            <div style="margin-top:40px;">
                <button class="btn rounded-pill" style="background-color:#D5D5D5">
                    <span id="badge" class="badge rounded-circle"> </span> <?php echo $uname; ?> </button>
                <span id="log_out" style="margin-left:55%;"><a href="login.php" style="color:red;"><i class="fa fa-sign-out"></i>Log out.</a></span>
            </div>
            <div style="font-size:35px;">
                <button id="back_search" style="margin-top:20px"><a href="Hompage.php" class="link"><i class="fa fa-arrow-left"></i> Searching results</a></button>
            </div>
            <div class="flag" id="flag">
                <img src= "" id="flag_icon" class="mt-3" style="width:150px;height:150px">
                <h5 id="flag_txt" style="margin-top: -15px;"><?php echo $cname; ?></h5>
            </div>
            <div style="margin-top:20px">
                <h5>Requirement:</h5>
                <label id="discription" style="font-size:16px;">

                <?php
                        for($x = 0; $x < count($requi['ID']); $x++){
                            
                            $y = $x-1;
                            $tit = '<div class="mt-4" style="font-size:16px;font-weight:600">';
                            $content = '<p class="card-text content">';
                            
                            if($requi['Name'][$x] == '陰性檢測'){
                                
                                if($requi['Name'][$x] == $requi['Name'][$y]){
                                    
                                    echo $requi['PCR'][$x]." day(s) before ".$requi['Description'][$x]."</p>";
                                }
                                else{
                                    
                                    echo $tit.$requi['Name'][$x].":<br></div>".$content.$requi['PCR'][$x]." day(s) before ".$requi['Description'][$x]."<br>";
                                }
                            }else{
                                
                                if($requi['Name'][$x] == $requi['Name'][$y]){
                                    
                                    echo $requi['Quarantine'][$x].$requi['Description'][$x]."<br>";
                                }
                                else{
                                    
                                    echo $tit."</p>".$requi['Name'][$x].":<br></div>".$content.$requi['PCR'][$x].$requi['Quarantine'][$x].$requi['Description'][$x]."<br>";
                                }
                            }
                        }

                        echo $tit."認證疫苗:<br></div>";
                        if ($result_v->num_rows > 0) {

                            $vac = array(
                                      "1" => array(),
                                      "2" => array(),
                                      "3" => array());

                            while($row_v = $result_v->fetch_assoc()){
                                
                                if($row_v['Dose'] == 1){
                                 
                                    array_push($vac['1'],$row_v['BrandName']);
                                }elseif($row_v['Dose'] == 2){
                                    
                                    array_push($vac['2'],$row_v['BrandName']);
                                }elseif($row_v['Dose'] == 3){
                                    
                                    array_push($vac['3'],$row_v['BrandName']);
                                }
                            }
                            
                            for($x = 1; $x <= count($vac); $x++){
                                
                                if(count($vac[$x]) == 0){
                                    
                                    continue;
                                }
                                echo "$x dose: ";
                                for($y = 0; $y < count($vac[$x]); $y++){
                                    
                                    if($y == count($vac[$x]) - 1){
                                        
                                        echo $vac[$x][$y];
                                    }else{
                                        
                                        echo $vac[$x][$y].', ';
                                    }
                                }
                                
                                echo '<br>';
                            }

                        } else {

                            echo "無疫苗限制。";
                        }
                ?>

                </label>
            </div>
            <div class="mt-4" style="font-size:16px;font-weight:600">
                <label>Status：</label>
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
                            </div>
                        </div>
    <div style="width:50%;height:120vh;background-color:#222222;float:right;">
        <div class="mx-auto" style="width:75%;font-family:'Poppins';font-size:18px;font-weight:400;color:white">
            <h1 style="color:white;margin-top:170px;font-weight:600">Comments</h1>
            <div class="comments" style="height:450px;overflow:scroll;overflow-x:hidden">
                
            </div>
            <div style="margin-top:20px">
                <span>
                    <img width="30px" src="./img/user.png">
                    <label style="font-size:17px;font-weight:500">&nbsp; <?php echo $uname; ?> </label>
                </span>
            </div>
            <div>
                <form class="add-comment-form">
                    <input id="ipt_com" class="d-grid col-12" style="background-color:#222222;color:white;" type="text" placeholder="Share something...">
                </form>
            </div>
        </div>
    </div>
</body>
 
</html>
 
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
 
    #back_search {
        border: none;
    }
 
    #badge {
        margin-right: 30px;
        background-color: #35E47B;
    }
 
    #status,
    #badge,
    .link {
        white-space: pre;
    }
 
    .link {
        color: #222222;
        text-decoration: none;
        font-weight: 600;
    }
 
    .link:hover,
    .link:active,
    .link:focus {
        color: #5A5A5A;
    }
 
    #ipt_com:hover,
    #ipt_com:active,
    #ipt_com:focus {
        outline: none;
    }
 
    #ipt_com {
        border-bottom-style: solid;
        border-right-style: none;
    }
</style>
 
<script>
    $(document).ready(function(){
                      
        document.getElementById('flag_icon').src = localStorage["country"];
//        $("div.flag h5").text(localStorage["countryID"]);
                      
//        document.querySelectorAll(".uname")[0].innerHTML = localStorage["uname"];
//        document.querySelectorAll(".uname")[1].innerHTML = localStorage["uname"];
        const commentsDOM = $('.comments');
        getComments(commentsDOM);
        $('.add-comment-form').submit((e) => {
                    e.preventDefault();
                    addComment(commentsDOM);
        });
    });

    function encodeHTML(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/'/g, '&quot;');
    }
 
    function addComment(commentsDOM) {
        const Context = $('#ipt_com').val();
        const remindMsg = '<div class="alert alert-danger mt-5" role="alert">Please enter the comment!</div>';
 
        if (Context === '') {
            alert('請輸入留言');
            return;
        }
 
        let newComment = {
            C_ID: localStorage["countryID"],
            U_Name: localStorage["uname"],
            Context,
        };
 
        $.ajax({
                url: 'add_comment.php',
                data: newComment,
                dataType: 'text',
                type: 'POST',
            })
            .done((data) => {
                const result = JSON.parse(data);
                //newComment 沒有留言時間，因為這是後端自動產生的，所以多存一個時間
                newComment.created_at = result;
                appendCommentToDOM(commentsDOM, newComment, false);
                $('#ipt_com').val('');
                $('.alert').remove();
            })
            .fail(err => console.log(err));
    }
 
    function appendCommentToDOM(container, comment, isPrepend) {
        const html = `
            <div class="card m-2" style="color:#222222;">
                <div class="card-body">
                    <div class="card-top d-flex">
                        <h5 class="card-title"><img width="30px" src="./img/user.png">&nbsp;&nbsp;${encodeHTML(comment.U_Name)}</h5>
                        <label  style="margin-left:47%">${comment.created_at}</label>
                    </div>
                    <p class="card-text content">${encodeHTML(comment.Context)}</p>
                    <input hidden value="${comment.id}"/>
                </div>
            </div>`;
        if (isPrepend) {
            container.prepend(html);
        } else {
            container.append(html);
        }
    }
 
    function getCommentsAPI(cb) {
        $.ajax({
                url: 'load_comment.php',
                data: {
                    C_ID: localStorage["countryID"],
                },
                type: 'POST'
            })
            .done(data => cb(data))
            .fail(err => console.log(err));
    }
 
    function getComments(commentsDOM) {
        getCommentsAPI((data) => {
            const comments = JSON.parse(data);
            for (let i = 0; i < comments.length; i += 1) {
                appendCommentToDOM(commentsDOM, comments[i], false);
            }
        });
    }

</script>
 

