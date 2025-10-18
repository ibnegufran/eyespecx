<?php

session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(($email == 'abdurrahman@gmail.com') && ($pass == 'abdurrahman123')){
        $_SESSION['admin_name'] = 'Abdur Rahman';
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_id'] = 1;
        header('location:admin_page.php');
        exit;
    } else {
        $message[] = 'unauthorized access';
    }
} 
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    font awewsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>ecommerce -website</title>
    <link type="text/css" href="countryapi.css">
    	<link rel="stylesheet" type="text/css" href="register.css">


        <link type="text/js" href="ecom.js">

    </head>
    <body >
        <?php
        if(isset($message)){
            foreach($message as $message){
                echo '
                <div class="message">
        <span>'.$message.'</span>
            <i class="fa fa-times" onclick="this.parentElement.remove()"></i>
        
        </div>
                
                ';
            }
        }
        
        
        
        ?>
        
    <div class="body flex">
        
            <div class="container flex">
        <h2>login now!</h2>
        <form method="post" action="">
                        <input type="email" placeholder="pleace enter your email" name="email">
            <input type="password" placeholder="pleace enter your password " name="password">
            
            <input type="submit" name="submit" id="btn"  value="login">

          
            
            
            </form>
        
        
        </div>
        
        
        
        </div>
        
        
        
        
    </body>
</html>
