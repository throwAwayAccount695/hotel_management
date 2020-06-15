<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_Management/classes/Hotel_model.php');

    /**
     * Controller Class.
     */
    class Display{
        /**
         * The Model class with all sql queries.
         */
        private $model;

        function __construct($class){
            $this->model = $class;
        }

        /**
         * Basic sql query. Selects everything from the given table. WHERE can be added manually.
         * 
         * @param string $table the table that you want data from, WHERE clouse can be added manually example: WHERE id = x.
         * @param bool $clean if false returns result as an associative array | if true returns query result.
         * 
         * @return array Retruns an array.
         */
        public function select_all($table, $clean = FALSE){
            $sql = $this->model->get_content($table);
            return $this->model->sql_query($sql, $clean);
        }

        /**
         * Method to insert data into the database.
         * 
         * @param string $table The table that you want to insert data into.
         * @param array $columns All the database columns that you want to insert into as a numbered array.
         * @param array $values All the values that you want inserted into the database as a numbered array.
         * 
         * @return bool Returns true if succesful else it returns false.
         */
        public function insert_into($table, $columns, $values){
            $columns_str = implode(',', $columns);
            $values_str = implode("','", $values);
            $sql = "INSERT INTO $table ($columns_str) VALUES ('$values_str')";
            $result = $this->model->insert_sql($sql);
            return $result;
        }

        /**
         * Method to delete data from the database.
         * 
         * @param string $table The table that you want to delete data from.
         * @param string $where An associative array with the KEY as column name and VALUE as the value that you want match.
         * 
         * @return bool Returns true if succesful else it returns false.
         */
        public function delete_row($table, $where){
            $where_str = '';
            foreach ($where as $key => $value) {
                $where_str .= $key . '=' . "'$value',";
            }
            $where_str = rtrim($where_str, ',');
            $sql = "DELETE FROM $table WHERE $where_str";
            $result = $this->model->delete_sql($sql);
            return $result;
        }

        /**
         * Method to update data from the database.
         * 
         * @param string $table The table that you want to update data in.
         * @param array $set_values An associative array with the KEY as the column and VALUE as the new updated value.
         * @param array $where An associative array with the KEY as column name and VALUE as the value that you want match.
         * 
         * @return bool Returns true if succesful else it returns false.
         */
        public function update($table, $set_values, $where){
            $set_values_str = "";
            $where_str = "";
            foreach ($set_values as $key => $value) {
                $set_values_str .= $key . "='" . $value . "',";   
            }
            foreach ($where as $key => $value) {
                $where_str .= $key . "='" . $value . "' && ";   
            }
            $set_values_str = rtrim($set_values_str, ',');
            $where_str = rtrim($where_str, '&& ');
            $sql = "UPDATE $table SET $set_values_str WHERE $where_str";
            $result = $this->model->update_sql($sql);
            return $result;
        }

        /**
         * Get the Room Type from the database using the Rooms ID.
         * 
         * @param int $id The id of the room that you want to get Type from.
         * 
         * @return string Return a string with the room type.
         */
        public function get_room_type($id){
            $sql = $this->model->get_content("rooms WHERE room_id = '$id'");
            $data = $this->model->sql_query($sql);
            $string = $data[0]['type'];
            $string = str_replace(' ', '_', $string);
            $string = strtolower($string);

            return $string;
        }

        /**
         * Get all files belonging to a folder.
         * 
         * @param string $folder The path to the directory that you want files from.
         * @param string $search_for_type OPTIONAL! | specify the file extension that you are looking for.
         *    
         * @return mixed Returns an array with all file paths | if no files are found, returns an empty string.
         */
        public function get_files($folder, $search_for_type = '*'){
            $directory = "$folder/";
            $files = glob($directory . "*.$search_for_type");

            if ($files !== FALSE){
                return $files;
            } else {
                return '';
            }
        }

        /**
         * Gets the total number of found files in a folder.
         * 
         * @param string $folder The path to the directory that you want files from.
         * @param string $search_for_type OPTIONAL! | specify the file extension that you are looking for.
         *    
         * @return int Returns the number of found files  | if no files are found, returns an 0.
         */
        public function count_files($folder, $search_for_type = '*'){
            $directory = "$folder/";
            $files = glob($directory . "*.$search_for_type");

            if ($files !== FALSE){
                $filecount = count($files);
                return $filecount;
            } else{
                return 0;
            }
        }

        /**
         * gets the salt for use in password hashing.
         */
        public function get_salt(){
            return $this->model->get_salt_string();
        }

        /**
         * Closes the connection to the database. | Should be called as the very last thing in a php file.
         */
        public function close_conn(){
            $this->model->model_close_conn();
        }
    }

    $display = new Display(new Hotel_model($db->conn));
?>