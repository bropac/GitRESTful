<?php
    include 'connectionToDB.php';
    include 'user.php';

    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        
    }
    else
    {
        die();
    }
    
    $stmt = $user->login();
    if($stmt->num_rows > 0)
    {
        $row = $stmt->fetch_assoc();
        $user_arr=array
                (
                    "status" => true,
                    "message" => "Accesso eseguito con successo !",
                    "username" => $row['username']
                );
    }
    else
    {
        $user_arr=array
                (
                    "status" => false,
                    "message" => "Username o Password errati !",
                );
    }
    print_r(json_encode($user_arr));
?>