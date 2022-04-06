<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

    if(isset($_POST["submitButton"])) {

        $userName = FormSanitizer::sanitizeFormuserName($_POST["userName"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        
        $success = $account->login($userName, $password);

        if($success) {
            $_SESSION["userLoggedIn"] = $userName;
            header("Location: index.php");
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
        <title>Welcome to NotFLix</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body>
        
        <div class="signInContainer">

            <div class="column">

                <div class="header">
                    <img src="assets/images/logo1.png" title="Logo" alt="Site logo" />
                    <h3>Sign In</h3>
                    <span>to continue to Notflix</span>
                </div>

                <form method="POST">
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <input type="text" name="userName" placeholder="userName" value="<?php getInputValue("userName"); ?>" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

                <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>

            </div>

        </div>

    </body>
</html>