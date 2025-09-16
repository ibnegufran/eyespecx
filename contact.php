<?php
include 'connect.php';

session_start();

$user_id=$_SESSION['user_id'];
// agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
if(!isset($user_id)){
    header('location:login.php');
}



if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $message=$_POST['message'];

$select_message=mysqli_query($con,"SELECT * FROM `messages` WHERE name='$name' AND email='$email' AND number='$number' AND message='$message'") or die('query failed');
    if(mysqli_num_rows($select_message)>0){
        // $message=[];

     $message=array();
      $message[] = 'message sent already!';
    
   

      
        
    }else{
        mysqli_query($con,"INSERT INTO `messages`(user_id,name,email, number,message) VALUES('$user_id','$name','$email','$number','$message')") or die('query failed');
     $message=array();
        
        $message[]='message successfully send';

    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php';?>


    <section class="header" style="background-image: url('https://t4.ftcdn.net/jpg/05/04/78/25/360_F_504782581_LHwsDbXlrFiiadWC4i15yV2lhbJnB8g0.jpg');">
            <h3 class="title">contact  us</h3>
            <p><a href="home.php">home</a> / <a href="contact.php">contact</a></p>
        </section>



<section class="contact">
    <div class="box-con">
    <h1 class="title" style="color: var(--black); font-size: 3rem;">say something!</h1>
        <form method="post">
            <input type="text" name="name" required placeholder="enter your name" class="box">
            <input type="email" name="email" required placeholder="enter your email" class="box">
            <input type="number" name="number" required placeholder="enter your mobile number" class="box">
            <textarea name="message" placeholder="enter your message here" rows="10" cols="40"></textarea>
                <input type="submit" name="send" value="send message" class="btn">

        </form>
    </div>


</section>







    <?php include 'footer.php'?>
    <script src="script.js"></script>
</body>
</html>