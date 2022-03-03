<?php

require_once("includes\classes\FromSanitizer.php");
  if (isset($_POST["submitButton"])) {
    $firstName = FromSanitizer::sanitizeFormString($_POST["firstName"]) ;
    $lastName  = FromSanitizer::sanitizeFormString($_POST["lastName"]) ;
    $userName  = FromSanitizer:: sanitizeFormUserName($_POST["userName"]);
    $email     = FromSanitizer::sanitizeFormEmail($_POST["emailId"]);
    $password  = FromSanitizer::sanitizeFormPassword($_POST["password"]);
    $password1 = FromSanitizer::sanitizeFormPassword($_POST["password1"]);
 }
?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel = "stylesheet" type="text/css" href = "assests\style\style.css" />
</head >
<body >
        <div class = "singnIn">
        <div class = "columnContainer" >
            <div class ="header">
                <img  class = "imgContainer" src = "assests\Images\logo.png" title = "siteLogo" />
                <h3 > Sign Up</h3>
                <span>To Continue Netflix </span>

</div>

            <form  method = "POST" class ="columnForm" >
                <input type="text" name = "firstName" placeholder = "First Name" required>
                <input type="text" name = "lastName" placeholder = "Last Name" required>
                <input type="text" name = "userName" placeholder = "User Name" required >
                <input type="email" name = "emailId" placeholder = "Email ID" required>
                <input type="password" name = "password" placeholder = "Password" required>
                <input type="password" name = "password1" placeholder = "Confirm Password" required>
                <input type="submit" name = "submitButton" placeholder = "Submit">
                


</form>  
<a href = "login.php"  class = "signMessage" > Already have account?Sign In here?</a>    
</div>
        </div>
        

</body>
</html >
