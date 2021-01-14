<?php
   session_start();
   include('mysql.php');
   $mysql = new mysql();
   $con = $mysql->Connect();
   $user = $_POST['username'];
   $pass = $_POST['password'];
   $status = 0;
   $sql = "SELECT * FROM `login` WHERE `username`='$user' AND `password`='$pass'";
   $query = $con->query($sql);
   $login = $query->fetch_assoc();

       if($login['username'] = $user && $login['password'] == $pass){
           
           $_SESSION['iduser'] = $login['Id'];
           
           if(isset($_SESSION['faild_login'])){
               unset($_SESSION['faild_login']);
           }

           $status = 2;

           if($status == 2){
            header("location: ../Backend01.php");
           }

       }else{
        
        $_SESSION['faild_login'] = "รหัสผ่านไม่ถูกต้อง!";
        $status = 1;
        $mysql->CloseDb($con);

        if($status == 1){
            header("location: ../Login.php");
        }

       }



?>