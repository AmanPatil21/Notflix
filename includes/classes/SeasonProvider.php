<?php
class SeasonProvider {
    private $con, $userName;

    public function __construct($con, $userName) {
        $this->con = $con;
        $this->userName = $userName;
    }

    public function create($entity) {
        $seasons = $entity->getSeasons();

        if(sizeof($seasons) == 0) {
            return;
        }

        $seasonsHtml = "";
        foreach($seasons as $season) {
            $seasonNumber = $season->getSeasonNumber();


            $seasonsHtml .= "<div class='season'>
                                    <h3>Season $seasonNumber</h3>
                                </div>";
        }

        return $seasonsHtml;
    }
}
?>