<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiver</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel = "stylesheet" href = "css/homestyle.css">
</head>
<body>

<div class="waiv-container">

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
            </ul>
        </nav>



  </header>

    <center><div class="waiver-container">
    <img class="content-image" src="../portal/images/waiver.png" alt=""></center>
    
    <footer>
      Copyright @ <?= date('Y'); ?>. <span>ILECO-1 Consumer's Portal</span> | All rights reserved!
    </footer>
    
  </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">&#10148;</button>
</body>
</html>

<script>
    // Hamburger Menu
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function () {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }

    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>