<?php

class DisplayMediaClass {
    public $fileType;
    public $database;

    public $tiles ="";

    function __construct ($fileType){
        $this -> fileType = $fileType;
        $this -> database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
        $this -> database -> newDBHandler();
    }

    function searchFiles(){
        $sql = "SELECT * FROM `media` WHERE `MediaType` LIKE '" . $this -> fileType . "%' LIMIT 20;";
        $sqlStatement = $this -> database -> dbh -> prepare($sql);

        $sqlStatement -> execute();
        
        $result = $sqlStatement -> fetchAll();

        foreach ($result as $results){
            if($this -> fileType == "image"){
            ?>
                <div style="background-image: url('<?php echo $results['MediaURL']; ?>');" class="image-tile media-tile">
                        <div class="image-tile-details">
                            <a onclick="getElementData(this)" data-media-name="<?php echo $results['MediaName']; ?>" data-media-size="<?php echo $results['MediaSize']; ?>" data-media-type="<?php echo $results['MediaType']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="<?php echo $results['MediaURL']; ?>" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
            <?php
            } else if($this -> fileType == "video"){
                ?>
                <div class="video-tile media-tile">
                        <video src='<?php echo $results['MediaURL']; ?>'></video>
                        <div class="video-tile-details">
                            <a onclick="getElementData(this)" data-media-name="<?php echo $results['MediaName']; ?>" data-media-size="<?php echo $results['MediaSize']; ?>" data-media-type="<?php echo $results['MediaType']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="<?php echo $results['MediaURL']; ?>" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
            <?php   
            } else if($this -> fileType == "document"){
                ?>
                <div class="document-tile media-tile">
                        <img src="Media/Images/file.png"/>
                        <p><?php echo $results['MediaName'] ?></p>
                        <div class="document-tile-details">
                            <a onclick="getElementData(this)" data-media-name="<?php echo $results['MediaName']; ?>" data-media-size="<?php echo $results['MediaSize']; ?>" data-media-type="<?php echo $results['MediaType']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="<?php echo $results['MediaURL']; ?>" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
            <?php   
            }
        }
        

    }
}

?>