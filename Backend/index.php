<?php 
session_start();
    if(empty($_SESSION['login'])){
        header('location: ../Auth/login.php');
    }else{
        if($_SESSION['role']==0){
            header('location: ../Frontend/index.php');
        }
    }
?>
<h1>Hello Admin</h1>