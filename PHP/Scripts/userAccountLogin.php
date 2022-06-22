<?php
/* Include Classes file*/
include_once '../Classes/UserClass.php';


//Check if the request is a post.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['Email'];
    $userPassword = $_POST['Password'];

    $userForeName = "Empty";
    $userSurame = "Empty";


    $newUser = new User($userForeName, $userSurame, $userEmail, $userPassword);
    $newUser -> userLogin();

}


?>