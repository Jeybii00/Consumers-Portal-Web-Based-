<?php

include_once '../include/condb.php';


$id = "";
$account_number = "";
$email = "";
$name = "";
$address = "";
$asc_esc_img = "";
$notarized_waiver = "";
$valid_id = "";
$death_certificate = "";
$cenomar_img = "";
$valid_signature = "";
$two_two_id = "";
$date_submission = "";
$status = "";
$remark = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location:heir_request.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM heir_form WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        header("location:heir_request.php");
        exit;
    }
    $id = $row["id"];
    $account_number = $row["account_number"];
    $email = $row["email"];
    $name = $row["name"];
    $address = $row["address"];
    $asc_esc_img = $row["asc_esc_img"];
    $notarized_waiver = $row["notarized_waiver"];
    $valid_id = $row["valid_id"];
    $death_certificate = $row["death_certificate"];
    $cenomar_img = $row["cenomar_img"];
    $valid_signature = $row["valid_signature"];
    $two_two_id = $row["2x2_id"];
    $date_submission = $row["date_submission"];
    $status = $row["status"];
    $remark = $row["remark"];
}else{
    $id = $_POST["id"];
    $account_number = $_POST["account_number"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $asc_esc_img = $_POST["asc_esc_img"];
    $notarized_waiver = $_POST["notarized_waiver"];
    $valid_id = $_POST["valid_id"];
    $death_certificate = $_POST["death_certificate"];
    $cenomar_img = $_POST["cenomar_img"];
    $valid_signature = $_POST["valid_signature"];
    $two_two_id = $_POST["2x2_id"];
    $date_submission = $_POST["date_submission"];
    $status = $_POST["status"];
    $remark = $_POST["remark"];

    do {
        if (empty($status)) {
            echo "All input fields are required";
            break;
        }

        $sql = mysqli_query($conn, "UPDATE heir_form SET `status` = '$status' , `remark` = '$remark'  WHERE `account_number` = '$account_number' ");


        if (!$sql) {
            echo "Error in sql: $sql. " . mysqli_error();
            break;
        }

        echo "Updated successfully!";

        header("location: heir_request.php");
        break;

    } while (true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../components/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/stylefont.css" rel="stylesheet" />

    <style>
        #FullImageView {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .9);
            text-align: center;
        }

        #icon-logo img:hover {
            cursor: pointer;
            filter: brightness(70%);
        }

        #FullImage {
            padding: 24px;
            max-width: 98%;
            max-height: 98%;
        }

        #CloseButton {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 2rem;
            color: #ffffff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <center>
            <h2>Manage Consumer's Requirements</h2><br><br>
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
                    <input type="number" class="form-control" name="account_number" value="<?php echo $account_number; ?>"
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
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Submission</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date_submission"
                        value="<?php echo $date_submission; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Notarized Application for Service Connection(ASC) and Electric
                    Service Contract(ESC)</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['asc_esc_img']}';" ?> style="width:210px; height:200px;" alt="Image"
                        onclick="FullView(this.src)">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Notarized Waiver for Change of Account Name</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['notarized_waiver']}';" ?> style="width:210px; height:200px;"
                        alt="Image" onclick="FullView(this.src)">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Photocopy of Valid ID with three(3) specimen signatures</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['valid_id']}';" ?> style="width:210px; height:200px;" alt="Image"
                        onclick="FullView(this.src)">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Photocopy of Death Certificate</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['death_certificate']}';" ?> style="width:210px; height:200px;"
                        alt="Image" onclick="FullView(this.src)">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CENOMAR (Certificate of NoMarriage)</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['cenomar_img']}';" ?> style="width:210px; height:200px;" alt="Image"
                        onclick="FullView(this.src)">
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Photocopy of Valid ID with three(3) specimen signatures</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['valid_signature']}';" ?> style="width:210px; height:200px;" alt="Image"
                        onclick="FullView(this.src)">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">2x2 ID picture</label>
                <div class="col-sm-6" id="icon-logo">
                    <img <?php echo "src = '{$row['2x2_id']}';" ?> style="width:210px; height:200px;" alt="Image"
                        onclick="FullView(this.src)">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Submission Status</label>
                <div class="col-sm-6" id="icon-logo">
                    <select id="status" name="status" class="form-select" style="text-align:center;">
                        <option value="Reviewing"> Select Status Update Here </option>
                        <option value="Pending">Pending</option>
                        <option value="Declined">Declined</option>
                        <option value="Reviewed">Reviewed</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Submission Remarks</label>
                    <div class="col-sm-6" id="icon-logo"> 
                        <select id="remark" name="remark" class = "form-select" style = "text-align:center;">
                            <option value = "Reviewing"> Select Status Remarks Here </option>
                            <option value="(Some Documents are not valid or incorrect)">(Some Documents are not valid or incorrect)</option>
                            <option value="(Documents are correct and valid)">(Documents are correct and valid)</option>
                            <option value="(Documents are ready to processs in nearest ILECO-1)">(Documents are ready to processs in nearest ILECO-1)</option>
                        </select>
                    </div>
            </div>


            <div id="FullImageView">
                <img id="FullImage" />
                <span id="CloseButton" onclick="CloseFullView()">&times;</span>
            </div>

            <script type="text/javascript">
                function FullView(ImgLink) {
                    document.getElementById("FullImage").src = ImgLink;
                    document.getElementById("FullImageView").style.display = "block";
                }

                function CloseFullView() {
                    document.getElementById("FullImageView").style.display = "none";
                }
            </script>

            <center>
                <br>
                <div class="col-sm-3 d-row">
                    <input type="submit" class="btn btn-success" name="submit" value="Update">
                    <a class="btn btn-primary" style = "width:90px;" href="heir_request.php" role="button">Back</a>
                </div>
            </center>

        </form>


    </div>

</body>

</html>