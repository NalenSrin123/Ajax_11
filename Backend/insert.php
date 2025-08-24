<?php 
    date_default_timezone_set('Asia/Phnom_penh');
    $name=$_POST['name'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $image=date('y_m_d_h_i_s').'_'.$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $path='../upload/'.$image;
    move_uploaded_file($tmp_name,$path);
    $des=$_POST['description'];
    include '../connection.php';
    global $con;
    $insert="INSERT INTO `tbproducts`(`name`, `price`, `qty`, `image`, `description`) 
    VALUES ('$name','$price','$qty','$image','$des')";
    $exe=$con->query($insert);
    if($exe){
        echo 'Insert Successfull.';
    }
?>