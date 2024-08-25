<head>
<link rel = "stylesheet" href = "css/front.css"> 
</head>
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
                    <a href="#">Consumer Info</a>

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
            </ul>
        </nav>

        <form action = "php/login.php">
            <button type = "submit" class = "btn-log">  Login</button>      
        </form>

    </header>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function () {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }

    </script>