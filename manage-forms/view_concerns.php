<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/stylefont.css" rel="stylesheet" />
    <title>Manage Concerns</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        /* setting the text-align property to center*/
        td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="user-container my-5">
        <h2 style="text-align:center; font-weight:bold; font-size:30px;">Manage Consumer's Concerns</h2>
        <a class="btn btn-primary btn-sm" style="margin-left:20px; float:left;" href="../admin/admin_dh.php"
            role="button">&#8617;Back to Dashboard</a>
        <br><br>
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Account Number</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Date of Submission</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "portaldb";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM concerns";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_connect_error());
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>

                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['account_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['contact']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['feedback_msg']; ?>
                        </td>
                        <td>
                            <?php echo $row['date_submission']; ?>
                        </td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="../manage-forms/manage_concerns.php?id=<?php echo $row['id']; ?>">View </a>
                                <a class="btn btn-danger btn-sm" href="archive_concerns.php?id=<?php echo $row['account_number']; ?>" 
                                    style="color:white;" name="archive" value="Archive">Archive</a></td>
                        </tr>
                    <?php


                }
                ?>

            </tbody>


        </table>
</body>

</html>