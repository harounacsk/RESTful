<?php 

    class Database{
        private $host='localhost';
        private $username='hrn';
        private $password='my_pass';
        private $dbname='testDB';
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        }


        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);
            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";
            return $this->mysqli->query($sql);
        }


        public function update($table,$para=array(),$id){
            $args = array();
            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'"; 
            }

            $sql="UPDATE  $table SET " . implode(',', $args);
            $sql .=" WHERE $id";
            return $this->mysqli->query($sql);
        }


        public function delete($table,$id){
            $sql="DELETE FROM $table";
            $sql .=" WHERE $id ";
            return $this->mysqli->query($sql);
        }

        public function select($table){
            $sql="SELECT * FROM $table";
            return $this->mysqli->query($sql);
        }

        public function close(){
            $this->mysqli->close();
        }
    }

?>