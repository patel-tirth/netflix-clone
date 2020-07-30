<?php
require_once("../includes/config.php");

if(isset($_POST["videoId"]) && isset($_POST["username"]))
{
    $query = $con->prepare("SELECT * FROM videoProgress WHERE username=:username AND videoId=:videoId");
    $query->bindValue(":username",$_POST["username"]);
    $query->bindValue(":videoId",$_POST["videoId"]);
    $query->execute();

    if($query->rowCount() == 0 )
    {
        $query = $con->prepare("INSERT INTO videoProgress (username,videoId) VALUE (:username, :videoId)");
        $query->bindValue(":username",$_POST["username"]);
        $query->bindValue(":videoId",$_POST["videoId"]);
         $query->execute();
    }

}
else
{
    echo "No videoid or username passed into file";
}
?> 