<?php
require_once("../includes/config.php");

if(isset($_POST["videoId"]) && isset($_POST["userName"])) {
    $query = $con->prepare("UPDATE videoProgress SET finished=1,
                            progress=0 WHERE userName=:userName AND videoId=:videoId");
    $query->bindValue(":userName", $_POST["userName"]);
    $query->bindValue(":videoId", $_POST["videoId"]);

    $query->execute();
}
else {
    echo "No VideoID or userName passed into args.";
}
?>