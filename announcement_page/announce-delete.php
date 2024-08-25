<?php
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];

        $servername ="localhost";
        $username ="root";
        $password="";
        $dbname="portaldb";
        
        $conn = mysqli_connect($servername,$username,$password,$dbname);

        $query = "DELETE FROM announce WHERE id='" . $_GET["del_id"] ."'";
        $result=  mysqli_query($conn,$query) or die("Error in query: $query. " .mysqli_error());
    }
        header("Location: admin-post.php?delete=success")

?>