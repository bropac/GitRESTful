<?php
    class User
    {
        private $connectionDB;
        private $table = "user";

        public $id;
        public $username;
        public $password;
        public $created;

        public function __construct($db)
        {
            $connectionDB = $db;
        }

        function signup()
        {
            if($this->isAlreadyExist())
            {
                return false;
            }

            $stmt = $this->connectionDB->prepare('insert into '.$this->table.' values (?,?,?) ');

            $username=htmlspecialchars(strip_tags($username));
            $password=htmlspecialchars(strip_tags($password));
            $created=htmlspecialchars(strip_tags($created));

            $stmt->bindParam('sss', $username,$password,$created);

            if($stmt->execute())
            {
                $id = $this->connectionDB->lastInsertId();
                return true;
            }
            return false;
        }

        function isAlreadyExist()
        {
            if($this->connectionDB->execute('select * from '.$this->table.' where username="'.$this->username.'";')->num_rows > 0)
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
            return $this->connectionDB->execute('select id,username,password,created from '.$this->table.' where username='.$this->username.' and password='.$this->password.';');
        }
    }
?>