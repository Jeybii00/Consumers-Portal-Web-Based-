<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" type="text/css" href="../css/announcements.css">
</head>
<body>

            <?php
                $connection = mysqli_connect("localhost","root","") or die("A connection to the Server 
                could not be established!");	
                $result=mysqli_select_db ($connection, "portaldb") or die("Database Could not be selected");
                    if($result>=1){
                        $sql = "SELECT * FROM announce ORDER BY id DESC";
                             $queryResult = mysqli_query($connection,$sql);
                        if(mysqli_num_rows($queryResult) > 0){
                            while($row = mysqli_fetch_array($queryResult)){
            ?>


    <div class="container">
        <div class="blog-section">
            <div class="cards">
                <div class="card">
                    <div class="image-section">
                        <img src = "../images/post.png">
                    </div>
                    <div class="content">
                        <p><span></span><p></p><?=$row['details']; ?></p>
                    </div>
                    <div class="posted-date">
                        <p>Posted on <span></span><?=$row['date']; ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
                }
      
                }else{
                    echo "";
                }
                }
    ?>


</body>
</html>