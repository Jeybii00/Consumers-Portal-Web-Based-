<?php

        $servername ="localhost";
        $username ="root";
        $password="";
        $dbname="portaldb";
        
        $conn = mysqli_connect($servername,$username,$password,$dbname);


$id = "";
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

if($_SERVER['REQUEST_METHOD'] == 'GET'){
   
    if(!isset($_GET["id"])){
        header("location:../user-manage/manageconsumer.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if(!$row){
        header("location: ../user-manage/manageconsumer.php");
        exit;
    }
       
        $fname= $row["fname"];
        $lname= $row["lname"];
        $email= $row["email"];
        $account_number= $row["account_number"];
        $contact= $row["contact"];
        $password= $row["password"];
        $address= $row["address"];
        $profile_image= $row["profile_image"];
        $verification_status= $row["verification_status"];
        $Role= $row["Role"];

}
else{
        
        $fname= $_POST["fname"];
        $lname= $_POST["lname"];
        $email= $_POST["email"];
        $account_number= $_POST["account_number"];
        $contact =$_POST["contact"];
        $password= md5($_POST["password"]);
        $address= $_POST["address"];
        $profile_image= $_POST["profile_image"];
        $verification_status= $_POST["verification_status"];
        $Role= $_POST["Role"];

        do{
            if(empty($id) || empty($fname) || empty($lname) || empty($email) || empty($account_number)  || empty($password) || empty($address) || empty($profile_image) || empty($verification_status) || empty($Role)){
                $errorMessage = "All input fields are required";
                break;
            }

            $sql = "UPDATE users ".
            "SET fname = '$fname', lname = '$lname', email='$email', account_number='$account_number', password='$password', address='$address', profile_image ='$profile_image', verification_status ='$verification_status', Role='$Role' " .
            "WHERE id = $id";

            $result =  mysqli_query($conn,$sql);

            
             if(!$result){
                $errorMessage ="Error in sql: $sql. " . mysqli_error();
                break;
            }

            $successMessage = "Consumer's data is updated successfully!";

            header("location: ../user-manage/manageconsumer.php");
            break;

        }while(true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Consumer's Information</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../components/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/stylefont.css" rel="stylesheet" />
    <style>
        #FullImageView{
            display:none;
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background-color:rgba(0, 0, 0, .9);
            text-align:center;
        }

        #icon-logo img:hover{
                cursor:pointer;
                filter:brightness(70%);
        }

        #FullImage{
            padding:24px;
            max-width:98%;
            max-height:98%;
            margin-top:20%;

        }

        #CloseButton{
            position:absolute;
            top:12px;
            right:12px;
            font-size:2rem;
            color:#ffffff;
            cursor:pointer;
        }

    </style>
</head>
<body>
    <div class="container my-5">
        <center><h2>View Consumer's Information</h2><br><br></center>
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
            <input type="hidden" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="account_number" value="<?php echo $account_number; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" readonly>
                    </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact</label>
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

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Profile Image</label>
                    <div class="col-sm-6" id = "icon-logo">
                        <img src = "../uploaded_files/<?php echo $profile_image;?>" style = "width:100px; height:100px;" onclick= "FullView(this.src)">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Verification Status</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="verification_status" value="<?php echo $verification_status; ?>" readonly>
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Role" value="<?php echo $Role; ?>" readonly>
                    </div>
            </div>
            
            <div id = "FullImageView">
                <img id = "FullImage"/>
                <span id = "CloseButton" onclick = "CloseFullView()">&times;</span>
            </div>

            <script type = "text/javascript">
                    function FullView(ImgLink){
                       document.getElementById("FullImage").src = ImgLink;
                       document.getElementById("FullImageView").style.display = "block";
                    }

                    function CloseFullView(){
                        document.getElementById("FullImageView").style.display = "none";
                    }
            </script>


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
            <div class="col-sm-3 d-grid">
                    </div>
                <div class="col-sm-3 d-grid">
                <br><a class="btn btn-success" href="../user-manage/manageconsumer.php" role="button">Back</a>
            </div>
            </center>

</form>


</div>

</body>
</html>