<?php
    include_once '../Classes/SessionsClass.php';

    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();
    
    $numOfFiles = count($_FILES["filesToUpload"]["name"]);

    $supportedFormats = array(
        "PNG"=>"png",
        "JPEG"=>"jpeg",
        "GIF"=>"gif",
        "JPG"=>"jpg"
    );
    if ($numOfFiles == 1 && $_FILES["filesToUpload"]["name"][0] == null){
        echo "No Files Selected.:";
    } 
    else{
        for ($i = 0; $i < $numOfFiles; $i++){
            $targetDir = $_SESSION['UserAccount']['UploadDirectory']."/";
            $targetFile = $targetDir . basename($_FILES["filesToUpload"]["name"][$i]);
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            if(in_array($imageFileType, $supportedFormats, true)){
                if(!file_exists($targetFile)){
                    if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $targetFile)){
                        $messageSuccess = "File: " . basename($_FILES["filesToUpload"]["name"][$i]) . " uploaded successfully <br>";
                        echo $messageSuccess;
                    } else{
                        echo "Something went wrong.";
                    }
                } else{
                    echo "This file already exists";
                }
            } else{
                echo "This file <strong>" . basename($_FILES["filesToUpload"]["name"][$i]) . "</strong> is not currently supported at this stage. We are very sorry";
            }
        }
    }
?>