<?php 

class DirectoryClass {

    function checkDirectoryExists(){

    }

    function createDirectory($name,$key){
        $directoryName = "../../uploads/".$name."_".$key;
        
        mkdir($directoryName, 0777);
    }

    function removeDirectory($directory){
        rmdir('examples');
    }

    function removeDirectoryFile($directory, $file){
        echo $fileLocation = $directory.$file;
        unlink($fileLocation);
    }
}

?>