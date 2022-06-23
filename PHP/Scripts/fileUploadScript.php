<?php
    $numOfFiles = count($_FILES["filesToUpload"]["name"]);

    for ($i = 0; $i < $numOfFiles; $i++){
        $targetDir = "../../uploads/";
        $targetFile = $targetDir . basename($_FILES["filesToUpload"]["name"][$i]);
        if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $targetFile)){
            echo "You did it Gary. Check your XAMPP folder now.";
        }
    }
?>