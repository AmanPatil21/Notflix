<!-- Access tokent :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 -->



<?php

require_once("includes\classes\FromSanitizer.php");
require_once("includes\config.php");
require_once("includes\classes\Account.php");
require_once("includes\classes\Constants.php");

    $account = new Account($con) ;


  if (isset($_POST["submitButton"])) {
    $firstName = FromSanitizer::sanitizeFormString($_POST["firstName"]) ;
    $lastName  = FromSanitizer::sanitizeFormString($_POST["lastName"]) ;
    $userName  = FromSanitizer::sanitizeFormUserName($_POST["userName"]);
    $email     = FromSanitizer::sanitizeFormEmail($_POST["emailId"]);
    $password  = FromSanitizer::sanitizeFormPassword($_POST["password"]);
    $password1 = FromSanitizer::sanitizeFormPassword($_POST["password1"]);

    $sucess = $account->register($firstName,$lastName,$userName,$email,$password,$password1);
    if($sucess) {
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
                <h3 > Sign Up</h3>
                <span>To Continue Netflix </span>

</div>

            <form  method = "POST" class ="columnForm" >
                <?php echo $account->getError(Constants::$firstNameCharacter); ?>
                <input type="text" name = "firstName" placeholder = "First Name"  value = "<?php getInputValue("firstName");?>" required>
                <?php echo $account->getError(Constants::$lastNameCharacter); ?>
                <input type="text" name = "lastName" placeholder = "Last Name"  value = "<?php getInputValue("lastName");?>" required>
                <?php echo $account->getError(Constants::$userNameCharacter); ?>
                <?php echo $account->getError(Constants::$userNameTaken); ?>
                <input type="text" name = "userName" placeholder = "User Name"   value = "<?php getInputValue("userName");?>"required >
                <?php echo $account->getError(Constants::$emailDontMAtch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <input type="email" name = "emailId" placeholder = "Email ID"  value = "<?php getInputValue("emailId");?>" required>
                <?php echo $account->getError(Constants::$passwordDontMatch); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <input type="password" name = "password" placeholder = "Password" required>
                <input type="password" name = "password1" placeholder = "Confirm Password" required>
                <input type="submit" name = "submitButton" placeholder = "Submit">
                


</form>  
<a href = "login.php"  class = "signMessage" > Already have account?Sign In here?</a>    
</div>
        </div>
        

</body>
</html >
