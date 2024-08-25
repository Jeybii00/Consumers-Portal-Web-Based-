<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel = "stylesheet" href = "css/homestyle.css">
</head>
<body>

<div id="wrapper">
    <header>
        <div class="logo">
            <a href = "index.php"><img src="images/ilecoLogo.png">ILECO-1</a>
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="index.php" class = "active">Home</a>
                </li>
                <li>
                    <a href="">Consumer Info</a>

                    <ul>
                        <li><a href="reconnection.php">Reconnection with change name</a></li>
                        <li><a href="waiver.php">Waiver for change name</a></li>
                        <li><a href="application.php">Service Application</a></li>
                        <li><a href="about-us.php">Board of Directors</a></li>
                    </ul>


                </li>
                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <button class = "btn-log" onclick="location.href= 'php/login.php'">  Login</button>
                </li>

                <li>
                    <button class = "btn-signup" onclick="location.href= 'php/register.php'">Sign Up</button>      
                </li>
            </ul>
        </nav>


    </header>

    <div class="signup__btn">
        <button class = "btn-sign" onclick="location.href= 'php/register.php'">Sign Up</button>      
    </div>
    <footer>
          Copyright @ <?= date('Y'); ?>. <span>ILECO-1 Consumer's Portal</span> | All rights reserved!
    </footer>

    <script>
        // Hamburger Menu
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function () {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }

    </script>
</div> 

</body>
</html>

