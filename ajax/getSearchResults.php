<?php
    require_once("../includes/config.php");
    require_once("../includes/classes/SearchResultsProvider.php");
    require_once("../includes/classes/EntityProvider.php");
    require_once("../includes/classes/PreviewProvider.php");
    require_once("../includes/classes/Entity.php");


    if(isset($_POST["term"]) && isset($_POST["userName"])) {
        
        $srp = new SearchResultsProvider($con, $_POST["userName"]);
        echo $srp->getResults($_POST["term"]);

    }
    else {
        echo "No Term or userName passed into args.";
    }
?>