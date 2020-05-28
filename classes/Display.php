<?php require_once('classes/Hotel_model.php');

    class Display{
        private $model;

        function __construct($class){
            $this->model = $class;
        }

        public function select_all($table, $clean = FALSE){
            $sql = $this->model->get_content($table);
            return $this->model->sql_query($sql, $clean);
        }

        public function insert_into($table, $columns, $values){
            $columns_str = implode(',', $columns);
            $values_str = implode("','", $values);
            $sql = "INSERT INTO $table ($columns_str) VALUES ('$values_str')";
            $result = $this->model->insert_sql($sql);
            return $result;
        }

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

        public function get_room_type($id){
            $sql = $this->model->get_content('rooms');
            $sql = $sql . $this->model->get_where(array('room_id' => $id));
            $data = $this->model->sql_query($sql);
            $string = $data[0]['type'];
            $string = str_replace(' ', '_', $string);
            $string = strtolower($string);

            return $string;
        }

        public function get_files($folder, $search_for_type = '*'){
            $directory = "image/$folder/";
            $files = glob($directory . "*.$search_for_type");

            if ($files !== FALSE){
                return $files;
            } else {
                return '';
            }
        }

        public function count_files($folder, $search_for_type = '*'){
            $directory = "image/$folder/";
            $files = glob($directory . "*.$search_for_type");

            if ($files !== FALSE){
                $filecount = count($files);
                return $filecount;
            } else{
                return 0;
            }
        }

        public function get_salt(){
            return $this->model->get_salt_string();
        }

        public function close_conn(){
            $this->model->model_close_conn();
        }
    }

    $display = new Display(new Hotel_model($db->conn));
?>