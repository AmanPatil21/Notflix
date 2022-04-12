<?php 
require_once("includes/header.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");



$detailsMessage ="" ;
$passwordMessage = "";
if(isset($_POST["saveDetailsButton"])) {
    $account = new Account($con) ;
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);


    $success = $account->updateDetails($firstName , $lastName , $email , $userLoggedIn);

    if($success) {
       $detailsMessage = "<div class='alertSuccess'>
       Details updated sucessfully 
       </div>" ;
    }
    else {
        $errorMessage  = $account->getFirstError() ;

        $detailsMessage = "<div class='alertError'>
                $errorMessage
       </div>" ;
        
    }


}



if(isset($_POST["savePasswordButton"])) {
    $account = new Account($con) ;
    $oldPassword = FormSanitizer::sanitizeFormPassword($_POST["oldPassword"]);
    $newPassword = FormSanitizer::sanitizeFormPassword($_POST["newPassword"]);
    $newPassword2 = FormSanitizer::sanitizeFormPassword($_POST["newPassword2"]);


    $success = $account->updatePassword($oldPassword, $newPassword , $newPassword2 , $userLoggedIn);

    if($success) {
       $passwordMessage = "<div class='alertSuccess'>
       Password updated sucessfully 
       </div>" ;
    }
    else {
        $errorMessage  = $account->getFirstError() ;

        $passwordMessage = "<div class='alertError'>
                $errorMessage
       </div>" ;
        
    }


}
?>



<div class="settingContainer column">
            <div class="formSection">
                <form method="POST">
                    <h2>User Details</h2>

                    <?php
                    $user = new User($con , $userLoggedIn) ; 

                    $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName() ;
                    $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName() ;
                    $email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail() ;

                    ?>
                    <input type="text" name ="firstName" placeholder="First Name" value ="<?php echo $firstName ?>">
                    <input type="text" name ="lastName" placeholder="Last Name"   value ="<?php echo $lastName ?>">
                    <input type="email" name ="email" placeholder="Email" value ="<?php echo $email ?>">    
                    <input type="submit" name ="saveDetailsButton" value ="Save">    

                    <div class="message">
                    <?php echo $detailsMessage;?>
                    </div>
                
                </form>

               
            </div>

            <div class="formSection">
            <form method="POST">
                <h2>Update Password</h2>

                <input type="password" name ="oldPassword" placeholder="Old Password">
                <input type="password" name ="newPassword" placeholder="New Password">
                <input type="password" name ="newPassword2" placeholder="Confirm new password">    
                <input type="submit" name ="savePasswordButton" value ="Save">    
                <div class="message">
                    <?php echo $passwordMessage;?>
                    </div>
                
            </form>

    </div>
</div>



