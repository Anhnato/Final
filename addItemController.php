<?php
    include_once "config.php";
    
    if(isset($_POST['upload']))
    {
        $productName = $_POST['product_name'];
        $desc= $_POST['product_desc'];
        $price = $_POST['price'];
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        echo("temp<br>");

        $target_dir="";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp, $finalImage);

         $insert = "INSERT INTO product
         (product_name, product_image, price, product_desc) 
         VALUES ('$productName', '$finalImage', '$price', '$desc')";

        echo($insert);
        $result = $conn -> query($insert);
        
        if(!$result) {
            echo mysqli_error($conn);
        }else{
            echo "Add successfully";
        }
     
    }
        
?>