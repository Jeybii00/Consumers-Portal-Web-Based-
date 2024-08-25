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
    <title>Reconnection Form</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="forms.css">

</head>

<body>

    <div class="reconnection-container">
        <div class="form">

            <?php
            $qry = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
            if (mysqli_num_rows($qry) > 0) {
                $row = mysqli_fetch_assoc($qry);
                if ($row) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $account_number = $row['account_number'];

                }
            }
            ?>
    
            <center>
                <h3>&nbsp ILOILO ELECTRIC COOPERATIVE, INC. <br> &nbsp &nbsp (ILECO 1)Tigbauan, Iloilo<br></h3><br>
                <h2>&nbsp &nbsp &nbsp Reconnection with Change Name</h2>
            </center><br>


            <form action="../php/reconnection_function.php" method="POST" enctype="multipart/form-data">



                <label><input class="data_upload1 " type="hidden" ID="Name" name="name"
                        value="<?php echo "$fname $lname"; ?>" readonly></label>
                <label><input class="data_upload2 " type="hidden" ID="address" name="address"
                        value="<?php echo "$address"; ?>" readonly></label>

                <h3>Minimum Requirements</h3>
                <p class="req">1. Inspection Report - from ILECO 1;<i class = "ast">&#9913;</i></p><br>
                <input class="file_upload" type="file" id="inspection_report" name="inspection_report" accept="image/*"
                    required><br><br>

                <p class="req">2. Photocopy of <span>valid ID with three(3) specimen signatures of
                        Consumer<i class = "ast">&#9913;</i></span></p><br>
                <input class="file_upload" type="file" id="id_copy" name="id_copy" accept="image/*" required><br><br>

                <p class="req">3. Authorization Letter from consumer;<i class = "ast">&#9913;</i></p><br>
                <input class="file_upload" type="file" id="authorization_copy" name="authorization_copy"
                    accept="image/*" required><br><br>

                <p class="req">4. Settlement of Unpaid Bills - Full Payment or Payment Plan: 50% Down payment,
                    balance for maximum of six(6) months term;<i class = "ast">&#9913;</i></p><br>
                <input class="file_upload" type="file" id="unpaid_bills_copy" name="unpaid_bills_copy" accept="image/*"
                    required><br><br>

                <p class="req">5. Payment of Bill Guarantee Deposit, if no previous record of payment;<i class = "ast">&#9913;</i></p><br>
                <input class="file_upload" type="file" id="previous_payment" name="previous_payment" accept="image/*"
                    required><br><br>

                <p class="reqq"><span>Note: </span>Only applicable if the member is still living. New member
                    shall
                    process at the Main Office and comply the full requirements. (<span class="slant">per BR No.
                        2019-161)</span></p>
                <br>
                <center>
                    <div class="submit">
                        <input type="submit" value="Submit" name="submit" class="button" id="submit">
                        <a href="../php/user_dh.php" class="cancel-btn">Cancel</a>
                    </div>
                </center>
                
            </form>
        </div>
    </div>

</body>

</html>