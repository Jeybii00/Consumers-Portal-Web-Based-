<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel = "stylesheet" href = "css/homestyle.css">
</head>
<body>
<div class="about-container">

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