<?php
include "connection.php";

session_start();

$user = $_POST["nombre"];
$pass = $_POST["contraseña"];
    
$statement = $mysql->prepare("SELECT nombre, contraseña FROM users WHERE nombre= ? AND contraseña = ?");
$statement->bind_param("ss", $user, $pass);

$statement->execute();
$statement->bind_result($username, $email);

$statement->fetch();

if($username != null){
    $_SESSION["name"] = $user;
    $_SESSION["auth"] = $user;
    //valid user
    echo "Valid user";
    header('location:../views/index.php');
}
else{
    session_destroy();
    //invalid user
    echo "Invalid user";
    header('location:../views/login.php');
}

?>