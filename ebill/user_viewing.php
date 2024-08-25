<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portaldb";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$id = "";
$account_number = "";
$fname = "";
$lname = "";
$bill_img = "";
$generated_date = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location:../ebill/user_bill.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM bill WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        header("location: ../ebill/user_viewing.php");
        exit;
    }

    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $account_number = $row['account_number'];
    $generated_date = $row['generated_date'];
    $bill_img = $row['bill_img'];


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>Bill Viewing</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');

    *{
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
        font-family: "Tilt Neon";
        box-sizing: border-box;
    }

    input::-webkit-inner-spin-button{
        appearance: none;
    }
    
</style>

<body>
    <div class="go-back" style="background:#454545; padding: 10px 0 10px 50px; list-style:none;">
        <button onclick="location.href='../ebill/user_bill.php' "
            style="color:#C4DFDF; background:green; cursor:pointer; border:5px solid green; border-radius:10px; height:30px;">
            Go Back to dashboard</button>
    </div>

    <div class="col-sm-6" id="icon-logo">
        <embed src="../uploaded_files/bill/<?php echo $bill_img ?>" type="application/pdf" width="100%"
            height="600px" />
    </div>





</body>

</html>