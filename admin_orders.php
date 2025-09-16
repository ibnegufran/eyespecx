<?php
include 'connect.php';
session_start();
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_POST['update'])){
    $order_id=$_POST['id'];
    $payment_status=$_POST['payment_status'];
    mysqli_query($con,"UPDATE `orders` SET payment_status='$payment_status' WHERE id='$order_id'") or die('query failed');
   $message[] = 'payment status has been updated!';
}
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    mysqli_query($con,"DELETE FROM  `orders` WHERE id='$delete_id'") or die('query failed');
    header('location:admin_orders.php');
   $message[] = 'payment status has been deleted!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders  </title>
    <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'admin_header.php';?>
        <section class="order_section">
    <h1 class="order_heading">placed orders</h1>
            <div class="orders">
                <?php
                $select_orders=mysqli_query($con,"SELECT * FROM `orders`" ) or die('query failed');
                if(mysqli_num_rows($select_orders)>0){
while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
<div class="order_box">
    <p>user id : <span><?php echo $fetch_orders['user_id']?></span></p>
    <p>name : <span><?php echo $fetch_orders['name']?></span></p>
    <p>number : <span><?php echo $fetch_orders['number']?></span></p>
    <p>email : <span><?php echo $fetch_orders['email']?></span></p>
    <p>address : <span><?php echo $fetch_orders['address']?></span></p>
    <p>method : <span><?php echo $fetch_orders['method']?></span></p>
    <p>total products : <span><?php echo $fetch_orders['total_products']?></span></p>
    <p>total price : <span><?php echo $fetch_orders['total_price']?></span></p>
    <p>placed on : <span><?php echo $fetch_orders['placed_on']?></span></p>
    <form action="" method="post">
<input type="hidden" name="id" value="<?php echo $fetch_orders['id']?>">
<select name="payment_status" id="update_status">
 <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option> 
<!-- <option value="pending">pending</option> -->

<option value="pending">pending</option>
<option value="completed">completed</option>

</select>
<div class="order-buttons flex" style="margin-top: 1rem;">
<input type="submit" value="update" name="update" id="update_orderbtn" class="option-btn" style="margin-right: 1.5rem;">
<a href="admin_orders.php?delete=<?php echo $fetch_orders['id']?>" onclick="return confirm('delete this item')" id="order_delete" class="delete-btn" style="margin-left:0rem;">delete <i class="fas fa-trash"></i></a>
</div>
    </form>


</div>
<?php
}
}else{
echo '<p class="text">no orders added yet!</p>';

}

?>
                
            </div>
        </section>
<script src="admin.js"></script>
   
</body>
</html>






