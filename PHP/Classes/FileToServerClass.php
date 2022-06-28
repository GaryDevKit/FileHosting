<?php
/*
    Import the classes required for the database connection and the sessions.
*/
include_once '../Database/database.php';

class FileToServerClass{
    
    public $dirPath;
    public $database;

    public $userID;
    public $mediaName;
    public $mediaSize;
    public $mediaType;
    public $mediaSFW;

    function __construct($userID=null,$mediaName=null,$mediaSize=null,$mediaType=null,$mediaSFW=null,$dirPath=null) {
        
        $this -> database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
        $this -> database -> newDBHandler();

        $this -> userID = $userID;
        $this -> mediaName = $mediaName;
        $this -> mediaSize = $mediaSize;
        $this -> mediaType = $mediaType;
        $this -> mediaSFW = $mediaSFW;
        $this -> dirPath = $dirPath;

    }

    function addFileToServer(){
        $sql = "INSERT INTO `media`(`UserID`, `MediaName`, `MediaSize`, `MediaType`, `MediaSFW`, `MediaURL`) VALUES (:userid, :medianame, :mediasize, :mediatype, :mediasfw, :mediaurl)";
        $sqlStatement = $this -> database -> dbh -> prepare($sql);

        $sqlStatement -> bindValue('userid', $this -> userID);
        $sqlStatement -> bindValue('medianame', $this -> mediaName);
        $sqlStatement -> bindValue('mediasize', $this -> mediaSize);
        $sqlStatement -> bindValue('mediatype', $this -> mediaType);
        $sqlStatement -> bindValue('mediasfw', $this -> mediaSFW);
        $sqlStatement -> bindValue('mediaurl', $this -> dirPath);

        $insert = $sqlStatement -> execute();

        if($insert){
            echo "Information added to table.";
        }
    }

    function removeFileFromServer($fileName){
        
        $sql = "DELETE FROM `media` WHERE `MediaName` = :medianame";
        $sqlStatement = $this -> database -> dbh -> prepare($sql);

        $sqlStatement -> bindValue('medianame', $fileName);


        $delete = $sqlStatement -> execute();

        if($delete){
            echo "Information deleted table.";
        }
    }
}

?>