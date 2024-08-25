<?php


$conn = new mysqli('localhost', 'root', '', 'portaldb');
if(!$conn){
        echo " Connection Denied!" . mysqli_connect_error();
}

?>