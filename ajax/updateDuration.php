<?php
require_once("../includes/config.php");

if(isset($_POST["videoId"]) && isset($_POST["userName"]) && isset($_POST["progress"])) {
    $query = $con->prepare("UPDATE videoProgress SET progress=:progress,
                            dateModified=NOW() WHERE userName=:userName AND videoId=:videoId");
    $query->bindValue(":userName", $_POST["userName"]);
    $query->bindValue(":videoId", $_POST["videoId"]);
    $query->bindValue(":progress", $_POST["progress"]);

    $query->execute();
}
else {
    echo "No VideoID or userName passed into args.";
}
?>