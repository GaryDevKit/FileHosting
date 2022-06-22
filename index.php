<?php

?>
 
 <!DOCTYPE html>
 <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
 <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
 <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
 <!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
 <html>
     <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>Filzoro Login</title>
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="CSS/main-styles.css">
     </head>
     <body>
         <!--[if lt IE 7]>
             <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
         <![endif]-->

        <div id="login-section">
            
            <div id="login-section-content">
                <img src=""/>
                <form action="PHP/Scripts/userAccountLogin.php" method="post">
                    <input type="email" placeholder="Enter E-mail Address" name="Email">
                    <input type="password" placeholder="Enter Password" name="Password">
                    <input type="submit" value="Sign In" name="submit">
                </form>
                <p><a href="">Forgotten your password? Click here to reset your account details.</a></p>
                <p><a href="register.php">Don't have an account? Click here to register now.</a></p>
            </div>

        </div>

     </body>
 </html>

