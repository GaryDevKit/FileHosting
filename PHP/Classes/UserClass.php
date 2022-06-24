<?php

include_once '../Database/database.php';
include_once 'SessionsClass.php';


Class User {

    public $firstName;
    public $Surname;
    public $Email;
    public $Password;

    public $Verified = false;
    public $Type;

    public $saltOne = "78HJJU";
    public $saltTwo = "709ioj";

    public $listChar;
    public $listCharLength;

    public $hashedKey;

    public $random;


    function __construct($firstName, $Surname, $Email, $Password) {
        $this -> firstName = $firstName;
        $this -> Surname = $Surname;
        $this -> Email = $Email;
        $this -> Password = hash('ripemd160', $this->saltOne.$Password.$this->saltTwo);
        $this -> listChar = array("A","N","m","Z");
        $this -> listCharLength = count($this -> listChar);
    }

    function generateKey(){
        $text="";
        for ($i = 0; $i < 20; $i++){
            $this -> random = rand(0,($this -> listCharLength - 1));
            $text = $this -> listChar[$this->random];
        }
        $this -> hashedKey = hash('ripemd160', $this->saltOne.$text.$this->saltTwo);
        return $this -> hashedKey;
    }

    function checkUserExists(){
        $database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
        $database->newDBHandler();

        $sql = "SELECT * FROM `user` WHERE `Email` = :email";

        $sqlStatement = $database->dbh->prepare($sql);
        $sqlStatement -> bindValue('email', $this -> Email);
        $sqlStatement->execute();

        $result = $sqlStatement->fetch(PDO::FETCH_ASSOC);

        if($result){
            echo "Oops a user alrady exists with this e-mail.";
            return true;
        } else {
            return false;
        }
    }

    function addUser($checked, $key){
        if ($checked == false){
            $database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
            $database->newDBHandler();

            $sql = "INSERT INTO `user`(`UniqueKey`, `FirstName`, `Surname`, `Email`, `Password`, `Verified`, `Type`) VALUES (:ukey, :fname, :lname, :email, :pass, :verified, 'FREE')";
            $sqlStatement = $database->dbh->prepare($sql);

            $sqlStatement -> bindValue('ukey', $key);
            $sqlStatement -> bindValue('fname', $this -> firstName);
            $sqlStatement -> bindValue('lname', $this -> Surname);
            $sqlStatement -> bindValue('email', $this -> Email);
            $sqlStatement -> bindValue('pass', $this -> Password);
            $sqlStatement -> bindValue('verified', $this -> Verified);

            $insert = $sqlStatement -> execute();

            if($insert){
                echo "Inserted record to database User.";
                echo $key;
            }
        }
    }

    function userLogin(){
        $database = new Database('mysql:dbname=filehosting;host=127.0.0.1','root',''); 
        $database->newDBHandler();

        $sessionsStart = new sessionClass();

        $sql = "SELECT * FROM `user` WHERE `Email` = :email";

        $sqlStatement = $database->dbh->prepare($sql);
        $sqlStatement -> bindValue('email', $this -> Email);

        $sqlStatement->execute();

        $result = $sqlStatement->fetchAll();

        foreach ($result as $results){
            if ($results['Email'] == $this->Email){
                if ($results['Password'] == $this->Password){

                    $dirLocal = "../../uploads/".$results['FirstName']."_".$results['UniqueKey'];

                    $userInfo = array("Type"=>"User","FirstName"=>$results['FirstName'],"Surname"=>$results['Surname'],"userEmail"=>$results['Email'],"UploadDirectory"=>$dirLocal);

                    $sessionsStart -> createUserSession($userInfo);
                    
                    if (isset($_SESSION['UserAccount'])){
                        print_r($_SESSION['UserAccount']['FirstName']);
                        header("Location: ../../dashboard.php");
                    }
                } else{
                    echo "<p>Oops it would appear you entered an incorrect password.</p>";
                }
            }   
        }


    }


}

?>