<?php
    session_start();
    include '../include/condb.php';
    $account_number = $_SESSION['account_number'];
    if(empty($account_number)){
        header ("Location: ../php/login.php");
    }
    $qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
    if(mysqli_num_rows($qry) > 0){
        $row = mysqli_fetch_assoc($qry);
        if($row){
            $_SESSION['verification_status'] = $row ['verification_status'];
            if($row['verification_status'] == 'Verified'){
                header ("Location: ../php/homepage.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="../css/verify.css">
</head>
<body>

    <div class="container">
       <center><h2 style="font-size:40px; margin-top: -5%;">Verify Your Account</h2>
        <p style="font-size: 20px;">We emailed you the four digit otp code, to proceed please enter the correct otp..</p></center>
        <form action="" autocomplete="off">
            <div class="error-text">Error</div>
            <div class="fields-input">
                <input type="number" name="otp1" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp2" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp3" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
                <input type="number" name="otp4" class="otp_field" placeholder="0" min="0" max="9" required onpaste="false">
            </div>
            <div class="submit">
                <input type="submit" value="Verify Now" class="button">
            </div>
        </form>
    </div>
    <script src="../js/verify.js"></script>
</body>
</html>