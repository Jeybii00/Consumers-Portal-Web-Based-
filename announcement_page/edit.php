<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css">
</head>
<body style=" overflow: hidden;">
 
<?php
        //include '../sidebar.php';
   ?>
   <div class="content-body">
            <?php

            $servername ="localhost";
            $username ="root";
            $password="";
            $dbname="portaldb";
            
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            
            $id="";
            $type="";
            $text="";
            
            
            if(isset($_POST['details']))
            {   
              
                $text = preg_replace("#\[sp\]#", "&nbsp;", $text);
                $text = preg_replace("#\[nl\]#", "<br>\n", $text);
            
            }

                if($_server['REQUEST_METHOD']== 'GET' ){

                if (!isset($_GET['id'])){
                        header("location:admin-announcement.php");
                        exit;
                }
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM announce WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if (!$row){
                       
                    }
                    $text = $row["details"];
                    $type = $row["type"];
                    
                }
            else{
                
                  
                do{
                    if (!empty($id) || !empty($type) || !empty($text) ){

                    }
        
                $sql = "UPDATE announce".
                "SET type = '$type', details = '$text'".
                "WHERE id = $id";


            }while(true);
        }
            ?>
<div class ="a-nounce">
<h1>Create Announcement</h1>
<form action="post.php" method="POST" onsubmit='addNewLines();'>
    <input type="hidden" value="<?php echo $id;?>">
    <div class = "a-type">
    <label for="choice">Type: </label>
    <select name="type" id="choice">
    <optgroup label="Type of Post">
        <option value="Activity">Activitiy</option>
        <option value="Announcement">Announcement</option>
    </div>
    <textarea name="announcement" class="announcement" id="announcement"  rows="4" cols="50">
</textarea><br>
<textarea class="new-announce" id="new-announce"></textarea>

<button type="submit" name="submit" class="add-btn">Post</button>
</div>
</form>
<script>
    function addNewLines(){
        text = document.getElementById('new-announce').value;
        text = text.replace(/  /g,"[sp][sp]");
        text = text.replace(/\n/g,"[nl]");
        document.getElementById('announcement').value = text;
        return false;
    }
</script>


</body>
</html>