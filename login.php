<?php
require_once("includes\classes\FromSanitizer.php");
require_once("includes\config.php");
require_once("includes\classes\Account.php");
require_once("includes\classes\Constants.php");

$account = new Account($con) ;

    if (isset($_POST["submitButton"])) {
        $userName  = FromSanitizer:: sanitizeFormUserName($_POST["userName"]);
        $password  = FromSanitizer::sanitizeFormPassword($_POST["password"]);
    
        $sucess = $account->login($userName,$password);
        if($sucess) {
            $_SESSION["userLoggedIn"] = $userName ;
            header("Location: index.php") ;
        }
    }


    function getInputValue($name) { 
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }

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
                <img  class = "imgContainer" src = "assests\Images\logo1.png" title = "siteLogo" />
                <h3 > Sign In</h3>
                <span>To Continue Netflix </span>

</div>

            <form  method = "POST" class ="columnForm" >
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name = "userName" placeholder = "User Name"  value = "<?php getInputValue("userName");?>" required >
                <input type="password" name = "password" placeholder = "Password" required>
                <input type="submit" name = "submitButton" placeholder = "Submit">
                


</form>  
<a href = "register.php"  class = "signMessage" > Need to have account?Sign Up here?</a>    
</div>
        </div>
        

</body>
</html >
