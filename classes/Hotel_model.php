<?php require_once('connection.php');

    class Hotel_model{
        private $conn;

        function __construct($conn){
            $this->conn = $conn;
        }

        public function get_content($table){
            return "SELECT * FROM $table ";
        }

        public function get_where($array){
            $string;
            foreach($array as $key => $value){
                $string = "WHERE " . $key . ' = ' . $value;
            }
            return $string;
        }

        public function sql_query($sql){
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }
    }
?>