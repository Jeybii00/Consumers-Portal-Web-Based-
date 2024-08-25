<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcements</title>
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
        <div id="content-details">
                <h1>Create Announcement</h1>
                                <form action="post.php" method="POST" onsubmit='addNewLines();'>
                                        <label for="choice">Type: </label>
                                                <select name="type" id="choice">
                                                <optgroup label="Select Type of Post">
                                                        <option value="Activity">Activity</option>
                                                        <option value="Announcement">Announcement</option>
                                
                                        <div class="description">
                                                <textarea name="announcement" class="announcement" id="announcement" rows="4" cols="50" placeholder="Please enter announcement description/details:" required></textarea>
                                                <div class="submit">
                                                        <button type="submit" name="submit" class="add-btn">Post</button>
                                                        <a href="admin-post.php" class="cancel-btn">Cancel</a>
                                                </div>
                                        </div>
                                </form>
        </div>
</div>      
                
            <script>
                function addNewLines() {
                    text = document.getElementById('new-announce').value;
                    text = text.replace(/  /g, "[sp][sp]");
                    text = text.replace(/\n/g, "[nl]");
                    document.getElementById('announcement').value = text;
                    return false;
                }
            </script>

</body>

</html>