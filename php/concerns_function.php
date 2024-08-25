<?php

session_start();
include '../include/condb.php';

$email = $_SESSION['email'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$feedback_msg= $_POST['feedback_msg'];
$account_number = $_SESSION['account_number'];

if(!empty($feedback_msg)){

    $sql = mysqli_query ($conn, "INSERT INTO concerns (account_number, email, name, contact,feedback_msg)
     VALUES ('$account_number', '$email', '$name', '$contact', '$feedback_msg')");
    
        if($sql){
            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND account_number = '{$account_number}'");
            if(mysqli_num_rows($sql3) >0){
                    $row = mysqli_fetch_assoc($sql3); 
                    $_SESSION['account_number'] = $row['account_number'];
                    $_SESSION['email'] = $row['email'];
                    echo '<script language="javascript" type="text/javascript">
                    alert("Message Submitted Successfully!");
                    window.location = "../components/concerns.php";
                    </script>';

                    }else{
                    echo "Something went wrong!";
                    }
                }

    }else{
        echo "input fields are required";
}


?>