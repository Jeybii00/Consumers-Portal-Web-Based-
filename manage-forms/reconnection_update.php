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
$inspection_report = "";
$id_copy = "";
$authorization_copy = "";
$unpaid_bills_copy = "";
$previous_payment = "";
$date_submission = "";
$status = "";
$remark = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location:../reconnection-request/reconnection-request.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM reconnection_form WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        header("location: ../reconnection-request/reconnection-request.php");
        exit;
    }

    $id = $row['id'];
    $account_number = $row['account_number'];
    $email = $row['email'];
    $name = $row['name'];
    $address = $row['address'];
    $inspection_report = $row['inspection_report'];
    $id_copy = $row['id_copy'];
    $authorization_copy = $row['authorization_copy'];
    $unpaid_bills_copy = $row['unpaid_bills_copy'];
    $previous_payment = $row['previous_payment'];
    $date_submission = $row['date_submission'];
    $status = $row['status'];
    $remark = $row['remark'];

} else {
    $id = $_POST['id'];
    $account_number = $_POST['account_number'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $inspection_report = $_POST['inspection_report'];
    $id_copy = $_POST['id_copy'];
    $authorization_copy = $_POST['authorization_copy'];
    $unpaid_bills_copy = $_POST['unpaid_bills_copy'];
    $previous_payment = $_POST['previous_payment'];
    $date_submission = $_POST['date_submission'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];


    do {
        if (empty($status)) {
            echo "All input fields are required";
            break;
        }

        $sql = mysqli_query($conn, "UPDATE reconnection_form SET `status` = '$status' , `remark` = '$remark' WHERE `account_number` = '$account_number' ");


        if (!$sql) {
            echo "Error in sql: $sql. " . mysqli_error();
            break;
        }

        echo "Updated successfully!";

        header("location: reconnection-request.php");
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
    <link href="../components/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/stylefont.css" rel="stylesheet" />

    <style>
        *{
            font-family: Tilt Neon;
        }

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
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
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

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Inspection Report Copy</label>
                    <div class="col-sm-3" id="icon-logo">
                        <img <?php echo "src = '{$row['inspection_report']}';" ?> style="width:210px; height:200px;"
                            alt="Image" onclick="FullView(this.src)">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Valid ID Copy</label>
                    <div class="col-sm-6" id="icon-logo">
                        <img <?php echo "src = '{$row['id_copy']}';" ?> style="width:210px; height:200px;" alt="Image"
                            onclick="FullView(this.src)">
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Authorization Copy</label>
                    <div class="col-sm-6" id="icon-logo">
                        <img <?php echo "src = '{$row['authorization_copy']}';" ?> style="width:210px; height:200px;"
                            alt="Image" onclick="FullView(this.src)">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Unpaid Bills Copy</label>
                    <div class="col-sm-6" id="icon-logo">
                        <img <?php echo "src = '{$row['unpaid_bills_copy']}';" ?> style="width:210px; height:200px;"
                            alt="Image" onclick="FullView(this.src)">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Previous Payment Bills Copy</label>
                    <div class="col-sm-6" id="icon-logo">
                        <img <?php echo "src = '{$row['previous_payment']}';" ?> style="width:210px; height:200px;"
                            alt="Image" onclick="FullView(this.src)">
                    </div>

                </div>

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Submission Status</label>
                <div class="col-sm-6" id="icon-logo">           
                    <select id="status" name="status" class = "form-select mb-3" style = "text-align:center;">
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
                <div class="col-sm-3 d-grid">
                </div>
                <div class="col-sm-3 d-row" >
                    <input type="submit" class="btn btn-success" name="submit" value="Update">
                    <a class="btn btn-primary" style="width:80px;" href="reconnection-request.php"
                        role="button">Back</a>
                    <br>
                </div>
            </center>

        </form>


    </div>
    
</body>

</html>