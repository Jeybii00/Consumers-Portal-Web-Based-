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
    <title>View Bills</title>
    <link rel="stylesheet" type="text/css" href="../components/icons/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/mediaquiries.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <style>
        .user-container {
            text-align: center;
            padding: 10px;
            width: auto;
            max-width: 700px;
            height: auto;
        }

        #view_bill {
            margin-top: 10px;
            text-align: center;
            border-collapse: collapse;
            width: 100%;
            height: auto;
        }

        .date_generated {
            float: left;
            width: 100%;
        }

        #view_bill td,
        #view_bill th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #view_bill tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #view_bill tr:hover {
            background-color: #ddd;
        }

        #view_bill th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #9CA777;
            color: white;
        }

        #viewing_bill {
            text-decoration: none;
            font-weight: bold;
        }

        .table__title label{
            font-weight: bold;
            font-size: 30px;
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
</head>

<body>

        <?php 
            include '../components/calendar.php';
        ?>

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
        <div class="user-container"><br>
                <div class="table__title">
                    <label>View Bill</label>
                </div>
            <table class="table" id="view_bill">
                
                <thead>
                    <tr>
                        <th id="billing">Bill Period</th>
                        <th id="viewing">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include '../include/condb.php';
                    
                    $bill_img = "";

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM bill WHERE account_number = '{$account_number}'";
                    $result = mysqli_query($conn, $sql);


                    if (!$result) {
                        die("Invalid query: " . mysqli_connect_error());
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        $bill_img = $row['bill_img'];
                        ?>

                        <tr>
                            <td class="date_generated">
                                <?php echo $row['month_period']; ?>
                            </td>
                            <td >
                                <a id = "viewing_bill" href="user_viewing.php?id=<?php echo $row['id']; ?>">View</a>
                            </td>

            </tr>
    


            <?php


                    }
                    ?>

            </tbody>


            </table>
        </div>
    </div>

  <script src="../js/sidebar.js"></script>
    
</body>
</html>