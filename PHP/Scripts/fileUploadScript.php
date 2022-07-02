<?php
    include_once '../Classes/SessionsClass.php';
    include_once '../Classes/FileManagementClass.php';

    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();
    
    $numOfFiles = count($_FILES["filesToUpload"]["name"]);

    /*$supportedFormats = array(
        "PNG"=>"png",
        "JPEG"=>"jpeg",
        "GIF"=>"gif",
        "JPG"=>"jpg",
        "MP4"=>"mp4",
        "MOV"=>"mov",
        "FLV"=>"flv",
        "TXT"=>"txt",
        "PDF"=>"pdf"
    );*/

    $supportedFormats = array(
        "ImageFormats" => array(
            "PNG"=>"png",
            "JPEG"=>"jpeg",
            "GIF"=>"gif",
            "JPG"=>"jpg",
        ),
        "VideoFormats" => array(
            "MP4"=>"mp4",
            "MOV"=>"mov",
            "FLV"=>"flv",
        ),
        "DocumentFormats" => array(
            "TXT"=>"txt",
            "PDF"=>"pdf",
        )
    );

    if ($numOfFiles == 1 && $_FILES["filesToUpload"]["name"][0] == null){
        echo "No Files Selected.:";
    } 
    else{
        for ($i = 0; $i < $numOfFiles; $i++){
            
            $targetDir = $_SESSION['UserAccount']['UploadDirectory']."/";
            $nameFix = str_replace(" ","_",basename($_FILES["filesToUpload"]["name"][$i]));
            
            $targetFile = $targetDir . $nameFix;
            $targetFile = str_replace(" ","_",$targetFile);
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            
            if(in_array($imageFileType, $supportedFormats['DocumentFormats'], true))
            {
                $_FILES["filesToUpload"]["type"][$i] = "document/" . $imageFileType;
            }
            
            if(in_array($imageFileType, $supportedFormats['ImageFormats'], true) || in_array($imageFileType, $supportedFormats['VideoFormats'], true) || in_array($imageFileType, $supportedFormats['DocumentFormats'], true)){
                if(!file_exists($targetFile)){
                    if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $targetFile)){
                        $weburl = "http://localhost/FileHosting/uploads/" . $_SESSION['UserAccount']['FirstName'] . "_" . $_SESSION['UserAccount']['UniqueKey'] . "/" . $nameFix;
                        $messageSuccess = "File: " . basename($_FILES["filesToUpload"]["name"][$i]) . " uploaded successfully <br>";
                        echo $messageSuccess;
                        $saveUpload = new FileManagement(
                            $_SESSION['UserAccount']['UniqueKey'],
                            $nameFix,
                            $_FILES["filesToUpload"]["size"][$i],
                            $_FILES["filesToUpload"]["type"][$i],
                            true,
                            $weburl);
                        $saveUpload -> addFileToServer();
                        echo "<a href='$weburl'>Image File Click here</a>";
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