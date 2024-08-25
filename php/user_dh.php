<?php
session_start();
include '../include/condb.php';
$account_number = $_SESSION['account_number'];
$email = $_SESSION['email'];
if (empty($account_number)) {
    header("Location: login.php");
}
$qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
if (mysqli_num_rows($qry) > 0) {
    $row = mysqli_fetch_assoc($qry);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] != 'Verified') {
            header("Location: verify.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
</head>

<body>
        <div class="sidebar-content">

            <div class="user">
                <?php
                $qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
                if (mysqli_num_rows($qry) > 0) {
                    $row = mysqli_fetch_assoc($qry);
                    if ($row) {
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $Role = $row['Role'];
                        $profile_image = $row['profile_image'];
                    }
                }
                ?>

                <img class="icon-logo" src="../uploaded_files/<?php echo $profile_image; ?>" alt="">
                <h4>
                    <?php echo "$fname $lname"; ?>
                </h4>
                <p style="text-transform:capitalize; font-weight:bold; padding:20px; font-size:12px; color:#536162;">
                    <?php echo $Role; ?>
                </p>
            </div>

            <nav class="nav-bar">
                <ul>
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="../php/user_dh.php" class="active">Home</a><br><br>
                    </li>

                    <li>
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <button onclick="myFunction()" class="dropbtn">Services <i class="fa-solid fa-caret-down"></i></button>
                        
                        <div id="myDropdown" class="dropdown-content">
                            <a href="../forms/spouse.php">&#11162; Change Account Name From Deceased Member To Spouse</a>
                            <a href="../forms/new_owner.php">&#11162; Change Account Name to Heir/New Owner</a>
                            <a href="../forms/reconnection.php">&#11162; Reconnection with change name</a>
                            <a href="../forms/waiver.php">&#11162; Waiver for change name</a>
                            <a href="../ebill/user_bill.php">&#11162; View Bills</a>
                        </div><br><br>
                    </li>

                    <li>
                        <i class="fa fa-comments"></i> 
                        <a href="../components/concerns.php">Concerns</a>
                        <br><br>
                    </li>

                    <li>
                        <i class="fa fa-users"></i><a href="../components/about-us.php"> About Us</a><br><br><br><br><br>
                    </li>

                    <li>
                    <i class="fa fa-sign-out-alt"></i><a href="../php/logout.php?logout_id=<?php echo $account_number ?>"
                        onclick="return confirm('logout from this website?');">Log Out</a>
                    </li>
                </ul>
            </nav>
        </div>

        <header>
                <div class="logo-header">
                    <a>
                        <img class="img-logo" src="../images/ilecoLogo.png" 
                            alt="ileco-logo">
                            ILECO-1 consumer's portal</a>
                </div>
        </header>



            <?php
            include '../include/condb.php';

            //get page number
            if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            //total number of records
            $total_records_per_page = 4;

            //get the page offset for the LIMIT Query
            $offset = ($page_no - 1) * $total_records_per_page;

            //get the previous page no.
            $previous_page = $page_no - 1;

            //get the next page np.
            $next_page = $page_no + 1;


            //get the total count of records
            $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM portaldb.announce") or die(mysqli_error($conn));

            //total records
            $records = mysqli_fetch_array($result_count);

            //store the record into variable
            $total_records = $records['total_records'];

            //get total no of pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            $sql = "SELECT * FROM portaldb.announce ORDER BY id DESC LIMIT $offset , 
                   $total_records_per_page";


            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            ?>
        <div class="content-body">
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="mainbody">
                    <div class="column">
                        <div class="frame">
                            <div class="layout">
                                <div class="data">

                                    <p class="row-data">
                                        <span class="bold">Type: </span>
                                        <?= $row['type']; ?><br>
                                        <span class="bold">Date: </span>
                                        <?= $row['date']; ?>
                                    </p>
                                    <div class="announce-details">
                                        <span class="details"> Details: </span>
                                        <p class="border"></p>
                                        <?= $row['details']; ?><br><br>
                                        <span class="img"><img class="img" src="../images/post.png"></span><br><br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>              
                </div>

            <?php }
            mysqli_close($conn) ?>

                <center><nav class="pages">
                        <div class="p-10">
                        <strong>Page
                            <?= $page_no; ?> of
                            <?=
                                $total_no_of_pages; ?>
                        </strong>
                        </div>

                        <ul class="pagination">
                            <li class="page-item"><a class="page-link <?= ($page_no <= 1) ? 'disable': ''; ?> " <?= ($page_no > 1) ? 'href=?page_no=' . $previous_page : ''; ?>>&#8810; Previous || </a></li>

                            <li class="page-item"><a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?> "
                                    <?= ($page_no < $total_no_of_pages) ? 'href=?page_no=' . $next_page : ''; ?>>Next &#8811;</a>
                            </li>
                        </ul>           
                    </nav></center>

        </div>

        <?php include '../components/calendar.php'; ?>
        <script src="../js/sidebar.js"></script>
</body>
</html>