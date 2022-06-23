<?php
/* Include Classes file*/
include_once '../Classes/UserClass.php';
include_once '../Classes/SessionsClass.php';

$sessionsStart = new sessionClass();
$sessionsStart -> startSession();


//Check if the request is a post.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['Email'];
    $userPassword = $_POST['Password'];

    $userForeName = "Empty";
    $userSurname = "Empty";


    $newUser = new User($userForeName, $userSurname, $userEmail, $userPassword);
    $newUser -> userLogin();

}


?>