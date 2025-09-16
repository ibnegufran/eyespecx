<?php
include 'connect.php';
session_start();
$user_id=$_SESSION['user_id'];
// agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
if(!isset($user_id)){
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders  </title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php';?>
  <section class="header" style="background-image: url('https://t4.ftcdn.net/jpg/05/04/78/25/360_F_504782581_LHwsDbXlrFiiadWC4i15yV2lhbJnB8g0.jpg');">
            <h3 class="title">orders placed</h3>
            <p><a href="home.php">home</a> / <a href="orders.php">orders</a></p>
        </section>

        <section class="orders_sec">
            <h1 class="title">placed orders</h1>
            <div class="orders_con">
                <?php
                $select_orders=mysqli_query($con,"SELECT * FROM `orders` WHERE user_id='$user_id'") or die('query failed');

                if(mysqli_num_rows($select_orders)>0){
                    while ($fetch_orders =mysqli_fetch_assoc($select_orders)) {
                ?>
                        <div class="box">
                            <p>placed_on: <span><?php echo $fetch_orders['placed_on'];?></span></p>

                            <p>number: <span><?php echo $fetch_orders['number'];?></span></p>
                            <p>email: <span><?php echo $fetch_orders['email'];?></span></p>
                            <p>address: <span><?php echo $fetch_orders['address'];?></span></p>
                            <p>payment method: <span><?php echo $fetch_orders['method'];?></span></p>
                            <p>your orders: <span><?php echo $fetch_orders['total_products'];?></span></p>
                            <p>total_price: <span><?php echo $fetch_orders['total_price'];?></span></p>
                            <p>payment_status: <span style=color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red';}else{echo 'green';}?>;><?php echo $fetch_orders['payment_status'];?></span></p>
                           

                        </div>




                    <?php  
                    }
                }else{
                        echo '<p class="text">no orders placed yet!</p>';
                    }

?>
            </div>


        </section>







    <?php include 'footer.php'?>
    <script src="script.js"></script>
</body>
</html>