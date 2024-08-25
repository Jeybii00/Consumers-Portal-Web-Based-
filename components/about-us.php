<?php
session_start();
include '../include/condb.php';
$account_number = $_SESSION['account_number'];
$email = $_SESSION['email'];
if (empty($account_number)) {
    header("Location: ../php/login.php");
}
$qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
if (mysqli_num_rows($qry) > 0) {
    $row = mysqli_fetch_assoc($qry);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] != 'Verified') {
            header("Location: ../php/verify.php");
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
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
</head>
<style>
    .about__wrapper{
        margin-bottom: 2%;
        text-align: center;
    }

    .about__title{
        padding-top: 30px;
        padding-bottom: 5px;
    }

    .about__second__title{
        padding-top: 50px;
        padding-bottom: 10px;
    }

    .about__first__wrapper,
    .about__second__wrapper{
        text-align: center;
        width: 100%;
    }

    .first__description{
        width: 70%;
        height: auto;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        text-align: center;
        font-size: 1.5rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .about__second__wrapper{
        text-align: justify;
        width: 70%;
        height: auto;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        font-size: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #line{
        border-left: 6px solid lightslategray;
        height: 10px;
    }

    section{
    padding: 40px 0 10px 0;
    font-size: 20px;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
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
                                ILECO-1 consumer's portal
                    </a>
                </div>
        </header>

<div class="content-body">
    <div class="about__wrapper">
            <div class="about__first__wrapper">

                <h1 class="about__title">Vision Statement</h1>
                <p class="first__description">One of the premier electric Cooperative and service provider in the region by 2027.</p>

                <h1 class="about__title">Mission Statement</h1>
                <p class="first__description">To provide quality, reliable and cost-effective electric service to Member-Consumer-Owners for a progressive community.</p>

                <h1 class="about__title">Corporate Philosophy</h1>
                <p class="first__description">Efficient service for a responsible membership.</p>

                <h1 class="about__title">Customer Service Mantra</h1>
                <p class="first__description"><span id="line">WE SMILE</span><br>We Serve Member-Consumer-Owner with Integrity, Loyalty and Efficiency.</p>
            </div>
            
                <h1 class="about__second__title">Customer Service Mantra</h1>
            <div class="about__second__wrapper">
                    <h4 class="about__title">Integrity (Pagkamatarong)</h4>
                    <p class="second__description">We will perform our duties and serve our Member-Consumer-Owners with absolute honesty, fairness and professional accountability guided by 
                        strong moral principles.</p>

                    <h4 class="about__title">Teamwork (Pag-ugyon)</h4>
                    <p class="second__description">We will work together hamoniously and be committed to make our vision into a reality.</p>

                    <h4 class="about__title">Loyalty (Pagkatampad)</h4>
                    <p class="second__description">We will stand by the objective and mission of the Cooperative and defend its interest.</p>

                    <h4 class="about__title">Concern (Pag ulikid)</h4>
                    <p class="second__description">We will show concern to the Cooperative subordinating our individual interest. We shall preserve the environment where we live.</p>

                    <h4 class="about__title">Respect (Pagtahod)</h4>
                    <p class="second__description">We will treat all those whose lives we touch with respect listening to individual opinion towards an atmosphere of unity and belongingness 
                        therefore achieving a sense of well-being in our interpersonal relationship.</p>

                    <h4 class="about__title">Productivity (Pagkamabinungahon)</h4>
                    <p class="second__description">We will work for maximum output using our available resources and constantly seeking for improvement towards customer satisfaction.</p>
            </div>
    </div>
</div>

<script src="../js/sidebar.js"></script>

</body>
</html>
