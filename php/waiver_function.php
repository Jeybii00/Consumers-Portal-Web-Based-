<?php

session_start();
include '../include/condb.php';

$email = $_SESSION['email'];
$name = $_POST['name'];
$resident_address = $_POST['resident_address'];
$account_number = $_SESSION['account_number'];
$favor_name = $_POST['favor_name'];
$reason = $_POST['reason'];
$witness_date = date('Y-m-d', strtotime($_POST['witness_date']));
$witness_address = $_POST['witness_address'];
$printed_name = $_POST['printed_name'];
$witness1 = $_POST['witness1'];
$witness2 = $_POST['witness2'];
$before_date = date('Y-m-d', strtotime($_POST['before_date']));
$person_address = $_POST['person_address'];
$status ='Pending';
$remark ='None';

if (
    !empty($favor_name) && !empty($reason) && !empty($witness_date) && !empty($witness1)
    && !empty($witness2) && !empty($person_address) && !empty($before_date)
) {

    if (isset($_FILES['e_signature'])) {
        $img_name = $_FILES['e_signature']['name']; //getting image name
        $img_typ = $_FILES['e_signature']['type']; //getting image type
        $tmp_name = $_FILES['e_signature']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_extension = end($img_explode);
        $extension = ['png', 'jpeg', 'jpg']; //these are some valid image extensions

        if (in_array($img_extension, $extension) === true) {
            $time = time();
            $newimagename = $time . $img_name; //create a unique image name
            if (move_uploaded_file($tmp_name, "../uploaded_files/waiver/" . $newimagename)) //set the uploaded file store folder
            {
                $sql = mysqli_query($conn, "INSERT INTO waiver_form (account_number, email, name, resident_address, favor_name, reason, witness_date, witness_address, e_signature, printed_name, witness1, witness2, before_date, person_address, status, remark)
     VALUES ('$account_number', '$email', '$name', '$resident_address', '$favor_name', '$reason', '$witness_date', '$witness_address', '$newimagename','$printed_name', '$witness1', '$witness2','$before_date', '$person_address' , '$status' , '$remark')");

                if ($sql) {
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
                    if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['account_number'] = $row['account_number'];
                        $_SESSION['email'] = $row['email'];
                        echo '<script language="javascript" type="text/javascript">
                    alert("Requirements Submitted Successfully!");
                    window.location = "../php/user_dh.php";
                    </script>';

                    } else {
                        echo '<script language="javascript" type="text/javascript">
                    alert("Something went wrong!");
                    window.location = "../forms/waiver.php";
                    </script>';
                    }
                }

            } else {
                echo '<script language="javascript" type="text/javascript">
        alert("Invalid image format!");
        window.location = "../forms/waiver.php";
        </script>';
            }
        }
    }
} else {
    echo '<script language="javascript" type="text/javascript">
    alert("All input fields are required!");
    window.location = "../forms/waiver.php";
    </script>';
}


?>