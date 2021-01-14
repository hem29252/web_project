<?php
   
   include('mysql.php');
   $mysql = new mysql();
   $con = $mysql->Connect();

   if(isset($_POST['check_status_edit_degree'])){
      $id = $_POST['id'];
      $dates = $_POST['dates'];
      $fullname = $_POST['fullname'];
      $degree_name = $_POST['name_degree'];

      $query = $mysql->UpdateThreeColumn($con,'degree','Dates','FullName','DegreeName',$dates,$fullname,$degree_name,'Id',$id);

      if($query){
         header("location: ../BackPage3.php");
      }else{
         echo "Error";
      }
            
   }

   if(isset($_GET['check_delete_degree_id'])){
      $id = $_GET['check_delete_degree_id'];
      $query = $mysql->DeleteById($con,'degree','Id',$id);
      
      if($query){
         header("location: ../BackPage3.php");
      }else{
         echo "Error";
      }
   }

   if(isset($_POST['check_status_add_degree'])){
      $dates = $_POST['dates'];
      $fullname = $_POST['fullname'];
      $degree_name = $_POST['name_degree'];
      //echo $degree_name;
      
      $query = $mysql->insertDegree($con,$dates,$fullname,$degree_name);
      
      if($query){
         header("location: ../BackPage3.php");
      }else{
         echo "Error";
      }

   }

   if(isset($_POST['check_view_edit_id'])){
      $id = $_POST['check_view_edit_id'];
      $query = $mysql->ViewByOneColumn($con,'degree','Id',$id);
      $data = $query->fetch_assoc();
      echo json_encode($data);
   }


?>