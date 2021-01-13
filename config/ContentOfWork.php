<?php
 include('mysql.php');

 $mysql = new mysql();
 $con = $mysql->Connect();

   if(isset($_POST['check_status_edit_contentofwork'])){
       $check_file = $_FILES['file']['name'];
       $id = $_POST['id'];
       if(empty($check_file)){
           $name = $_POST['name'];
           $query = $mysql->UpdateOneColumn($con,'contentofworks','Name',$name,'Id',$id);
           if($query){
            header("location: ../BackPage4.php");
           }
       }else{
           //file
           $filename = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
           $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
           $basename = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
           $source = $_FILES["file"]["tmp_name"];
           $destination = "../resource/pdf/{$basename}";
           //
           $filename_delete = $_POST['delete_file'];
           $name = $_POST['name'];
           $pdf = $basename;
           $status = 0;
           $query = $mysql->UpdateTwoColumn($con,'contentofworks','Name','PDF',$name,$pdf,'Id',$id);
           if($query){
            move_uploaded_file( $source, $destination );
            unlink("../resource/pdf/$filename_delete");
            $status = 1;
           }
           if($status == 1){
            header("location: ../BackPage4.php");
           }
       }
   }

   if(isset($_GET['check_delete_contentofwork_id'])){
    $id = $_GET['check_delete_contentofwork_id'];
    $pdf = $_GET['file_deletename'];
    $query = $mysql->DeleteById($con,'contentofworks','Id',$id);
    $status = 0;
    if($query){
      unlink("../resource/pdf/$pdf");
      $status = 1;
    }
    if($status == 1){
      header("location: ../BackPage4.php");
    }
   }

 
   if(isset($_POST['check_view_contentofwork_id'])){
       $id = $_POST['check_view_contentofwork_id'];
       $query = $mysql->ViewByOneColumn($con,'contentofworks','Id',$id);
       $work = $query->fetch_assoc();
       echo json_encode($work);
   }

   if(isset($_POST['chcek_status_insert_contentofwork'])){
       //file
       $filename = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
       $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
       $basename = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
       $source = $_FILES["file"]["tmp_name"];
       $destination = "../resource/pdf/{$basename}";
       //
       $name = $_POST['name'];
       $work_id = $_POST['work_id'];
       $pdf = $basename;
       $status = 0;

       $query = $mysql->insertThreeColumn($con,'contentofworks','Name','PDF','works_id',$name,$pdf,$work_id);

       if($query){
         move_uploaded_file( $source, $destination );
         $status = 1;
       }

       if($status == 1){
           header("location: ../BackPage4.php");
       }

   }

?>