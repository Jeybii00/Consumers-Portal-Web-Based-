<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/stylefont.css" rel="stylesheet" />
    <link href="../css/ebill.css" rel="stylesheet" />
    <title>Bill Uploading</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
</head>


<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portaldb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);


    $id = "";
    $account_number = "";
    $email = "";
    $name = "";
    $address = "";
    $bill_generated = "";



    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (!isset($_GET["id"])) {
            header("location:../ebill/add-bill.php");
            exit;
        }
        $id = $_GET["id"];

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if (!$row) {
            header("location: ../ebill/bill-section.php");
            exit;
        }

        $id = $row['id'];
        $account_number = $row['account_number'];
        $email = $row['email'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $address = $row['address'];

    }
    ?>

    <div class="bill-container">

        <form action="generate_bill.php" method="POST" enctype="multipart/form-data">


            <label>Upload Bill</label>
            <br>
            <p>First Name:</p>
            <p class="inputs"><input type="text" name="fname" value="<?php echo $fname ?>" placeholder="enter full name"
                    readonly></p>
            <br>

            <p>Last Name:</p>
            <p class="inputs"><input type="text" name="lname" value="<?php echo $lname ?>" placeholder="enter full name"
                    readonly></p>
            <br>

            <p>Account Number :</p>
            <p class="inputs"><input type="number" name="account_number" value="<?php echo $account_number ?>"
                    placeholder="enter full name" readonly></p>
            <br>

            <p>Address:</p>
            <p class="inputs"><input type="text" name="address" value="<?php echo $address ?>"
                    placeholder="enter full name" readonly></p>
            <br>


            <p>Bill Month Period<i class="ast">&#9913;</i></p>
            <select input type="text" name="month_period">
                <option>Select a month</option>
                <option>January 2023</option>
                <option>February 2023</option>
                <option>March 2023</option>
                <option>April 2023</option>
                <option>May 2023</option>
                <option>June 2023</option>
                <option>July 2023</option>
                <option>August 2023</option>
                <option>September 2023</option>
                <option>October 2023</option>
                <option>November 2023</option>
                <option>December 2023</option>
            </select>

            <br><br>
            <div class="add_bill">
                <p>Upload Bill <i class="ast">&#9913;</i></p>
                <input class="upload-bill " type="file" name="bill_img" required>


                <br><br>
                <div class="submit">
                    <center><input type="submit" value="Upload" class="button">
                        <a class="cancel-btn" href="../ebill/add-bill.php">Cancel</a>
                    </center>
                </div><br>
            </div>
        </form>
    </div>


</body>

</html>