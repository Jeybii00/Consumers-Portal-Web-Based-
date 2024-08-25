<?php
session_start();
include_once '../include/condb.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$account_number = $_POST['account_number'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = md5($_POST['password']); //secure password
$cpassword = md5($_POST['cpassword']);
$address = $_POST['address'];
$Role = 'consumer';
$verification_status = '0';

//checking input field are not empty
if (!empty($fname) && !empty($lname) && !empty($account_number) && !empty($email) && !empty($contact) && !empty($password) && !empty($cpassword) && !empty($address)) {
        //check if email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //checking email is already exists!
                $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
                if (mysqli_num_rows($sql) > 0) {
                        echo "$email ~ Already Exist    ";
                }
                if (filter_var($account_number, FILTER_VALIDATE_INT)) {
                        //checking account number is already exists!
                        $lsq = mysqli_query($conn, "SELECT account_number FROM users WHERE account_number = '{$account_number}' ");
                        if (mysqli_num_rows($lsq) > 0) {
                                echo "$account_number ~ Account Number is Already Exist   ";
                        } else {
                                //checking password and confirm password match
                                if ($password == $cpassword) {
                                        //let's check user upload file or not
                                        if (isset($_FILES['profile_image'])) {
                                                $img_name = $_FILES['profile_image']['name']; //getting image name
                                                $img_typ = $_FILES['profile_image']['type']; //getting image type
                                                $tmp_name = $_FILES['profile_image']['tmp_name'];
                                                $img_explode = explode('.', $img_name);
                                                $img_extension = end($img_explode);
                                                $extension = ['png', 'jpeg', 'jpg']; //these are some valid image extensions

                                                if (in_array($img_extension, $extension) === true) {
                                                        $time = time();
                                                        $newimagename = $time . $img_name; //create a unique image name
                                                        if (move_uploaded_file($tmp_name, "../uploaded_files/" . $newimagename)) //set the uploaded file store folder
                                                        {
                                                                $otp = mt_rand(1111, 9999); //creating a 4 digits otp code

                                                                //Inserting data into table
                                                                $sql2 = mysqli_query($conn, "INSERT INTO users (fname, lname, account_number, email, contact, password, address ,profile_image, otp, verification_status, Role)
                                                        VALUES ('{$fname}','{$lname}','{$account_number}','{$email}','{$contact}','{$password}','{$address}','{$newimagename}','{$otp}','{$verification_status}','{$Role}')");
                                                                if ($sql2) {
                                                                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                                                        if (mysqli_num_rows($sql3) > 0) {
                                                                                $row = mysqli_fetch_assoc($sql3); //fetching data
                                                                                $_SESSION['account_number'] = $row['account_number'];
                                                                                $_SESSION['email'] = $row['email'];
                                                                                $_SESSION['otp'] = $row['otp'];


                                                                                //mail function starts

                                                                                if ($otp) {
                                                                                        $receiver = $email;
                                                                                        $subject = "From: $fname <$email>";
                                                                                        $body = "Name: " . "$fname $lname \n Email: " . " $email \n Otp: " . "$otp";
                                                                                        $sender = "From: vesperxing02@gmail.com";

                                                                                        if (mail($receiver, $subject, $body, $sender)) {
                                                                                                echo "Success";
                                                                                        } else {
                                                                                                echo "Email Problem!" . mysqli_error($conn);
                                                                                        }
                                                                                }
                                                                                //mail function end here
                                                                        }
                                                                } else {
                                                                        echo "Something Went Wrong!";
                                                                }
                                                        }
                                                } else {
                                                        echo "Please Select an Profile Image - JPG, PNG, JPEG format!";
                                                }
                                        } else {
                                                echo "Please Select an Profile Image";
                                        }
                                } else {
                                        echo "Password does not match!";
                                }
                        }

                } else {
                        echo "$account_number ~ Invalid Account Number!!";
                }

        } else {
                echo "$email ~ Invalid Email!!";
        }

} else {
        echo "All input fields are required!";
}





?>