<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h3>Login Form</h3>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Enter email...">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter password...">
            </div>
            <div class="form-button">
                <a href="register.php">Create an account</a>
                <button name="login">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
session_start();
    include '../connection.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['password'];
        global $con;
        $getuser="SELECT * FROM `tbuser` WHERE `email`='$email' AND `password`='$pass'";
        $exe=$con->query($getuser);
        if($exe->num_rows>0){
            $_SESSION['login']=$email;
            $user=$exe->fetch_assoc();
            $_SESSION['role']=$user['role'];
            if($user['role']==0){
                header('location: ../Frontend/index.php');
            }else{
                 header('location: ../Backend/index.php');
            }
        }else{
            header('location: login.php');
        }
    }
?>