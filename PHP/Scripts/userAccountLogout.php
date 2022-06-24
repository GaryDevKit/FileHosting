<?php
    include_once '../Classes/SessionsClass.php';
    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();

    if(isset($_SESSION['UserAccount'])){
        $sessionsStart -> destroySession();
        header("Location: ../../index.php");
    }




?>