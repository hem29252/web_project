<?php
   
   include('mysql.php');
   $mysql = new mysql();
   $con = $mysql->Connect();

   if(isset($_POST['check_status_edit_degree'])){
      $id = $_POST['id'];
      $dates = $_POST['dates'];
      $fullname = $_POST['fullname'];
      $degree_name = $_POST['name_degree'];
      $link = $_POST['link'];

      $query = $mysql->UpdateFourColumn($con,'degree','Dates','FullName','DegreeName','link',$dates,$fullname,$degree_name,$link,'Id',$id);

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
      //file
      $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
      $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
      $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
      $source       = $_FILES["file"]["tmp_name"];
      $destination  = "../resource/images/upload/{$basename}";
      
      
      $dates = $_POST['dates'];
      $fullname = $_POST['fullname'];
      $degree_name = $_POST['name_degree'];
      $link = $_POST['link'];
      $image = $basename;
      
      
      $query = $mysql->insertDegree($con,$dates,$fullname,$degree_name,$link,$image);
      
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