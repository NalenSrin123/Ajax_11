<?php include '../components/sidebar.php' ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Add Product</h2>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="" class="form-label">Qty</label>
                <input type="text" name="qty" id="qty" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea name="description" id="description" rows="7" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group mt-4 d-flex justify-content-end gap-2">
            <button class="btn btn-danger" id="btnCancel" type="button">Cancel</button>
            <button class="btn btn-primary" id="btnSave" type="button">Submit</button>

        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#btnSave').click(function(){
            var name=$('#name').val();
            var price=$('#price').val();
            var qty=$('#qty').val();
            var des=$('#description').val();
            var formData=new FormData();
            var fileName=$('#image')[0].files[0];
            formData.append('image',fileName);
            formData.append('name',name);
            formData.append('price',price);
            formData.append('qty',qty);
            formData.append('description',des);
            $.ajax({
                url:'insert.php',
                method:'post',
                data:formData,
                contentType:false,
                processData:false,
                cache:false,
                success:function(response){
                    $('.contain').append(`
                        <div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert">
                            ${response}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `); 
                }
            })
            
        });
    });
</script>