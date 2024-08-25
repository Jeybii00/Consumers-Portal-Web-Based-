<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel=“stylesheet” type=“text/css” href=“../css/stylefont.css”>
</head>

<body>

    <div class="container">
        <center>
            <div class="title"><img src="../images/ilecoLogo.png">Log in as Admin</div>
        </center>
        <form action="" autocomplete="off">
            <div class="error-text">Error</div>

            <div class="user-info">
                <div class="input-box">
                    <label>Enter Username<i class = "ast">&#9913;</i></label>
                    <input type="text" name="ausername" placeholder="Enter username" required>
                </div>

                <div class="input-box">
                    <label>Enter Password<i class = "ast">&#9913;</i></label>
                    <input type="password" name="apassword" placeholder="Enter password" required>
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Login" class="button">
            </div>
        </form>

    </div>
    <script src="../js/login_admin.js"></script>
</body>

</html>