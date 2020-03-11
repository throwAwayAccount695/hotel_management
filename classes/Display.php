<?php require_once('classes/Hotel_model.php');

    class Display{
        private $model;

        function __construct($class){
            $this->model = $class;
        }

        public function get_room_type($id){
            $sql = $this->model->get_content('rooms');
            $sql = $sql . $this->model->get_where(array('room_id' => $id));
            $data = $this->model->sql_query($sql);
            $string = $data['type'];
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
    }

    $display = new Display(new Hotel_model($con));
?>