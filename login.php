<?php

include 'connect.php';
session_start();
if(isset($_POST['submit'])){
        $email=$_POST['email'];
    $pass=$_POST['password'];


    $select_users=mysqli_query($con,"Select  * from `register` Where email ='$email' AND password='$pass'");

    if(mysqli_num_rows($select_users)>0){
        $row=mysqli_fetch_assoc($select_users);
        // mtlb agar bandah registered hai to jo email aur pass. dala hai uski row ko fetch karlo mtlab sari info.
        if($row['user_type'] == 'admin'){

            if(($row['email'] == 'abdurrahman@gmail.com') && ($row['password'] == 'abdurrahman123')){
            $_SESSION['admin_name']=$row['name'];
            $_SESSION['admin_email']=$row['email'];
            $_SESSION['admin_id']=$row['id'];
            header('location:admin_page.php');
            }else{
        $message[]='unauthorized access';

            }

        }elseif($row['user_type'] =='user'){
            $_SESSION['user_name']=$row['name'];
            $_SESSION['user_email']=$row['email'];
            $_SESSION['user_id']=$row['id'];
            header('location:home.php');

        }

    }else{
        
        $message[]='incorrect email and password';
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
            <input type="password" placeholder="pleace enter your password " name=" password">
            
            <input type="submit" name="submit" id="btn"  value="login">

            <p class="p">don't have accont?    <a href="register.php">register now</a></p>
            
            
            </form>
        
        
        </div>
        
        
        
        </div>
        
        
        
        
    </body>
</html>
