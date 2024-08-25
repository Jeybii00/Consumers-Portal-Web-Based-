<?php

session_start();
include '../include/condb.php';
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $account_number = $_SESSION['account_number'];
    $email = $_SESSION['email'];
    $image1 = $_FILES['inspection_report']['name'];
    $image2 = $_FILES['id_copy']['name'];
    $image3 = $_FILES['authorization_copy']['name'];
    $image4 = $_FILES['unpaid_bills_copy']['name'];
    $image5 = $_FILES['previous_payment']['name'];
    $status = 'Pending';
    $remark = 'None';


    $target_dir = "../uploaded_files/reconnection/";
    $target_file1 = $target_dir . basename($image1);
    $target_file2 = $target_dir . basename($image2);
    $target_file3 = $target_dir . basename($image3);
    $target_file4 = $target_dir . basename($image4);
    $target_file5 = $target_dir . basename($image5);


    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
    $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
    $imageFileType5 = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));


    $check1 = getimagesize($_FILES['inspection_report']['tmp_name']);
    $check2 = getimagesize($_FILES['id_copy']['tmp_name']);
    $check3 = getimagesize($_FILES['authorization_copy']['tmp_name']);
    $check4 = getimagesize($_FILES['unpaid_bills_copy']['tmp_name']);
    $check5 = getimagesize($_FILES['previous_payment']['tmp_name']);


    $extension1 = substr($image1, strlen($image1) - 4, strlen($image1));
    $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
    $extension3 = substr($image3, strlen($image3) - 4, strlen($image3));
    $extension4 = substr($image4, strlen($image4) - 4, strlen($image4));
    $extension5 = substr($image5, strlen($image5) - 4, strlen($image5));


    $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");

    if ($check1 == false || $check2 == false || $check3 == false || $check4 == false || $check5 == false) {
        echo '<script language="javascript" type="text/javascript">
        alert("Upload png, jpeg, jpg and gif only image format!");
        window.location = "../forms/reconnection.php";
        </script>' . mysqli_error($conn);
    } elseif ($_FILES["inspection_report"]["size"] > 502400 || $_FILES["id_copy"]["size"] > 502400 || $_FILES["authorization_copy"]["size"] > 502400 || $_FILES["unpaid_bills_copy"]["size"] > 502400 || $_FILES["previous_payment"]["size"] > 502400) {
        echo '<script language="javascript" type="text/javascript">
        alert("One or more of the image size is too large, image should be less than 100kb");
        window.location = "../forms/reconnection.php";
        </script>' . mysqli_error($conn);
    } else {
        if (file_exists($target_file1) || file_exists($target_file2) || file_exists($target_file3) || file_exists($target_file4) || file_exists($target_file5)) {
            echo '<script language="javascript" type="text/javascript">
            alert("One or more file are already exist!");
            window.location = "../forms/reconnection.php";
            </script>' . mysqli_error($conn);
        } elseif (!in_array($extension1, $allowed_extensions) || !in_array($extension2, $allowed_extensions) || !in_array($extension3, $allowed_extensions) || !in_array($extension4, $allowed_extensions) || !in_array($extension5, $allowed_extensions)) {
            echo '<script language="javascript" type="text/javascript">
            alert("One or more file are not an image!");
            window.location = "../forms/reconnection.php";
            </script>' . mysqli_error($conn);
        } else {
            move_uploaded_file($_FILES["inspection_report"]["tmp_name"], $target_file1);
            move_uploaded_file($_FILES["id_copy"]["tmp_name"], $target_file2);
            move_uploaded_file($_FILES["authorization_copy"]["tmp_name"], $target_file3);
            move_uploaded_file($_FILES["unpaid_bills_copy"]["tmp_name"], $target_file4);
            move_uploaded_file($_FILES["previous_payment"]["tmp_name"], $target_file5);

            $sql = "INSERT INTO reconnection_form (account_number, email, name, address, inspection_report, id_copy, authorization_copy, unpaid_bills_copy, previous_payment,status,remark)
                        VALUES ('$account_number', '$email', '$name', '$address', '$target_file1', '$target_file2', '$target_file3', '$target_file4', '$target_file5', '$status', '$remark')";
            $result = $conn->query($sql);
            if ($sql) {
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
                if (mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3); //fetching data
                    $_SESSION['account_number'] = $row['account_number'];
                    $_SESSION['email'] = $row['email'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $address = $row['address'];
                    echo '<script language="javascript" type="text/javascript">
                                    alert("Requirements Submitted Successfully!");
                                    window.location = "../php/user_dh.php";
                                    </script>';
                    //header('Location: ../forms/reconnection.php');
                    // or die();
                    //exit();

                }

            } else {
                echo '<script language="javascript" type="text/javascript">
            alert("Form Submission Failed!");
            window.location = "../forms/reconnection.php";
            </script>' . mysqli_error($conn);
            }

        }
    }
} else {
    echo '<script language="javascript" type="text/javascript">
    alert("All input fields are required!");
    window.location = "../forms/reconnection.php";
    </script>' . mysqli_error($conn);
}

?>