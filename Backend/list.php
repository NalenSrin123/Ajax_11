<?php include '../components/sidebar.php' ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <h2>List Products</h2>
    <table class="table text-center align-middle mt-4" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Image</th>
                <th>Create At</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                include '../connection.php';
                global $con;
                $select="SELECT * FROM `tbproducts`";
                $exe=$con->query($select);
                while($row=$exe->fetch_assoc()){
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['price'].'$</td>
                            <td>'.$row['qty'].'</td>
                            <td><img width="60px" src="../upload/'.$row['image'].'" alt=""></td>
                            <td>'.$row['create_at'].'</td>
                        </tr>
                    ';
                }
            ?>
            
        </tbody>
    </table>
</div>