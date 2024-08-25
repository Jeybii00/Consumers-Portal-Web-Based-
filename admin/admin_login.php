<?php
    include '../include/condb.php';
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    
    if(!empty($ausername) && !empty($apassword)){
        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE ausername = '{$ausername}' AND apassword = '{$apassword}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if($row){
                $ausername = "";
                $apassword = "";
                echo"success";
            }
        }
        else{
            echo "Username or Password is Incorrect!";
        }
    }
    else{
        echo "All fields are Required!";
    }
    
 
?>