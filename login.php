<?php
    if (isset($_POST["submitButton"])) {
        echo "Form  was submitted" ;
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
