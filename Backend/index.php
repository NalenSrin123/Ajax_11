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

<?php 
    include '../components/sidebar.php';
?>
<h1>Dashboard</h1>