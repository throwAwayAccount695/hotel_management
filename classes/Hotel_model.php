<?php require_once('Database.php');

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

        public function sql_query($sql, $clean = FALSE){
            $arr = NULL; 
            $result = mysqli_query($this->conn, $sql);
            if($clean){
                return $result;
            } else {
                while($res = mysqli_fetch_assoc($result)){
                    $arr[] = $res;
                }
                return $arr;
            }
        }

        public function insert_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>