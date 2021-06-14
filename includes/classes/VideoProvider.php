<?php

class VideoProvider {
    public static function getUpNext($con, $currentVideo) {
        $query = $con->prepare("SELECT * FROM videos
                            WHERE entityId=:entityId AND id != :videoId
                            AND (
                                (season = :season AND episode > :episode) OR season > :season
                            )
                            ORDER BY season, episode ASC LIMIT 1");
        $query->bindValue(":entityId", $currentVideo->getEntityId());
        $query->bindValue(":season", $currentVideo->getSeasonNumber());
        $query->bindValue(":episode", $currentVideo->getEpisodeNumber());
        $query->bindValue(":videoId", $currentVideo->getId());
        
        $query->execute();

        if($query->rowCount() == 0) {
            $query = $con->prepare("SELECT * FROM videos
                                    WHERE season <=1 AND episode <= 1
                                    AND id != :videoId
                                    ORDER BY views DESC LIMIT 1");
            $query->bindValue(":videoId", $currentVideo->getId());
            $query->execute();
        }

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return new Video($con, $row);
    }
}


// class VideoProvider{

    // public static function getUpNext($con,$currentVideo)
    // {
    //     $query = $con->prepare("SELECT * FROM videos
    //     WHERE entityId=:entityId AND id != :videoId
    //     AND (
    //         (season = :season AND episode > :episode) OR season > :season
    //     )   
    //     ORDER BY season, episode ASC LIMIT 1");
    //     $query->bindValue(":entityId", $currentVideo->getEntityId());
    //     $query->bindValue(":season", $currentVideo->getSeasonNumber());
    //     $query->bindValue(":episode", $currentVideo->getEpisodeNumber());
    //     $query->bindValue(":videoId", $currentVideo->getId());

    //     $query->execute();

    //     if($query->rowCount == 0 )
    //     {   
    //         $query = $con->prepare("SELECT * FROM videos WHERE season <=1 AND episode <= 1 AND
    //                                id != :videoId ORDER BY views DESC LIMIT 1");
    //     $query->bindValue(":videoId", $currentVideo->getId());
    //     $query->execute();

    //     }
    //     $row = $query->fetch(PDO::FETCH_ASSOC);
    //     var_dump($row); 
    //     // )

    //     return new Video($con,$row);    
                              
    // }

  
// }
?>