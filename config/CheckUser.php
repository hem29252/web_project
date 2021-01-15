<?php
   session_start();

   if(empty($_SESSION['iduser'])){
       //die("ยังไม่ได้ล็อกอิน!!");
       header("location: index.php");
   }

?>