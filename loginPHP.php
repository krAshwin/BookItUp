<?php
include("mysql.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uid = $_POST["uid"];
    $pass = $_POST["password"];
    $error="";
    if(Authentication($uid,md5($pass)) == 0){
        $error = "Invalid Login Credentials!";
    }
    else{
        if($uid == 'admin')
        {
            session_start();
            $_SESSION["suname"] = $uid;
            header('Location: admin_panel.php');
        }
        else
        {
            session_start();
            $_SESSION["suname"] = $uid;
            header('Location: home.php');
        }
    }
}

?>