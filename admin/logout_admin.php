<?php

    session_start();
    include '../include/condb.php';
    if(isset($_SESSION['ausername'])){
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            session_unset();
            session_destroy();
            header("Location: admin/admin_login.php");
        }
        else{
            header("Location: admin/admin_login.php");
        }
    }
    else{
        header("Location: admin/admin_login.php");
    }

?>