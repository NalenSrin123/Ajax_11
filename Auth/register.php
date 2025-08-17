<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Register Form</h3>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Profile</label>
                <input type="file" name="profile" id="" class="form-control" >
            </div>
            <div class="form-button">
                <a href="login.php">Already have account?</a>
                <button name="register">Resiter</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
include '../connection.php';
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $profile=rand(1,1000).'_'.$_FILES['profile']['name'];
        $tmp_name=$_FILES['profile']['tmp_name'];
        $path='../upload/'.$profile;
        move_uploaded_file($tmp_name,$path);
        global $con;
        $insert="INSERT INTO `tbuser`(`username`, `email`, `password`, `profile`) 
        VALUES ('$username','$email','$password','$profile')";
        $exe=$con->query($insert);
        if($exe){
            header('location: login.php');
        }
    }
?>