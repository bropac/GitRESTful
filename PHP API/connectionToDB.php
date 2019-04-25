<?php
    class Database
    {
        private $host = "localhost";
        private $db_name = "restfull";
        private $username = "root";
        private $password = "";
        public $connectionDB;

        public function connect()
        { 
            $connectionDB = null;
     
            try
            { 
                $connectionDB = new mysqli($this->host,$this->username,$this->password,$this->db);
            }
            catch (mysqli_sql_exception $e)
            { 
                throw $e;
                echo "Connection error: " . $e->getMessage();
            }
            return $connectionDB;
        }
    }
?>