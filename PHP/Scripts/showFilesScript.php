<?php

include_once '../Classes/DisplayMediaClass.php';
include_once '../Classes/FileToServerClass.php';
include_once '../Classes/SessionsClass.php';

$sessionsStart = new sessionClass();
$sessionsStart -> startSession();

$fileDisplay = new DisplayMediaClass("test");
$fileDisplay -> searchFiles();


?>