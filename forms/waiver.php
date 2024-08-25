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
    <title>Waiver for Change Name</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="forms.css">
</head>

<body>

    <?php


    $qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
    if (mysqli_num_rows($qry) > 0) {
        $row = mysqli_fetch_assoc($qry);
        if ($row) {
            $fname = $row['fname'];
            $account_number = $row['account_number'];

        }
    }

    ?>

    <div class="waiver-container">
        <div class="form">

            <?php
            $qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
            if (mysqli_num_rows($qry) > 0) {
                $row = mysqli_fetch_assoc($qry);
                if ($row) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $address = $row['address'];
                }
            }
            ?>

            <div>
                <h3><br>
                    &nbsp &nbsp REPUBLIC OF THE PHILIPPINES &nbsp &nbsp &nbsp &nbsp &nbsp ) <br>
                    &nbsp &nbsp Province of Iloilo &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ):S.S.<br>
                    &nbsp &nbsp Municipality of Tigbauan &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )
                    </h>
            </div>
            <br>
            <div>
                <h2>&nbsp &nbsp WAIVER FOR CHANGE NAME</h2>
            </div>

            <div>
                <p>
                <form action="../php/waiver_function.php" method="POST" enctype="multipart/form-data">
                    <div class="error-text">Error</div>
                    <div class="success-text">Success</div>

                    &nbsp &nbsp &nbsp &nbsp &nbsp I,<input type="text" ID="" class="input-wan" name="name"
                        value="<?php echo "$fname $lname"; ?>" readonly>, of legal age, single/ married/ widow(er) and a
                    resident of
                    <input type="text" ID="" name="resident_address" class="input-wan" value="<?php echo $address; ?>"
                        readonly>, after having been sworn to in accordance with law, do hereby depose and say:

                    <br>
                    <br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp That, I am a member-consumer of Iloilo-1 Electric Coop., Inc.
                    (ILECO-1) with Membership No.
                    and Consumer Account No. <input type="number" ID="" class="input-wan" name="account_number"
                        value="<?php echo $account_number = $_SESSION['account_number']; ?>" readonly> &period;

                    <br>
                    <br>

                    &nbsp &nbsp &nbsp &nbsp &nbsp That, I hereby execute this WAIVER in favor of <input type="text"
                        ID="" name="favor_name" placeholder="full name of previous owner" maxlength="20" required>
                    &period;

                    <br>
                    <br>

                    &nbsp &nbsp &nbsp &nbsp &nbsp That, in view of the foregoing, I hereby execute to waive all my
                    rights, interests, and financial obligations as member-consumer of ILECO-1, due to the following
                    reason(s);

                    <br>
                    <br>

                    &nbsp &nbsp &nbsp &nbsp &nbsp That,<br>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<textarea cols="90" rows="5" ID="holder"
                        placeholder="Please state your reason.." name="reason" class = "reason-box" maxlength="40" required></textarea>

                    <br>
                    <br>

                    &nbsp &nbsp &nbsp &nbsp &nbsp That, I do hereby declare to testify before any Court of Law, as to
                    the truth of the foregoing.

                    <br>
                    <br>

                    &nbsp &nbsp &nbsp &nbsp &nbsp IN WITNESS WHEREOF, I have here unto set my hands this <input
                        type="date" ID="" name="witness_date" required> at
                    <input type="text" ID="" name="witness_address" value="<?php echo $address; ?>" readonly>, Iloilo,
                    Philippines.

                    <br>
                    <br>
                    <br>
                    <p style="text-align:right;"> Attach E-Signature
                        <input type="file" ID="signature" name="e_signature" required /><br><br>
                    <p style="text-align:right;"><input type="text" ID="" name="printed_name" class="input-wan"
                            value="<?php echo "$fname $lname"; ?>" readonly> <br> Signature over Printed Name</p>

                    <br>
                    <p style="text-align:center;">Witness:</p>
                    <p style="text-align:center;"><input type="text" ID="" name="witness1"
                            placeholder="enter full name witness 1"> & <input type="text" ID="" name="witness2"
                            placeholder="enter full name witness 2" required></p>
                    <br>

                    <p style="text-align:center;">CERTIFICATION:</p>
                    &nbsp &nbsp BEFORE ME, this <input type="text" ID="" name="before_date" onfocus="(this.type='date')"
                        onblur="if(!this.value) this.type='text'"> in <input type="text" ID="" name="person_address"
                        class="input-wan" value="<?php echo $address; ?>" readonly>, Philippines, personally appeared
                    the above-named person with his/her valid Identification Cards,
                    known to me to be the same persons who executed the foregoing instrument.
                    That the herein person voluntarily affixed his/her signature and that he/she understood the contents
                    hereof.

                    <br><br>
                    <center>
                        <div class="submit">
                            <input type="submit" value="Submit" class="button" id=submit>
                            <a href = "../php/user_dh.php" class = "cancel-btn">Cancel</a>
                    </center>
            </div>

            </form>
        </div>
    </div>
    </div>

</body>

</html>