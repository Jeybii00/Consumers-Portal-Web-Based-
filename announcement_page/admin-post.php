<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
</head>
<body>
<div class="sidebar-content">

<div class="user">
                <?php
                include '../include/condb.php';
                $qry = mysqli_query($conn, "SELECT * FROM admin ");
                if (mysqli_num_rows($qry) > 0) {
                        $row = mysqli_fetch_assoc($qry);
                        if ($row) {
                                $aname = $row['aname'];
                                $asurname = $row['asurname'];
                                $aid = $row['aid'];
                        }
                }
                ?>

                <img class="icon-logo" src="../images/sample profiles/pic-6.jpg" alt="Profile Image">
                <h4>
                        <input type = "hidden" value = "<?php echo "$aid" ?>">
                        <?php echo "$aname $asurname" ?>
                </h4>
                <p
                        style="text-transform:capitalize; font-weight:bold; font-size:12px; padding:20px; color:#536162;">
                        admin </p>
</div>


        <div class="nav-bar">
                <i class="fa fa-store"></i>
                <a href="../admin/admin_dh.php">Dashboard</a><br><br>

                <i class="fa fa-comments"></i>
                <a href="../manage-forms/view_concerns.php">Concerns</a><br><br>

                <i class="fa fa-clipboard"></i>
                <a href="../ebill/add-bill.php">Bills</a><br><br><br><br><br><br><br>



                <i class="fa fa-sign-out-alt"></i>
                <a href="../admin/index.php" onclick="return confirm('logout from this website?');">Log
                        Out</a>

        </div>
</div>
                <header>
                    <div class="logo-header">
                        <a>
                            <img class="img-logo" src="../images/ilecoLogo.png" 
                                alt="ileco-logo">
                                ILECO-1 consumer's portal</a>
                    </div>
                </header>

<div class="content-body">
<div class="content-details">
    <?php
 
     $connection = mysqli_connect("localhost","root","") or die("A connection to the Server 
     could not be established!");	
    $result=mysqli_select_db ($connection, "portaldb") or die("Database Could not be selected");
    echo '<div class="contain"><h1 class="announce-title">Announcement<button class="announce-btn"><a class="link" href="add-post.php">&#43;</a></button><span class="tooltiptext">Add Announcement</span></div></h1>';
    if($result>=1){
        $sql = "SELECT * FROM announce ORDER BY id DESC";
        $queryResult = mysqli_query($connection,$sql);
        if(mysqli_num_rows($queryResult) > 0){
            while($row = mysqli_fetch_array($queryResult)){
            ?>

    <div class="mainbody">
      <div class="column">
        <div class="frame">
            <div class="layout">
                <div class="data">  
                    
                                <p class="row-data">
                                    <span class="bold">Post ID #: </span><?= $row['id']; ?> &nbsp;
                                    <span class="bold">Type: </span> <?= $row['type']; ?><br>
                                    <span class="bold">Date Generated: </span><?=$row['date']; ?>
                                </p>
                        <div class="announce-details">
                                <span class="details">  Details: </span><p class="border"></p><?=$row['details']; ?><br><br>
                                <span class="img"><img class="img" src="../images/post.png"></span><br><br>
                            <div class="edit-delete">
                            <span class="details"><a class ="a-delete"onClick="deleteme(<?php echo $row['id']; ?>)" name="Delete" value="Delete">Delete</a></span>
                            <script language="javascript">
                            function deleteme(delid)
                                {
                                    if(confirm("Do you want to delete this Post?")){
                                        window.location.href='announce-delete.php?del_id=' +delid+'';
                                        return true;
                                    }
                                }
                            </script>
                            </div>
                        </div>
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
 </div>
 </div>
</body>
</html>