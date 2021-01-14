<?php

  class mysql {
    public function Connect(){
        $con=mysqli_connect("178.128.91.86", "user", "test","myDb");
        $con->query("SET NAMES UTF8");
        return $con;       
     }

     public function CloseDb($con){
      $con->close();
     }

    public function FetchStarData($con,$table){
        $sql = "SELECT * FROM $table";
        $query = $con->query($sql);
        return $query;
    }

    public function FetchStarDataOrderByDESC($con,$table,$column){
      $sql = "SELECT * FROM $table ORDER BY $column DESC";
      $query = $con->query($sql);
      return $query;
  }

    public function ViewByOneColumn($con,$table,$column,$value){
      $sql = "SELECT * FROM $table WHERE $column = '$value'";
      $query = $con->query($sql);
      return $query;
    }

    public function UpdateOneColumn($con,$table,$column,$value,$where,$id){
      $sql = "UPDATE $table SET $column = '$value' WHERE $where = '$id'";
      $query = $con->query($sql);
      return $query;
    }

    public function UpdateTwoColumn($con,$table,$column1,$column2,$value1,$value2,$where,$id){
      $sql = "UPDATE $table SET $column1 = '$value1', $column2 = '$value2' WHERE $where = '$id'";
      $query = $con->query($sql);
      return $query;
    }   
    
    public function UpdateThreeColumn($con,$table,$column1,$column2,$column3,$value1,$value2,$value3,$where,$id){
      $sql = "UPDATE $table SET $column1 = '$value1', $column2 = '$value2', $column3 = '$value3' WHERE $where = '$id'";
      $query = $con->query($sql);
      return $query;
    }

    public function UpdateFourColumn($con,$table,$column1,$column2,$column3,$column4,$value1,$value2,$value3,$value4,$where,$id){
      $sql = "UPDATE $table SET $column1 = '$value1', $column2 = '$value2', $column3 = '$value3' , $column4 = '$value4' WHERE $where = '$id'";
      $query = $con->query($sql);
      return $query;
    }

    public function UpdateSixColumn($con,$table,$column1,$column2,$column3,$column4,$column5,$column6,$value1,$value2,$value3,$value4,$value5,$value6,$where,$id){
      $sql = "UPDATE $table SET $column1 = '$value1', $column2 = '$value2', $column3 = '$value3', $column4 = '$value4', $column5 = '$value5', $column6 = '$value6' WHERE $where = '$id' ";
      $query = $con->query($sql);
      return $query;
    }

    public function UpdateSevenColumn($con,$table,$column1,$column2,$column3,$column4,$column5,$column6,$column7,$value1,$value2,$value3,$value4,$value5,$value6,$value7,$where,$id){
      $sql = "UPDATE $table SET $column1 = '$value1', $column2 = '$value2', $column3 = '$value3', $column4 = '$value4', $column5 = '$value5', $column6 = '$value6', $column7 = '$value7' WHERE $where = '$id' ";
      $query = $con->query($sql);
      return $query;
    }


    public function insertOfSevenColumn($con,$table,$column1,$column2,$column3,$column4,$column5,$column6,$column7,$value1,$value2,$value3,$value4,$value5,$value6,$value7){
      $sql = "INSERT INTO `$table` (`$column1`, `$column2`, `$column3`, `$column4`, `$column5`, `$column6`, `$column7`) VALUES ('$value1', '$value2', '$value3', '$value4', '$value5', '$value6', '$value7') ";
      $query = $con->query($sql);
      return $query;
    }

    public function insertOneColumn($con,$table,$column,$value){
      $sql = "INSERT INTO `$table` (`$column`) VALUES ('$value')";
      $query = $con->query($sql);
      return $query;
    }

    public function insertThreeColumn($con,$table,$column1,$column2,$column3,$value1,$value2,$value3){
      $sql = "INSERT INTO `$table` (`$column1`,`$column2`,`$column3`) VALUES ('$value1','$value2',$value3)";
      $query = $con->query($sql);
      return $query;
    }

    public function DeleteById($con,$table,$column,$value){
      $sql = "DELETE FROM `$table` WHERE `$table`.`$column` = $value";
      $rs = $con->query($sql);
      return $rs;
    }

    public function insertDegree($con,$value1,$value2,$value3,$value4){
      $sql = "INSERT INTO `degree` (`Id`, `Dates`, `FullName`, `DegreeName`, `link`) VALUES (NULL, '$value1', '$value2', '$value3','$value4');";
      $rs = $con->query($sql);
      return $rs;  
    }

    
  }
?>