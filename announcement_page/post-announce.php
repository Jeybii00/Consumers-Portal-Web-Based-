<?php
include 'add-function.php';
    
$text = $_POST['announcement'];
$type = $_POST["type"];
   
if(isset($_POST['announcement']))
{   
  
    $text = preg_replace("#\[sp\]#", "&nbsp;", $text);
    $text = preg_replace("#\[nl\]#", "<br>\n", $text);

}

$sql ="INSERT INTO announce (type, details)
        VALUES ('$type','$text')";

mysqli_query($conn, $sql);
header("Location: admin-announcement.php?post=success")
?>
