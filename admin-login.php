<?php
    require_once('config.php');

    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM AdminLogin WHERE email='$email' AND password='$password'";
        $result = $conn -> query($sql);
        $count = $result -> num_rows;
        if($count==1){
            $_SESSION['email']=$email;
            header("Location:index.php");
        }else{
            echo "Invalid Email or Password";
        }
    $conn -> close();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admim Login</title>
        <link rel="stylesheet" href="login.css">
    </head>

    <body>
        <div class="form-container">
            <form action="admin-login.php" method="post">
                <h3>LOGIN NOW</h3>
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <input type="submit" name="submit" value="Login">
            </form>
        </div>
    </body>

</html>