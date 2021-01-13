<?php
   session_start();
   include('config/mysql.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Suranaree</title>
        <link rel="shortcut icon" href="resource/images/icon.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body style="background-image: url('./resource/images/sut.jpg'); background-repeat: no-repeat; background-attachment: fixed;  background-size: cover;">
     <div class="container">
      <div class="col-md-5 m-auto">
       <div class="card mt-5" style="border: solid 1px #f26522;">
        <div class="card-header " style="background-color:#f26522;"><h3 class="text-white text-center">เข้าสู่ระบบ</h3></div>
        <div class="card-body">
         <form action="config/login.php" method="POST">
          <div class="form-group">
           <input type="text" name="username" placeholder="ชื่อบัญชี" class="form-control w-100 " style="background-color:#FFF6E6; font-size: 18px; border: solid 1px #f26522;"/>
          </div>
          <div class="form-group">
           <input type="password" name="password" placeholder="รหัสผ่าน" class="form-control w-100" style="background-color:#FFF6E6; font-size: 18px; border: solid 1px #f26522;"/>
          </div>
          <div class="form-group">
           <?php
             if(isset($_SESSION['faild_login'])){
                 echo '<p class="text-danger">'.$_SESSION['faild_login'].'</p>';
             }
           ?>
           <input type="submit" value="เข้าสู่ระบบ" class="btn btn-block text-white btn-primary" style=" font-size:20px;" />
          </div>
         </form>
        </div>
       </div>
      </div> 
     </div>
    </body>
</html> 
