<?php
include "authguard.php";
include "menu.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Document</title>
</head>
<body style="margin:0">

    <div class="d-flex justify-content-center align-item-center vh-100">
    
    <form action="upload.php" method="post" class="w-40 h-50  bg-info p-3" enctype="multipart/form-data">

        <h4 class="text-center text-white">Add product</h4>
        <input required type="text" placeholder="Product Name" class="form-control mt-2" name="name">

        <input required type="number" placeholder="Product Price" class="form-control mt-2" name="price">

     <textarea required name="detail" cols="20" rows="3" class="form-control mt-2" placeholder="Product Description"></textarea>

     <input name="pdtimg" required type="file" class="form-control mt-2">

     <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Upload</button>
     </div>
    </form>
    </div>
    

</body>
</html>