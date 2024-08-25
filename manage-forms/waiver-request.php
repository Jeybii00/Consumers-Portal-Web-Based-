<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/stylefont.css" rel="stylesheet" />
    <title>Manage Waiver Forms</title>
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
        <h2 style="text-align:center; font-weight:bold; font-size:30px;">Waiver for Change Name Forms</h2>
        <a class="btn btn-primary btn-sm" style="margin-left:20px; float:left;" href="../admin/admin_dh.php"
            role="button">&#8617; Back to Dashboard</a>
        <br><br>
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Account Number</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Date of Submission</th>
                    <th>Submission Status</th>
                    <th>Submission Remarks</th>
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

                $sql = "SELECT * FROM waiver_form";
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
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['Date_of_Submission']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <?php echo $row['remark']; ?>
                        </td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="waiver-update.php?id=<?php echo $row['id']; ?>">View</a>
                        </td>

                    </tr>
                    <script language="javascript">
                        function deleteme(delid) {
                            if (confirm("WARNING! Do you want to delete this Form?!")) {
                                window.location.href = '../waiver-request/waiver_delete.php?del_id=' + delid + '';
                                return true;
                            }
                        }
                    </script>
                    <?php


                }
                ?>

            </tbody>


        </table>
</body>

</html>