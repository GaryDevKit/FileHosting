<?php

class Database {
    public $dsn;
    public $username;
    Public $pass;
    Public $dbh;

    function __construct($dsn, $username, $pass){
        $this->dsn = $dsn;
        $this->user = $username;
        $this->password = $pass;
    }

    function newDBHandler(){
        $this->dbh = new PDO($this->dsn, $this->user, $this->password);
    }
}

?>