<?php
    class Database
    {
        private $host = "localhost";
        private $db_name = "my_capelliluca";
        private $username = "capelliluca";
        private $password = "";
        public $connectionDB;

        public function connect()
        {
            $connectionDB = new mysqli($this->host,$this->username,$this->password);
            $connectionDB->query("create database if not exists $this->db_name");
            try
            { 
                $connectionDB = new mysqli($this->host,$this->username,$this->password,$this->db_name);
            }
            catch (mysqli_sql_exception $e)
            { 
                throw $e;
                echo "Connection error: " . $e->getMessage();
            }
            $connectionDB->query('create table if not exists users(username char(30) primary key not null,password char(32) not null);');
            return $connectionDB;
        }
    }
?>