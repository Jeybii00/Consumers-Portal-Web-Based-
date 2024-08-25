<?php

include_once '../include/condb.php';


$id = "";
$account_number = "";
$email = "";
$name = "";
$resident_address = "";
$member_number = "";
$favor_name = "";
$reason = "";
$witness_date = "";
$witness_address = "";
$e_signature = "";
$printed_name = "";
$witness1 = "";
$witness2 = "";
$before_date = "";
$person_address = "";
$Date_of_Submission = "";
$status = "";
$remark = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location: waiver-request.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM waiver_form WHERE id= '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        header("location: waiver-request.php");
        exit;
    }
    $id = $row["id"];
    $account_number = $row["account_number"];
    $email = $row["email"];
    $name = $row["name"];
    $resident_address = $row["resident_address"];
    $favor_name = $row["favor_name"];
    $reason = $row["reason"];
    $witness_date = $row["witness_date"];
    $witness_address = $row["witness_address"];
    $e_signature = $row["e_signature"];
    $printed_name = $row["printed_name"];
    $witness1 = $row["witness1"];
    $witness2 = $row["witness2"];
    $before_date = $row["before_date"];
    $person_address = $row["person_address"];
    $Date_of_Submission = $row["Date_of_Submission"];
    $status = $row["status"];
    $remark = $row["remark"];

} else {
    $id = $_POST["id"];
    $account_number = $_POST["account_number"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $resident_address = $_POST["resident_address"];
    $favor_name = $_POST["favor_name"];
    $reason = $_POST["reason"];
    $witness_date = $_POST["witness_date"];
    $witness_address = $_POST["witness_address"];
    $e_signature = $_POST["e_signature"];
    $printed_name = $_POST["printed_name"];
    $witness1 = $_POST["witness1"];
    $witness2 = $_POST["witness2"];
    $before_date = $_POST["before_date"];
    $person_address = $_POST["person_address"];
    $Date_of_Submission = $_POST["Date_of_Submission"];
    $status = $_POST["status"];
    $remark = $_POST["remark"];


    do {
        if (empty($status)) {
            echo "All input fields are required";
            break;
        }

        $sql = mysqli_query($conn, "UPDATE waiver_form SET `status` = '$status' , `remark` = '$remark'  WHERE `account_number` = '$account_number' ");


        if (!$sql) {
            echo "Error in sql: $sql. " . mysqli_error();
            break;
        }

        echo "Updated successfully!";

        header("location: waiver-request.php");
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
                <label class="col-sm-3 col-form-label">First Name</label>
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
                <label class="col-sm-3 col-form-label">Resident Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="resident_address"
                        value="<?php echo $resident_address; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">In Favor of (Name)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="favor_name" value="<?php echo $favor_name; ?>"
                        readonly>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Reason Stated</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="reason" value="<?php echo $reason; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">On this day witness</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="witness_date" value="<?php echo $witness_date; ?>"
                        readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Witness Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="witness_address"
                        value="<?php echo $witness_address; ?>" readonly>
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="margin-top:30px;">Electronic Signature</label>
                <div class="col-sm-6" id="icon-logo">
                    <img src="../uploaded_files/waiver/<?php echo $e_signature; ?>"
                        style="max-width:200px; max-height:200px;" alt="Image" onclick="FullView(this.src)" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Witness Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="witness1" value="<?php echo $witness1; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Second Witness Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="witness2" value="<?php echo $witness2; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Before this day (please refer to the waiver form)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="before_date" value="<?php echo $before_date; ?>"
                        readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address of Requesting Consumer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="person_address" value="<?php echo $person_address; ?>"
                        readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Submission</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Date_of_Submission"
                        value="<?php echo $Date_of_Submission; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Submission Status</label>
                <div class="col-sm-6" id="icon-logo">           
                    <select id="status" name="status" class = "form-select" style = "text-align:center;">
                        <option value = "Reviewing"> Select Status Update Here </option>
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
            <a class="btn btn-primary"  style="width:80px;" href="waiver-request.php" role="button">Back</a>
        </div>
        <br>
    </center>

    </form>


    </div>

</body>

</html>