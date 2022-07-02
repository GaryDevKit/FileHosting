<?php
    include_once 'PHP/Classes/SessionsClass.php';
    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();

    if(isset($_SESSION['UserAccount'])){
        header ("Location: /FileHosting/Dashboard/");
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <base href="http://localhost/FileHosting/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/main-styles.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="register-section">
            
            <div id="register-section-content">
                <img src=""/>
                <form action="PHP/Scripts/userAccountCreate.php" method="post">
                    <input type="text" placeholder="Forename" name="Forename">
                    <input type="text" placeholder="Surname" name="Surname">
                    <input type="email" placeholder="Enter E-mail Address" name="Email">
                    <input type="password" placeholder="Enter Password" name="Password">
                    <input type="submit" value="Create account" name="submit">
                </form>
                <p><a href="index.php">Already have an account? Click here to sign in.</a></p>
            </div>

        </div>
    </body>
</html>