<?php
    include 'connectionToDB.php';
    include 'user.php';
    
    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    
    if($user->signup())
    {
        $user_arr=array
                (
                    "status" => true,
                    "message" => "Registrato con successo !",
                    "username" => $user->username
                );
    }
    else
    {
        $user_arr=array
                (
                    "status" => false,
                    "message" => "Il tuo username esiste gia'!"
                );
    }
    print_r(json_encode($user_arr));
?>