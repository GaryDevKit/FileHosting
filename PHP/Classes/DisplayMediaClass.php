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
        $sql = "SELECT * FROM `media`";
        $sqlStatement = $this -> database -> dbh -> prepare($sql);

        $sqlStatement -> execute();
        
        $result = $sqlStatement -> fetchAll();

        foreach ($result as $results){
            ?>
                <div style="background-image: url('<?php echo $results['MediaURL']; ?>');" class="image-tile">
                        <div class="image-tile-details">
                            <a onclick="getElementData(this)" data-media-name="<?php echo $results['MediaName']; ?>" data-media-size="<?php echo $results['MediaSize']; ?>" data-media-type="<?php echo $results['MediaType']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="<?php echo $results['MediaURL']; ?>" download><i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </div>
                </div>
            <?php
        }
        

    }
}

?>