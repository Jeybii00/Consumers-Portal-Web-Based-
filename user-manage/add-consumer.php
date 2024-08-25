<?php
        session_start();
        include_once '../include/condb.php';
        $servername ="localhost";
        $username ="root";
        $password="";
        $dbname="portaldb";
        
        $conn = mysqli_connect($servername,$username,$password,$dbname);

$fname= "";
$lname="";
$email="";
$account_number="";
$contact="";
$password="";
$address="";
$profile_image="";
$verification_status="";
$Role="";



$errorMessage ="";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $email= $_POST["email"];
    $account_number= $_POST["account_number"];
    $contact =$_POST["contact"];
    $password= md5($_POST["password"]);
    $address= $_POST["address"];
    $profile_image= $_POST["profile_image"];
    $verification_status= "Verified";
    $Role= "consumer";

    do{
        if(empty($fname) || empty($lname) || empty($email) || empty($account_number) || empty($password) || empty($address)){
            $errorMessage = "All input fields are required";
            break;        
            }

            //add new consumer
            $sql = "INSERT INTO users (fname, lname, email, account_number, profile_image, contact, password, address, verification_status, Role)
                VALUES ('$fname','$lname','$email','$account_number','$profile_image','$contact','$password','$address','$verification_status','$Role')";
            $result =  mysqli_query($conn,$sql);

            if(!$result){
            $errorMessage ="Error in sql: $sql. " .mysqli_error();
            break;
            }

            $fname= "";
            $lname="";
            $email="";
            $contact="";
            $account_number="";
            $password="";
            $address="";
            $verification_status="";
            $Role="";

            $successMessage = "Client added Succesfully";

            header("location:../user-manage/manageconsumer.php");

    }while(false);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Consumer</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../components/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/stylefont.css" rel="stylesheet" />

</head>
<body>
    <div class="container my-5">
        <center><h2>Add New Consumer</h2><br></center>
        <?php 
        if( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form action="" method="post">
            <div class="row mb-3">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="account_number" value="<?php echo $account_number; ?>" onKeyPress="if(this.value.length==7) return false;">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                    </div>
            </div>

            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="contact" value="<?php echo $contact; ?>" onKeyPress="if(this.value.length==11) return false;">
                    </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" onKeyPress="if(this.value.length==18) return false;">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Profile Image</label>
                    <div class="col-sm-6" id = "icon-logo">
                        <input type="file" class="form-control" name="profile_image" value="<?php echo $profile_image; ?>">
                    </div>
            </div>



            <?php
                if(!empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                    <div class'offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                            <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    </div>
                    </div>
                    ";
                }
            ?>
            <center>
                <br>
            <div class="col-sm-3 d-row">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-outline-primary" href="../user-manage/manageconsumer.php" role="button">Cancel</a>
            </div>
            </center>

</form>


</div>

</body>
</html>