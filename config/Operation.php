<?php
    include('mysql.php');

    $mysql = new mysql();
    $con = $mysql->Connect();

    if(isset($_POST['check_status_edit_operation'])){
        $id = $_POST['id'];
        $value = $_POST['name'];
        $query = $mysql->UpdateOneColumn($con,'operation','Name',$value,'Id',$id);
        if($query){
            header("location: ../BackPage2.php");
        }
    }

    if(isset($_GET['delete_operation_id'])){
        $id = $_GET['delete_operation_id'];
        
        $qu = $mysql->ViewByOneColumn($con,'contentofoperation','operation_id',$id);
        
        while($content = $qu->fetch_assoc()){
            $filename = $content['PDF'];
            $deleteContent = $mysql->DeleteById($con,'contentofoperation','Id',$content['Id']);
            unlink("../resource/pdf/$filename");
        }

        $query = $mysql->DeleteById($con,'operation','Id',$id);
        
        if($query){
            header("location: ../BackPage2.php");
        }
    }


    if(isset($_POST['check_edit_operation_id'])){
        $id = $_POST['check_edit_operation_id'];
        $query = $mysql->ViewByOneColumn($con,'operation','Id',$id);
        $data = $query->fetch_assoc();
        echo json_encode($data);
    }

    if(isset($_POST['check_status_add_operation'])){
        $value = $_POST['name'];
        $query = $mysql->insertOneColumn($con,'operation','Name',$value);
        
        if($query){
            header("location: ../BackPage2.php");
        }
    }

?>

