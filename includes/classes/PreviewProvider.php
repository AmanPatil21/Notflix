<?php 
require_once("includes/config.php");
class PreviewProvider {

    private $con , $userName;
    public function __construct($con,$userName) {
        $this->con = $con ;
        $this->userName = $userName ;
    }
    public function createPreviewVideo($entity) {
        if($entity ==null) {
            $entity = $this->getRandomEntity() ;
        }
        $name = $entity->getName() ;
        $id = $entity->getId() ;
        $preview = $entity->getPreview() ;
        $thumbnail = $entity->getThumbnail() ;


        //TODO : ADD suibtitle

        return "<div class='previewContainer'>
        <img src='$thumbnail' class='previewImage' alt='previewImage' hidden>
        <video  autoplay muted  class='previewVideo' onended ='previewEnded()'> 
                <source src ='$preview' type='video/mp4' >
        </video>

        <div class='previewOverlay'>
            <div class='mainDetails'>
            <h3>$name</h3>
            <div class='button'>
                <button><i class='fa-solid fa-play'></i> Play</button>
                <button onclick='volumeToggle(this)'><i class='fa-solid fa-volume-xmark'></i></button>
            </div>
        </div>
        </div>";

    }
    //give random entity if entity  is not provided for preview
    private function getRandomEntity() {
        $query=  $this->con->prepare("SELECT * FROM entities ORDER BY RAND()  LIMIT 1") ;
        $query->execute() ;
        //get data and store it in associative array ;
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return new Entity($this->con , $row) ;
      }
}
?>
