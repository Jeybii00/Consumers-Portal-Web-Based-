<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
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
    <div class="section">
            <div class="cards">
                <div class="new-arrival">
                        <h1>Admin Dashboard</h1>
                </div>
                <div class="card">
                    <div class="image-section" id="section1">
                        <img src="../icons/About Usd.png">
                        <h5 style="margin-left:40px;">Registered Consumers</h5>
                    </div>
                    <div class="description">
                    <a href="../user-manage/manageconsumer.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>

                <div class="card">
                    <div class="image-section" id="section2">
                        <img src="../icons/announce.png">
                        <h5 style="margin-left:35px;">Post & Announcements</h5>
                    </div>
                    <div class="description">
                    <a href="../announcement_page/admin-post.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>


            </div>


                    <!--- Second Card Starts Here ---->

            <div class="section">
            <div class="cards">
            <div class="card">
                    <div class="image-section" id="section3">
                        <img src="../icons/recon.png">
                        <h5>Reconnection With Change Name Forms</h5>
                    </div>
                    <div class="description">
                    <a href="../manage-forms/reconnection-request.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>

                <div class="card">
                    <div class="image-section" id="section4">
                        <img src="../icons/cname.png">
                        <h5>Waiver for Change Name Forms</h5>
                    </div>
                    <div class="description">
                    <a href="../manage-forms/waiver-request.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>

            </div>

        </div>

                    <!--- Third Card Starts Here ---->

        <div class="section">
            <div class="cards">
            <div class="card">
                    <div class="image-section" id="section5">
                        <img src="../icons/CONCERN1.png">
                        <h5>Change Account Name From Deceased Member To Spouse Forms</h5>
                    </div>
                    <div class="description">
                    <a href="../manage-forms/spouse_request.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>

                <div class="card">
                    <div class="image-section" id="section6">
                        <img src="../icons/POST.png">
                        <h5>Change Account Name to Heir/New Owner Forms</h5>
                    </div>
                    <div class="description">
                    <a href="../manage-forms/heir_request.php" style="margin-left:-130px;">Manage &#10148;</a></div>
                </div>

            </div>

        </div>
        <?php include '../components/calendar.php'; ?>
        </div>
</div>

</body>
</html>