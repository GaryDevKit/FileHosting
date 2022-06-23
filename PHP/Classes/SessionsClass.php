<?php 
    class sessionClass{

        public $sessionArray;
        
        function startSession(){
            session_start();
        }

        function createUserSession($sessionArray){
            $this->sessionArray = $sessionArray;
            $_SESSION["UserAccount"] = $this->sessionArray;
        }

        function destroySession(){
            session_unset();
            session_destroy();
        }

    }


?>