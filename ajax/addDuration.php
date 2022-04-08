<?php
require_once("../includes/config.php");

if(isset($_POST["videoId"]) && isset($_POST["userName"])) {
    $query = $con->prepare("SELECT * FROM videoProgress 
                            WHERE userName=:userName AND videoId=:videoId");
    $query->bindValue(":userName", $_POST["userName"]);
    $query->bindValue(":videoId", $_POST["videoId"]);

    $query->execute();

    if($query->rowCount() == 0) {
        
        $query = $con->prepare("INSERT INTO videoProgress (userName, videoId)
                                VALUES(:userName, :videoId)");
        $query->bindValue(":userName", $_POST["userName"]);
        $query->bindValue(":videoId", $_POST["videoId"]);
    
        $query->execute();
        
    }
}
else {
    echo "No VideoID or userName passed into args.";
}
?>