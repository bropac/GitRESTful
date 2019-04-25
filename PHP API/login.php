<?php
    include 'connectToDB.php';
    include 'user.php';

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    
    if(isset($_GET['username']) && isset($_GET['password']))
    {
        $user->username = $_GET['username'];
        $user->password = $_GET['password'];
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
                    "id" => $row['id'],
                    "username" => $row['username']
                );
    }
    else
    {
        $user_arr=array
                (
                    "status" => false,
                    "message" => "Invalid Username or Password!",
                );
    }
    print_r(json_encode($user_arr));
?>