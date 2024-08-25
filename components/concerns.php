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
    <title>Concerns</title>
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <style>
        .concerns-container {
            padding: 30px;
            overflow: auto;
            margin: 0 auto;
            width: 100%;
        }

        .form {
            background-color: #ECF2FF;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin: 5% auto;
            padding: 20px;
            height: auto;
            width: 100%;
            max-width: 600px;
        }

        .concerns-title {
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 5px;
        }

        hr{
            border: 3px solid green;
            margin: 5px 0;
        }

        .logo-icon {
            margin-top: 30px;
            margin-left: -100px;
            width: 720px;
            height: 400px;
            position: fixed;
        }

        .submit input {
            background-color: #2E8B57;
            border: none;
            height: 50px;
            width: 100%;
            border-radius: 5px;
            font-weight: bold;
            color: #000;
            font-size: 20px;
            cursor: pointer;
        }

        .submit {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
        }

        label{
            float: left;
            font-size: 20px;
            font-weight: bold;
            padding: 5px 0 10px 0;
        }

        #msg {
            resize: none;
            font-size: 15px;
            background-color: #ffffff;
            width: 100%;
            min-width: 500px;
            border-radius: 5px;
            border: none;      
        }

        @media only screen and (max-width: 1320px) {
            #msg {
                min-width: 200px;
            }
        }

        @media only screen and (max-width: 900px) {
            #msg {
                min-width: 150px;
            }

            .submit input{
                font-size: 15px;
                text-align: center;
            }
        }
    </style>
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
                                ILECO-1 consumer's portal
                    </a>
                </div>
        </header>
        
    <div class="content-body">
        <div class="concerns-container">

            <?php
            $qry = mysqli_query($conn, "SELECT * FROM users WHERE account_number = '{$account_number}'");
            if (mysqli_num_rows($qry) > 0) {
                $row = mysqli_fetch_assoc($qry);
                if ($row) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $address = $row['address'];
                    $contact = $row['contact'];
                }
            }
            ?>


            <form action="../php/concerns_function.php" method="POST">

                <div class="form">
                    <h2 class="concerns-title">Concerns</h2>
                    <hr>

                    <input class="input" type="hidden" name="name" value="<?php echo "$fname $lname"; ?>" readonly>

                    <input class="input" type="hidden" name="email" value="<?php echo "$email"; ?>" readonly>

                    <input class="input" type="hidden" name="contact" value="<?php echo "$contact"; ?>" readonly>

                    <label for="feedback_msg">Message :</label>
                    <textarea name="feedback_msg" id="msg" cols="50" rows="5" placeholder="What would you like to tell us..." maxlength="100" required></textarea>

                        <div class="submit">
                            <input type="submit" value="Submit Your Concern" class="button">
                        </div>

                </div>
            </form>
        </div>
    </div>

    <script src="../js/sidebar.js"></script>

</body>
</html>