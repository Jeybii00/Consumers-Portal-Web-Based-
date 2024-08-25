<?php

    session_start();
    include_once '../include/condb.php';
    $account_number = $_POST['account_number'];
    $password = md5($_POST['password']);
    
    if(!empty($account_number) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if($row){
                $_SESSION['account_number'] = $row['account_number'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['otp'] = $row['otp'];
                echo"success";
            }
        }
        else{
            echo "Account No. or Password is Incorrect!";
        }
    }
    else{
        echo "All fields are Required!";
    }
    
 
?>