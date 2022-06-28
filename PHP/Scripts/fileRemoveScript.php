<?php
    include_once '../Classes/FileToServerClass.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        echo $fileName = $_POST['Name'];

        //$fileRemove = new FileToServerClass();
        //$fileRemove -> removeFileFromServer($fileName);

        


    }

?>