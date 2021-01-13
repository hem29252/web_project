<?php
 include('mysql.php');

 $mysql = new mysql();
 $con = $mysql->Connect();


   if(isset($_POST['check_status_edit_work'])){
       $value = $_POST['name'];
       $id = $_POST['id'];
       $query = $mysql->UpdateOneColumn($con,'Works','Name',$value,'Id',$id);
       if($query){
        header("location: ../BackPage4.php");
       }
   }

   if(isset($_POST['chek_view_works_id'])){
       $id = $_POST['chek_view_works_id'];
       $query = $mysql->ViewByOneColumn($con,'Works','Id',$id);
       $work = $query->fetch_assoc();
       echo json_encode($work);
   }

   if(isset($_POST['check_status_add_work'])){
       $value = $_POST['name'];
       $query = $mysql->insertOneColumn($con,'Works','Name',$value);
       if($query){
           header("location: ../BackPage4.php");
       }
   }

   if(isset($_GET['check_delete_id'])){
       $id = $_GET['check_delete_id'];
        
       $qu = $mysql->ViewByOneColumn($con,'contentofworks','works_id',$id);
        
       while($content = $qu->fetch_assoc()){
           $filename = $content['PDF'];
           $deleteContent = $mysql->DeleteById($con,'contentofworks','Id',$content['Id']);
           unlink("../resource/pdf/$filename");
       }

       $query = $mysql->DeleteById($con,'Works','Id',$id);
       
       if($query){
           header("location: ../BackPage4.php");
       }

   }
?>