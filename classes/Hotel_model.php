<?php require_once('Database.php');

    /**
     * Model class.
     */
    class Hotel_model{
        /**
         * database connection.
         */
        private $conn;
        /**
         * Salt string used at the end of passwords in the password hashing proccess.
         */
        private $salt = "JK23!";

        function __construct($conn){
            $this->conn = $conn;
            $this->conn->set_charset("utf8");
        }

        /**
         * Gets salt string.
         */
        public function get_salt_string(){
            return $this->salt;
        }

        /**
         * Closses the connection to the database.
         */
        public function model_close_conn(){
            $this->conn->close();
        }

        /**
         * Gets everything from a table
         * 
         * @param $table The table that you want data from
         * 
         * @return string Returns an SQL string.
         */
        public function get_content($table){
            return "SELECT * FROM $table ";
        }

        /**
         * Performs a query on a SQL string.
         * 
         * @param string $sql An SQL string.
         * @param bool $clean weather you want the query result returnet as Assoc or Query result.
         * 
         * @return mixed if FALSE returns associative array | if TRUE returns a query result.
         */
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

        /**
         * Performs a query.
         * 
         * @param string $sql An SQL string.
         * 
         * @return bool returns TRUE on success else it returns FALSE.
         */
        public function insert_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        /**
         * Performs a query.
         * 
         * @param string $sql An SQL string.
         * 
         * @return bool returns TRUE on success else it returns FALSE.
         */
        public function delete_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        /**
         * Performs a query.
         * 
         * @param string $sql An SQL string.
         * 
         * @return bool returns TRUE on success else it returns FALSE.
         */
        public function update_sql($sql){
            if(mysqli_query($this->conn, $sql)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>