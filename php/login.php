<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

    <div class="container">
        <center>
            <div class="title"><a href="../index.php"><img src="../images/ilecoLogo.png"></a>Log in to Portal</div>
        </center>
        <form action="" autocomplete="off">
            <div class="error-text">Error</div>
            <div class="user-info">
                <div class="input-box">
                <label>Enter Account Number<i class = "ast">&#9913;</i></label>
                    <input type="number" name="account_number" placeholder="Enter your account number"
                        onKeyPress="if(this.value.length==7) return false;" required>
                </div>

                <div class="input-box">
                <label>Enter Password<i class = "ast">&#9913;</i></label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="submit">
                <input type="submit" value="Login" class="button">

                <div class="register">
                    <h3>don't have an account? <a href="register.php">register here!</a></h3>

                </div>
            </div>
        </form>

    </div>

    <script src="../js/login.js"></script>
</body>

</html>