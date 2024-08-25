<?php
session_start();
include '../include/condb.php';
$account_number = $_SESSION['account_number'];
$email = $_SESSION['email'];
if (empty($account_number)) {
    header("Location: ../php/login.php");
}
$qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
if (mysqli_num_rows($qry) > 0) {
    $row = mysqli_fetch_assoc($qry);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] != 'Verified') {
            header("Location: ../php/verify.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Name</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="forms.css">

</head>
<body>

    <div class="spouse-container">
            <?php 
    
          $qry = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
          if(mysqli_num_rows($qry) > 0){
          $row = mysqli_fetch_assoc($qry);
          if($row){
              $fname = $row['fname'];
              $lname = $row['lname'];
              $email = $row['email'];
              $address = $row['address'];
              $account_number = $row['account_number'];
              }
          }
            ?>

            <form action="../php/spouse_function.php" method="POST" enctype="multipart/form-data">

                        <label><input class = "data_upload1 " type= "hidden" ID="Name" name="name" value = "<?php echo "$fname $lname"; ?>" readonly></label>
                        <label><input class = "data_upload2 " type= "hidden" ID="address" name="address" value = "<?php echo "$address"; ?>" readonly></label>

                <center><h3>Change Account Name <br>From Deceased Member To Spouse</h3></center><br>
                <h3>Minimum Requirements :</h3><br>
                    <li>Photocopy of Marriage Contract<i class = "ast">&#9913;</i></li><br>
                        <input class= "upload_file" type="file" id = "marriage_contract" name="marriage_contract" accept="image/*" required><br><br>

                    <li>Photocopy of Death Certificate<i class = "ast">&#9913;</i></li><br>
                        <input class= "upload_file" type="file" id = "death_certificate" name="death_certificate" accept="image/*" required><br><br>

                    <li>Photocopy of Valid ID with three (3) specimen signatures<i class = "ast">&#9913;</i></li><br>
                        <input class= "upload_file" type="file" id = "valid_id" name="valid_id" accept="image/*" required><br><br><br>


                        <center>
                        <div class="submit">
                            <input type="submit" value="Submit" name="submit" class="button" id="submit">
                            <a href = "../php/user_dh.php" class = "cancel-btn">Cancel</a>
                        </div>
                    </center>
        </form>

    </div>

</body>
</html>