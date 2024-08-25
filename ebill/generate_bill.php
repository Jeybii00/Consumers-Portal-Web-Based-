<?php
session_start();
include '../include/condb.php';


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$account_number = $_POST['account_number'];
$month_period = $_POST['month_period'];

if (!empty($month_period)) {
    if (isset($_FILES['bill_img'])) {
        $img_name = $_FILES['bill_img']['name']; //getting image name
        $img_typ = $_FILES['bill_img']['type']; //getting image type
        $tmp_name = $_FILES['bill_img']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_extension = end($img_explode);
        $extension = ['png', 'jpeg', 'jpg','pdf']; //these are some valid image extensions

        if (in_array($img_extension, $extension) === true) {
            $time = time();
            $newimagename = $time . $img_name; //create a unique image name
            if (move_uploaded_file($tmp_name, "../uploaded_files/bill/" . $newimagename)) //set the uploaded file store folder
            {
                $sql = mysqli_query($conn, "INSERT INTO bill (fname, lname, address, account_number, bill_img, month_period)
     VALUES ('$fname', '$lname', '$address', '$account_number','$newimagename', '$month_period')");

                if ($sql) {
                    $sql3 = mysqli_query($conn, "SELECT * FROM bill WHERE account_number = '{$account_number}'");
                    if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['account_number'] = $row['account_number'];
                        echo '<script language="javascript" type="text/javascript">
                    alert("Bill Uploaded Successfully!");
                    window.location = "../ebill/add-bill.php";
                    </script>';

                    } else {
                        echo "Something went wrong!";
                    }
                }

            } else {
                echo "Invalid image format!";
            }
        }

    }
} else {
    echo "Input Fields are required!";
}


?>