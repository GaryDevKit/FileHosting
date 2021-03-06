<?php
/* Include Classes file*/
include_once '../Classes/UserClass.php';
include_once '../Classes/DirectoryClass.php';
include_once '../Classes/SessionsClass.php';

$sessionsStart = new sessionClass();
$sessionsStart -> startSession();

//Check if the request is a post.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userForeName = $_POST['Forename'];
    $userSurname = $_POST['Surname'];
    $userEmail = $_POST['Email'];
    $userPassword = $_POST['Password'];


    $newUser = new User($userForeName, $userSurname, $userEmail, $userPassword);
    $checkedUser = $newUser -> checkUserExists();
    $genKey = $newUser -> generateKey();
    $newUser -> addUser($checkedUser,$genKey);

    $dirObj = new DirectoryClass();
    $dirObj -> createDirectory($userForeName,$genKey);

    /*THIS WILL BE USED TO SEND OUT AN E-MAIL
    
    if($newUser -> Verified == false){
        $to = $newUser -> Email;
        $subject = "Account Verification required";
        $msg = "Please click here to do something." ;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@example.com>' . "\r\n";

        mail($to,$subject,$msg,$headers);
    }*/

}
?>