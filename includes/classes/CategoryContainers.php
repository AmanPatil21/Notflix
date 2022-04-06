<?php 
require_once("includes/config.php");
class CategoryContainers{

    private $con , $userName;
    public function __construct($con,$userName) {
        $this->con = $con ;
        $this->userName = $userName ;
    }


    public function showAllCategories() {
        $query = $this->con->prepare("SELECT * FROM categories") ;
        $query->execute() ;

        $html  = "<div class='previewCategories'>" ;

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row ,null , true , true) ;
        }

        return $html . "</div>" ;
    }


    private function getCategoryHtml($sqlData , $title , $tvShows  , $movies) {
        $categoryId = $sqlData["id"] ;
        $title  =  $title == null ? $sqlData["name"] :$title ;

        return $title . "<br>" ;
    }

}

?>