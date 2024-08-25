<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="container">   
            <form action="" enctype="multipart/form-data">
                <div class="title">Register</div>
                <div class="error-text">Error</div>

                <div id="profile-pic-div">
                        <img src="../images/user.png" id="photo" alt="profile-photo">
                        <input type="file" name="profile_image" accept="image/*" id="file" required class="box">
                        <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
                
                    <div class="input-box">
                        <div class="input-field">
                            <label class="info">Account Number <i class="ast">&#9913;</i></label>
                            <input type="number" name="account_number" placeholder="Enter your account number"
                                onKeyPress="if(this.value.length==7) return false;" required>
                        </div>
                   
                        <div class="input-field">
                            <label class="info">Contact Number <i class="ast">&#9913;</i></label>
                            <input type="number" name="contact" placeholder="Enter your contact number"
                                onKeyPress="if(this.value.length==11) return false;" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="input-field">
                            <label class="info">Last Name <i class="ast">&#9913;</i></label>
                            <input type="text" name="lname" placeholder="Enter your last name" onKeyUp="chText()"
                                onKeyDown="chText()" id="aliasEntry" required>
                        </div>

                        <div class="input-field">
                            <label class="info">First Name <i class="ast">&#9913;</i></label>
                            <input type="text" name="fname" placeholder="Enter your first name" onKeyUp="chTextOne()"
                                onKeyDown="chText()" id="entryAlias" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="input-field">
                            <label class="info">Address <i class="ast">&#9913;</i></label>
                            <input type="text" name="address" placeholder="Enter your complete address" required>
                        </div>

                        <div class="input-field">
                            <label class="info">Email <i class="ast">&#9913;</i></label>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="input-field">
                            <label class="info">Password <i class="ast">&#9913;</i></label>
                            <input type="password" name="password" placeholder="Create your password" required
                                pattern="[a-Z]{18}" oninvalid="this.setCustomValidity('Enter maximum of 18 characters')"
                                oninput="this.setCustomValidity('')" required>
                        </div>

                        <div class="input-field">
                            <label class="info">Confirm Password <i class="ast">&#9913;</i></label>
                            <input type="password" name="cpassword" placeholder="Confirm password" equired pattern="[a-Z]{18}"
                                oninvalid="this.setCustomValidity('Enter maximum of 18 characters')"
                                oninput="this.setCustomValidity('')" required>
                        </div>
                    </div>


                    <div class="submit">
                        <input type="submit" value="Register" class="button">                      
                    </div>

                    <div class="page-footer">
                            <p class="card-footer">By signing up, I agree to ILECO-1 Consumer's Portal
                            <h4 class="card-footer"><a
                                href="https://www.termsandconditionsgenerator.com/live.php?token=cNlnwi0x1Y2eWARik5xjZGIN9jJaNRJc">
                                Terms of Use and Privacy Policy</a></h4>
                            </p>
                    </div>
            
                <div class="register">
                    <h3>already have an account? <a href="login.php">login here!</a></h3>
                </div>
                
            </form>
    </div>

    <script src="../js/app.js"></script>
    <script src="../js/signup.js"></script>
    <script src="../js/block.js"></script>
</body>

</html>