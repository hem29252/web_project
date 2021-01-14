<?php
  session_start();
  $status = 0;
  if(isset($_SESSION['iduser'])){
    unset($_SESSION['iduser']);
    $status = 1;
  }

  if($status == 1){
    header("location: ../Login.php");
  }
  
  
?>