<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portaldb";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$id = "";
$account_number = "";
$email = "";
$contact = "";
$name = "";
$feedback_msg = "";
$date_submission = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location:../manage-concerns/waiver_concerns.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM concerns WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        header("location: ../manage-concerns/view_concerns.php");
        exit;
    }

    $id = $row['id'];
    $account_number = $row['account_number'];
    $email = $row['email'];
    $contact = $row['contact'];
    $name = $row['name'];
    $feedback_msg = $row['feedback_msg'];
    $date_submission = $row['date_submission'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerns</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../css/stylefont.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container my-5">
        <center>
            <h2 style="font-weight:bold;">Manage Consumer's Concerns</h2><br>
        </center>

        <form action="" method="post">
            <input type="hidden" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="account_number" value="<?php echo $account_number; ?>"
                        readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="contact" value="<?php echo $contact; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-6">
                    <textarea name="feedback_msg" id="msg" class="form-control" cols="70" rows="5"
                        readonly><?php echo htmlspecialchars($feedback_msg); ?></textarea>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Submission</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date_submission"
                        value="<?php echo $date_submission; ?>" readonly>
                </div>
            </div>

            <center>
                <br>
                <div class="col-sm-3 d-grid">
                </div>
                <div class="col-sm-3 d-grid">
                    <br><a class="btn btn-primary" style ="width:90px;" href="../manage-forms/view_concerns.php"
                        role="button">Back</a>
                </div>
            </center>

        </form>


    </div>

</body>

</html>