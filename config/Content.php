<?php
      include('mysql.php');
      $mysql = new mysql();
      $con = $mysql->Connect();


      if(isset($_POST['check_status_edit_content'])){
        $check_file = $_FILES['file']['name'];
        if(empty($check_file)){
          $id = $_POST['id'];
          $value = $_POST['name'];
          $query = $mysql->UpdateOneColumn($con,'contentofoperation','Name',$value,'Id',$id);
          if($query){
            header("location: ../BackPage2.php");
          }
        }else{
          //file
          $filename = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
          $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
          $basename = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
          $source = $_FILES["file"]["tmp_name"];
          $destination = "../resource/pdf/{$basename}";
          //

          $delete = $_POST['delete_file'];
          $id = $_POST['id'];
          $value = $_POST['name'];
          $pdf = $basename;
          $query = $mysql->UpdateTwoColumn($con,'contentofoperation','Name','PDF',$value,$pdf,'Id',$id);
          $status = 0;

          if($query){
            move_uploaded_file( $source, $destination );
            unlink("../resource/pdf/$delete");
            $status = 1;
          }

          if($status == 1){
            header("location: ../BackPage2.php");
          }

        }
      }

      if(isset($_GET['delete_content_id'])){
        $id = $_GET['delete_content_id'];
        $pdf = $_GET['filename_delete'];
        $query = $mysql->DeleteById($con,'contentofoperation','Id',$id);
        $status = 0;
        if($query){
          unlink("../resource/pdf/$pdf");
          $status = 1;
        }
        if($status == 1){
          header("location: ../BackPage2.php");
        }

      }

      if(isset($_POST['check_edit_content_id'])){
        $id = $_POST['check_edit_content_id'];
        $query = $mysql->ViewByOneColumn($con,'contentofoperation','Id',$id);
        $data = $query->fetch_assoc();
        echo json_encode($data);
     }

     if(isset($_POST['chcek_status_insert_content'])){

        //file
        $filename = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
        $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
        $basename = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
        $source = $_FILES["file"]["tmp_name"];
        $destination = "../resource/pdf/{$basename}";
        
        $operation_id = $_POST['operation_id'];
        $name = $_POST['name'];
        $pdf = $basename ;
        
        $query = $mysql->insertThreeColumn($con,'contentofoperation','Name','PDF','operation_id',$name,$pdf,$operation_id);
        $status = 0;
        if($query){
          move_uploaded_file( $source, $destination );
          $status = 1;
        }

        if($status == 1){
          header("location: ../BackPage2.php");
        }
     }


?>