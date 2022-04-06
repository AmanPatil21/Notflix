<?php

    class Account {
        private $con;
        private $errorArray= array();
        public function __construct($con) {
            $this->con = $con ;
        }

        public function register($fn , $ln,$un ,$em,$pw,$pw2) {
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUserName($un);
            $this->validateEmail($em ,$em);
            $this->validatePassword($pw,$pw2);


            if(empty($this->errorArray)) {
                return $this->insertUserDetails($fn , $ln ,$un ,$em,$pw);
            }
            else {
                return false ;
            }
        }
        private function validateFirstName($fn) {
            if(strlen($fn) <2 || strlen($fn)>25) {
                array_push($this->errorArray,Constants::$firstNameCharacter );
            }
        }

        // thsi will add user information into databse 
        private function insertUserDetails($fn , $ln ,$un ,$em,$pwd) {
            $pwd = hash("sha512" , $pwd);
            $query = $this->con->prepare("INSERT INTO users (firstName , lastName , userName , email , password)
                                    VALUES (:fn ,:ln ,:un ,:em ,:pwd) ");
            $query->bindValue(":fn",$fn) ;
            $query->bindValue(":ln",$ln) ;
            $query->bindValue(":un",$un) ;
            $query->bindValue(":em",$em) ;
            $query->bindValue(":pwd",$pwd) ;

            return $query->execute() ;
        }


        public function login($un ,$pwd) {
            $pwd = hash("sha512" , $pwd);
            $query=  $this->con->prepare("SELECT * FROM users WHERE userName=:un AND password=:pwd") ;
            $query->bindValue(":un" , $un);
            $query->bindValue(":pwd" ,$pwd);
            $query->execute() ;
            if($query->rowCount() ==1) {
                return true;
            }
            array_push($this->errorArray, Constants::$loginFailed) ;
            return false ;

        }



        private function validateLastName($ln) {
            if(strlen($ln) <2 || strlen($ln)>25) {
                array_push($this->errorArray,Constants::$lastNameCharacter );
            }
        }
        private function validateUserName($un) {
            if(strlen($un) <2 || strlen($un)>25) {
                array_push($this->errorArray,Constants::$userNameCharacter );
            }
            $query = $this->con->prepare("SELECT * FROM users WHERE userName=:un");
            $query->bindValue(":un" , $un);
            $query->execute() ;

            if($query->rowCount() != 0) {
                array_push($this->errorArray,Constants::$userNameTaken);
            }
        }
        private function validateEmail($em , $em2) {
            if($em != $em2) {
                array_push($this->errorArray , Constants::$emailDontMAtch);
                return;
            }
            if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid) ;
            }

            $query = $this->con->prepare("SELECT * FROM users WHERE email=:em") ;
            $query->bindValue(":em",$em) ;
            $query->execute() ;

            if($query->rowCount() != 0) {
                array_push($this->errorArray , Constants::$emailTaken) ;
            }
        }

        private function validatePassword($pwd ,$pwd2) {

            if ($pwd != $pwd2) {
                array_push($this->errorArray , Constants::$passwordDontMatch);
                return;
            }
            if(strlen($pwd) < 5 || strlen($pwd2)> 25) {
                array_push($this->errorArray,Constants::$passwordLength);
                return;
            }
        }

        public function getError($error) {
            if (in_array($error , $this->errorArray)) {
                return "<span class='errorMessage'>$error</span>";
            }
        }
    }

?>
