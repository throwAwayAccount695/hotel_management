<?php

    //constanst with the login credentials to connect to the database.
    define("HOST", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "hotel");

    class DB{
        public $conn;
        
        function __construct($host, $username, $password, $dbname){
            $this->conn = mysqli_connect($host, $username, $password, $dbname);
        }
    }

    $db = new DB(HOST, USERNAME, PASSWORD, DBNAME);
?>