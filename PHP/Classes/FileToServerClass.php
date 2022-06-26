<?php
/*
    Import the classes required for the database connection and the sessions.
*/
include_once '../Database/database.php';
include_once 'SessionsClass.php';

class FileToServerClass{
    
    public $dirPath;
    public $database;

    public $userID;
    public $mediaName;
    public $mediaSize;
    public $mediaType;
    public $mediaSFW;

    function __construct($userID=null,$mediaName,$mediaSize,$mediaType,$mediaSFW,$dirPath) {
        
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
}

?>