<?php


class User {
    private $con , $sqlData ;

    public function __construct($con , $userName) {
        $this->con = $con ;

        $query = $con->prepare("SELECT * FROM users WHERE username=:username") ;
        $query->bindValue("username",$userName);
        $query->execute() ;

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC) ;
    }

    public function getFirstName(){
        return $this->sqlData["firstName"] ;
    }

    public function getLastName(){
        return $this->sqlData["lastName"] ;
    }

    public function getUserName(){
        return $this->sqlData["userName"] ;
    }

    public function getEmail(){
        return $this->sqlData["email"] ;
    }
 
}
?>