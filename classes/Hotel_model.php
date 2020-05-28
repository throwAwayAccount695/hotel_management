<?php require_once('Database.php');

    class Hotel_model{
        private $conn;
        private $salt = "JK23!";

        function __construct($conn){
            $this->conn = $conn;
        }

        public function get_salt_string(){
            return $this->salt;
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

        public function delete_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function update_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>