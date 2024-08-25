<?php

session_start();
include '../include/condb.php';

$error_message = "";
$success_message = "";
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $account_number = $_SESSION['account_number'];
    $email = $_SESSION['email'];
    $image1 = $_FILES['marriage_contract']['name'];
    $image2 = $_FILES['death_certificate']['name'];
    $image3 = $_FILES['valid_id']['name'];
    $status = 'Pending';
    $remark = 'None';
    


    $target_dir = "../uploaded_files/spouse/";
    $target_file1 = $target_dir . basename($image1);
    $target_file2 = $target_dir . basename($image2);
    $target_file3 = $target_dir . basename($image3);


    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));


    $check1 = getimagesize($_FILES['marriage_contract']['tmp_name']);
    $check2 = getimagesize($_FILES['death_certificate']['tmp_name']);
    $check3 = getimagesize($_FILES['valid_id']['tmp_name']);


    $extension1 = substr($image1, strlen($image1) - 4, strlen($image1));
    $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
    $extension3 = substr($image3, strlen($image3) - 4, strlen($image3));


    $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");

    if ($check1 == false || $check2 == false || $check3 == false) {
        echo '<script language="javascript" type="text/javascript">
        alert("Upload jpg or jpeg extension only!");
        window.location = "../forms/spouse.php";
        </script>' . mysqli_error($conn);

    } elseif ($_FILES["marriage_contract"]["size"] > 502400 || $_FILES["death_certificate"]["size"] > 502400 || $_FILES["valid_id"]["size"] > 502400) {
        echo '<script language="javascript" type="text/javascript">
        alert("One or more of the image size is too large, image should be less than 100kb");
        window.location = "../forms/spouse.php";
        </script>' . mysqli_error($conn);

    } else {
        if (file_exists($target_file1) || file_exists($target_file2) || file_exists($target_file3)) {
            echo '<script language="javascript" type="text/javascript">
            alert("One or more file is already exist!");
            window.location = "../forms/spouse.php";
            </script>' . mysqli_error($conn);
        } elseif (!in_array($extension1, $allowed_extensions) || !in_array($extension2, $allowed_extensions) || !in_array($extension3, $allowed_extensions)) {
            echo '<script language="javascript" type="text/javascript">
            alert("One or more file are not an image!");
            window.location = "../forms/spouse.php";
            </script>' . mysqli_error($conn);
        } else {
            move_uploaded_file($_FILES["marriage_contract"]["tmp_name"], $target_file1);
            move_uploaded_file($_FILES["death_certificate"]["tmp_name"], $target_file2);
            move_uploaded_file($_FILES["valid_id"]["tmp_name"], $target_file3);


            $sql = "INSERT INTO spouse_form (account_number, email, name, address, marriage_contract, death_certificate, valid_id,status, remark)
                        VALUES ('$account_number', '$email', '$name', '$address', '$target_file1', '$target_file2', '$target_file3', '$status', '$remark')";
            $result = $conn->query($sql);
            if ($sql) {
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
                if (mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3); //fetching data
                    $_SESSION['account_number'] = $row['account_number'];
                    $_SESSION['email'] = $row['email'];
                    echo '<script language="javascript" type="text/javascript">
                                    alert("Requirements Submitted Successfully!");
                                    window.location = "../php/user_dh.php";
                                    </script>';

                }

            } else {
                echo '<script language="javascript" type="text/javascript">
            alert("Form submission failed!");
            window.location = "../forms/spouse.php";
            </script>' . mysqli_error($conn);
            }

        }
    }
} else {
    echo '<script language="javascript" type="text/javascript">
    alert("All input fields are required!");
    window.location = "../forms/spouse.php";
    </script>';
}

?>