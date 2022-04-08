<?php
require_once("../includes/config.php");

if(isset($_POST["videoId"]) && isset($_POST["userName"])) {
    $query = $con->prepare("SELECT progress FROM videoProgress WHERE userName=:userName AND videoId=:videoId");
    $query->bindValue(":userName", $_POST["userName"]);
    $query->bindValue(":videoId", $_POST["videoId"]);

    $query->execute();

    // here as only one column we can use getchcolumn
    // as it is ajax we can echo instead of return
    echo $query->fetchColumn();

}
else {
    echo "No VideoID or userName passed into args.";
}
?>