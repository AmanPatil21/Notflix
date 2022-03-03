<?php
    if (isset($_POST["submitButton"])) {
       $firstName = sanitizeFormString($_POST["firstName"]) ;
       echo $inputName;
    }

    function sanitizeFormString($inputName) {
        // Remove  html tags from string
        $inputName = strip_tags($inputName);
        // Remove spaces from the front and last
        $inputName = trim($inputName);
        // Make string lower case
        $inputName = strtolower($inputName);
        // Make first Chacter to Captial
        $inputName = ucfirst($inputName); 
        return $inputName;
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
                <h3 > Sign In</h3>
                <span>To Continue Netflix </span>

</div>

            <form  method = "POST" class ="columnForm" >
                
                <input type="text" name = "userName" placeholder = "User Name" required >
                <input type="password" name = "password" placeholder = "Password" required>
                <input type="submit" name = "submitButton" placeholder = "Submit">
                


</form>  
<a href = "register.php"  class = "signMessage" > Need to have account?Sign Up here?</a>    
</div>
        </div>
        

</body>
</html >
