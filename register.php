<?php

include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
        $email=$_POST['email'];
    $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];

    $user_type=$_POST['user_type'];

    $select_users=mysqli_query($con,"Select  * from `register` Where email ='$email' AND password='$pass'");

    if(mysqli_num_rows($select_users)>0){
       $message[]='user already exist';
       
    }else{
        if($pass == $cpass){
            mysqli_query($con,"INSERT INTO `register`(name,email,password,user_type) VALUES('$name','$email','$pass','$user_type')") or die('query failed');
            $message[]='data inserted successfully';
                        header('location:login.php');

        }else{
            $message[]='password not mathed';
        }
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
        <h2>register now!</h2>
        <form method="post" action="">
            <input type="text" placeholder="pleace enter your name" name="name">
                        <input type="email" placeholder="pleace enter your email" name="email">
            <input type="password" placeholder="pleace enter your password " name=" password">
            <input type="password" placeholder="pleace confirm your password" name="cpassword">
            <select name="user_type">
            <option value="user">user</option>
                            <option value="admin">Admin</option>

            
            </select>
            <input type="submit" name="submit" id="btn"  value="register">

            <p class="p">already have an accont?    <a href="login.php">login now</a></p>
            
            
            </form>
        
        
        </div>
        
        
        
        </div>
        
        
        
        
    </body>
</html>
