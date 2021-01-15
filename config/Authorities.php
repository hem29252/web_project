<?php
    include('mysql.php');

    $mysql = new mysql();
    $con = $mysql->Connect();

    if(isset($_POST['check_edit_auth'])){
        $checkfile = $_FILES["file"]['name'];
        if(empty($checkfile)){
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $department = $_POST['department'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $query = $mysql->UpdateSixColumn($con,'authorities','FirstName','LastName','Department','Tel','Fax','Email',$fname,$lname,$department,$tel,$fax,$email,'Id',$id);
            if($query){
                header("location: ../Backend01.php");
            }
        }else{

            //file

            $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
            $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
            $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
            $source       = $_FILES["file"]["tmp_name"];
            $destination  = "../resource/images/upload/{$basename}";

            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $department = $_POST['department'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $image = $basename;
            $filenamedelete = $_POST['filename_delete'];

            $query = $mysql->UpdateSevenColumn($con,'authorities','FirstName','LastName','Department','Tel','Fax','Email','image',$fname,$lname,$department,$tel,$fax,$email,$image,'Id',$id);
            $staus = 0;
            if($query){
                move_uploaded_file( $source, $destination );
                unlink("../resource/images/upload/$filenamedelete");
                $status = 1;
            }else{
                $status = 0;
            }

            if($status == 1){
                header("location: ../Backend01.php");
            }

        }
        

    }
    

    if(isset($_POST['view_auth_id'])){
        $id = $_POST['view_auth_id'];
        $query = $mysql->ViewByOneColumn($con,'authorities','Id',$id);
        $result = $query->fetch_assoc();
        echo json_encode($result);
    }

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $image = $_GET['delete_image'];
        $query = $mysql->DeleteById($con,'authorities','Id',$id);
        $status = 0;
        if($query){
            unlink("../resource/images/upload/$image");
            $status = 1;
        }

        if($status = 1){
            header("location: ../Backend01.php");
        }
    }
    
    if(isset($_POST['check_add_auth'])){

        //file
        $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
        $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
        $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
        $source       = $_FILES["file"]["tmp_name"];
        $destination  = "../resource/images/upload/{$basename}";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $department = $_POST['department'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];
            $image = $basename;

        $insert = $mysql->insertOfSevenColumn($con,'authorities','FirstName','LastName','Department','Tel','Fax','Email','image',$fname,$lname,$department,$tel,$fax,$email,$image);

        if($insert){
            move_uploaded_file( $source, $destination );
            header("location: ../Backend01.php");
        }


    }



?>