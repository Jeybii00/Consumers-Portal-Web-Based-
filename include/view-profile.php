<?php

include '..include/condb.php';


$id = "";
$account_number = "";
$email = "";
$fname = "";
$lname = "";
$address = "";
$contact = "";
$profile_img = "";
$Account_Created = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
   
    if(!isset($_GET["id"])){
        header("location:../dashboard/user_dh.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if(!$row){
        header("location: ../include/view-profile.php");
        exit;
    }
       
        $id = $row['id'];
        $account_number = $row['account_number'];
        $email = $row['email'];
        $lname = $row['lname'];
        $fname = $row['fname'];
        $address = $row['address'];
        $contact = $row['contact'];
        $profile_img = $row['profile_img'];
        $Account_Created = $row['$Account_Created'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Profile</title>

</head>
<body>
    <div class="container my-5">
        <center><h2>Your Profile</h2><br><br></center>

        <form action="" method="post">
            <input type="hidden" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" readonly>
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
                        <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" readonly>
                    </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" readonly>
                    </div>
            </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style = "margin-top:30px;">Profile Image</label>
                    <div class="col-sm-6">
                    <img style = "width:100px; height:100px; border:1px solid red;" src = "../uploaded_files/<?php echo $profile_img; ?>" alt ="">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account Date Created</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Account_Created" value="<?php echo $Account_Created; ?>" readonly>
                    </div>

            <center>
                <br>
            <div class="col-sm-3 d-grid">
                <!--button type="submit" class="btn btn-primary">Submit</button-->
                    </div>
                <div class="col-sm-3 d-grid">
                <br><a class="btn btn-outline-primary" href="../waiver-request/waiver-request.php" role="button">Back</a>
            </div>
            </center>

</form>


</div>

</body>
</html>