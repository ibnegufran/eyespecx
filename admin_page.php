<?php
include 'connect.php';
session_start();
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}


?>








<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admin-pae</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
    <?php
    include 'admin_header.php' ;
    ?>
<section class="dashboard">

<h1>dashboard</h1>
<div class="box-container">
<div class="box">
<?php
$total_pendings=0;
$select_pendings=mysqli_query($con,"SELECT total_price FROM `orders` WHERE payment_status = 'pending' ")or die('query faile');
if(mysqli_num_rows($select_pendings)>0){
    while($fetch_pendings= mysqli_fetch_assoc($select_pendings)){
        $total_price=$fetch_pendings['total_price'];
        $total_pendings += $total_price;
    }
}


?>
<h3>$<?php echo $total_pendings;?>/-</h3>
<p>total pendings</p>


</div>
<div class="box">
<?php
$total_complete=0;
$select_complete=mysqli_query($con,"SELECT total_price FROM `orders` WHERE payment_status = 'completed' ")or die('query failed');
if(mysqli_num_rows($select_complete)>0){
    while($fetch_complete= mysqli_fetch_assoc($select_complete)){
        $total_price=$fetch_complete['total_price'];
        $total_complete += $total_price;
    }
}


?>
<h3>$<?php echo $total_complete;?>/-</h3>
<p>total completed</p>
</div>

<div class="box">
    <?php
    $select_orders=mysqli_query($con,"SELECT * FROM `orders`")or die('query failed');
    $num_of_orders=mysqli_num_rows($select_orders);

    ?>
    <h3><?php echo $num_of_orders;?></h3>
    <p>order placed</p>


</div>
<div class="box">
    <?php
    $select_products=mysqli_query($con,"SELECT * FROM `products`")or die('query failed');
    $num_of_products=mysqli_num_rows($select_products);

    ?>
    <h3><?php echo $num_of_products;?></h3>
    <p>added produts</p>


</div>
<div class="box">
    <?php
    $select_users=mysqli_query($con,"SELECT * FROM `register` WHERE user_type='user'")or die('query failed');
    $num_of_users=mysqli_num_rows($select_users);

    ?>
    <h3><?php echo $num_of_users;?></h3>
    <p>normal users</p>


</div>
<div class="box">
    <?php
    $select_admin=mysqli_query($con,"SELECT * FROM `register` WHERE user_type='admin'")or die('query failed');
    $num_of_admin=mysqli_num_rows($select_admin);

    ?>
    <h3><?php echo $num_of_admin;?></h3>
    <p> admin users</p>


</div>

<div class="box">
    <?php
    $select_users=mysqli_query($con,"SELECT * FROM `register`")or die('query failed');
    $num_of_users=mysqli_num_rows($select_users);

    ?>
    <h3><?php echo $num_of_users;?></h3>
    <p>total users</p>


</div>
<div class="box">
    <?php
    $select_message=mysqli_query($con,"SELECT * FROM `messages`")or die('query failed');
    $num_of_message=mysqli_num_rows($select_message);

    ?>
    <h3><?php echo $num_of_message;?></h3>
    <p>new messages</p>


</div>


</div>


</section>



<script src="admin.js"></script>
</body>
</html>