<?php
include_once '../Classes/DisplayMediaClass.php';
include_once '../Classes/FileManagementClass.php';
include_once '../Classes/SessionsClass.php';

$sessionsStart = new sessionClass();
$sessionsStart -> startSession();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $imageType = $_POST['Type'];
    $Limit = $_POST['Limit'];
    
    $fileDisplay = new DisplayMediaClass($imageType, $Limit);
    $fileDisplay -> searchFiles();
}
?>