

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
    }

    //give random entity if entity  is not provided for preview
    
}
?>
