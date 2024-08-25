<?php

include_once '../include/condb.php';
session_start();
$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];
$otp = $otp1.$otp2.$otp3.$otp4;
$account_number = $_SESSION['account_number'];
$session_otp = $_SESSION['otp'];

if(!empty($otp)){
    if($otp == $session_otp){
        $sql = mysqli_query($conn , "SELECT * FROM users WHERE account_number = '{$account_number}' AND otp = '{$otp}'");
        if(mysqli_num_rows($sql) > 0 ){ //if account_number and session otp match
            $null_otp = 0; //so set the otp value to '0' meaning verified user
            $sql2 = mysqli_query($conn, "UPDATE users SET `verification_status` = 'Verified', `otp` = '$null_otp' WHERE account_number = '{$account_number}'");
            if($sql2){
                $row = mysqli_fetch_assoc($sql);
                if($row){
                    $_SESSION['account_number'] = $row['account_number'];
                    $_SESSION['verification_status'] = $row['verification_status'];
                    echo "success";
                }
            }
        }
    }
    else{
        echo "Wrong OTP!";
    }
}

else{
    echo "Enter OTP!";
}



?>