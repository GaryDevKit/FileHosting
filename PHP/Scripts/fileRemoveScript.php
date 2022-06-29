<?php
    include_once '../Classes/SessionsClass.php';
    include_once '../Classes/FileManagementClass.php';

    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $fileName = $_POST['Name'];
        $path = $_SESSION['UserAccount']['UploadDirectory'] . "/" . $fileName;

        $fileRemove = new FileManagement();

        $fileRemove -> removeFileFromServer($fileName);

        $fileRemove -> removeFileFromStorage($fileRemove, $path);
    }

?>