<?php

class DisplayMediaClass {
    public $fileType;
    public $Limit;
    public $database;

    public $tiles ="";

    function __construct ($fileType, $Limit){
        $this -> fileType = $fileType;
        $this -> Limit = $Limit;
        $this -> database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
        $this -> database -> newDBHandler();
    }

    function searchFiles(){
        // Query find all records, that matches the media type posted. It then sets a limit on the number of records to be displayed. 
        $sql = "SELECT * FROM `media` WHERE `MediaType` LIKE :mediatype ORDER BY `MediaID` DESC LIMIT :limitsize";

        // Prepare the SQL Statement for execution.
        $sqlStatement = $this -> database -> dbh -> prepare($sql);

        // Bind the value of the file type to the name: - mediatype (Question mark binding would also work, but less readable).
        $sqlStatement -> bindValue('mediatype', $this -> fileType . "%");
        
        // bindValue converts the number to a string. We need the a third parameter (PDO::PARAM_INT) to change it back to a number.
        $sqlStatement -> bindValue('limitsize', $this -> Limit, PDO::PARAM_INT); 

        // Execute our prepared statement
        $sqlStatement -> execute();

        // Create a results variable and assign it the value returned from the execute function. fetchAll returns all rows returned.
        $result = $sqlStatement -> fetchAll();

        // Count the number of results, this will be needed to display the number of files.
        $numberOfFiles = count($result);


        // Create an empty variable named text, used for the HTML output.
        $text = "";

        // Start looping throught the results of the SQL statement.
        foreach ($result as $results){
            if($this -> fileType == "image"){
            
                $text .= <<<END
                <div style="background-image: url('{$results['MediaURL']}');" class="image-tile media-tile">
                    <div class="image-tile-details">
                        <a onclick="getElementData(this)" data-media-name="{$results['MediaName']}" data-media-size="{$results['MediaSize']}" data-media-type="{$results['MediaType']}"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="{$results['MediaURL']}" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                    </div>
                </div>
                END;
            } else if($this -> fileType == "video"){
                $text .= <<<END
                <div class="video-tile media-tile">
                        <video src="{$results['MediaURL']}"></video>
                        <div class="video-tile-details">
                            <a onclick="getElementData(this)" data-media-name="{$results['MediaName']}" data-media-size="{$results['MediaSize']}" data-media-type="{$results['MediaType']}"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{$results['MediaURL']}" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
                END;
            } else if($this -> fileType == "document"){
                $text .= <<<END
                <div class="document-tile media-tile">
                        <img src="Media/Images/file.png"/>
                        <p>{$results['MediaName']}</p>
                        <div class="document-tile-details">
                            <a onclick="getElementData(this)" data-media-name="{$results['MediaName']}" data-media-size="{$results['MediaSize']}" data-media-type="{$results['MediaType']}"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{$results['MediaURL']}" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
                END;
            }
        }
        $arrayName = array('NumFiles' => $numberOfFiles, "Content" => $text);
        $jsonResponse = json_encode($arrayName);
        echo $jsonResponse;
    }
}

?>