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

    <div class="heir-container">
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

                <form action="../php/owner_function.php" method="POST" enctype="multipart/form-data">

                    <label><input class="data_upload1 " type="hidden" ID="Name" name="name"
                            value="<?php echo "$fname $lname"; ?>" readonly></label>
                    <label><input class="data_upload2 " type="hidden" ID="address" name="address"
                            value="<?php echo "$address"; ?>" readonly></label>

                    <center>
                        <h2>Change Account Name to Heir/New Owner</h2><br><br>
                    </center>

                    <h3 class = "reg-txt">Minimum Requirements:</h3>
                    <p class="new">1.) Notarized Application for Service Connection(ASC) and Electric Service Contract(ESC)<i class = "ast">&#9913;</i>
                    </p><br>
                    <input class="file_upload" type="file" name="asc_esc_img" required><br><br>

                    <p class="new">2.) Notarized Waiver for Change of Account Name<i class = "ast">&#9913;</i></p><br>
                    <input class="file_upload" type="file" name="notarized_waiver" required><br><br>

                    <p class="new">3.) Photocopy of Valid ID with three(3) specimen signatures of the current account holder<i class = "ast">&#9913;</i>
                    </p><br>
                    <input class="file_upload" type="file" name="valid_id" required><br><br>

                    <p class="new">4.) Photocopy of Death Certificate<i class = "ast">&#9913;</i></p><br>
                    <input class="file_upload" type="file" name="death_certificate" required><br><br>

                    <br>

                    <label><input class="data_upload1 " type="hidden" ID="Name" name="name"
                            value="<?php echo "$fname $lname"; ?>" readonly></label>
                    <label><input class="data_upload2 " type="hidden" ID="address" name="address"
                            value="<?php echo "$address"; ?>" readonly></label>

                    <h2>If Applicant is Single</h2><br>
                    <h3 class = "reg-txt">Minimum Requirements:</h3><br>
                    <p class="new">1.)CENOMAR (Certificate of NoMarriage)<i class = "ast">&#9913;</i></p><br>
                    <input class="file_upload" type="file" name="cenomar_img" required><br><br>

                    <p class="new">2.) Photocopy of Valid ID with three(3) specimen signatures<i class = "ast">&#9913;</i></p><br>
                    <input class="file_upload" type="file" name="valid_signature" required><br><br>

                    <p class="new">3.) 2x2 ID picture (one piece only)<i class = "ast">&#9913;</i></p><br>
                    <input class="file_upload" type="file" name="2x2_id" required><br><br>

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