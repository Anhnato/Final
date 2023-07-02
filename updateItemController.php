<?php
    include_once "config.php";

    $product_id=$_POST['product_id'];
    $p_name= $_POST['product_name'];
    $p_desc= $_POST['product_desc'];
    $p_price= $_POST['price'];

    if( isset($_FILES['newImage']) ){
        
        $location="";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $image;
        if (in_array($ext, $valid_extensions)) {
            $path = $dir . $image;
            move_uploaded_file($tmp, $path);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $query = "UPDATE product SET 
            product_name='$p_name', 
            product_desc='$p_desc',
            product_image='$final_image',
            price='$p_price'
            WHERE product_id='$product_id' ";

    echo ("$query");
    $updateItem = $conn -> query($query);

    if($updateItem)
    {
        echo "true";
    }
?>