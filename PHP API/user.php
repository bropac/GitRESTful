<?php
    class User
    {
        private $connectionDB;
        private $table = "users";

        public $id;
        public $username;
        public $password;

        public function __construct($db)
        {
            $this->connectionDB = $db;
        }

        function signup()
        {
            if($this->isAlreadyExist())
            {
                return false;
            }

            $stmt = $this->connectionDB->prepare('insert into '.$this->table.' values (?,md5(?)) ');

            $stmt->bind_param('ss',$this->username,$this->password);

            if($stmt->execute())
            {
                return true;
            }
            return false;
        }

        function isAlreadyExist()
        {
            if($this->connectionDB->query('select * from '.$this->table.' where username="'.$this->username.'";')->num_rows > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function login()
        {
            return $this->connectionDB->query('select * from '.$this->table.' where username="'.$this->username.'" and password=md5("'.$this->password.'");');
        }
    }
?>