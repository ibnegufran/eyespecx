<?php
include 'connect.php';
session_start();
$user_id=$_SESSION['user_id'];
// agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['update_cart'])){
    $product_id=$_POST['product_id'];
    $product_qty=$_POST['product_qty'];
    mysqli_query($con,"UPDATE `cart` SET quantity='$product_qty' WHERE id='$product_id'") or die('query failed');
    $message=array();
$message[]='your product is updated';
}

if(isset($_GET['delete'])){
$delete_id=$_GET['delete'];
mysqli_query($con,"DELETE  FROM `cart` WHERE id='$delete_id'") or die('query failed');
    header('location:cart.php');

}


if(isset($_GET['delete_all'])){
mysqli_query($con,"DELETE  FROM `cart` WHERE user_id='$user_id'") or die('query failed');
    header('location:cart.php');

}
$grand_total=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php';?>

  <section class="header" style="background-image: url('https://t3.ftcdn.net/jpg/01/17/33/22/360_F_117332203_ekwDZkViF6M3itApEFRIH4844XjJ7zEb.jpg');">
            <h3 class="title" style="color: var(--white)">added products</h3>
            <p style="color: white;" ><a href="home.php"style="color: white;">home</a> / <a href="" style="color: white;">cart</a></p>
        </section>

<section class="cart">
    <!-- <h1 class="title">product added</h1> -->
    <div class="cart-con">
        
        <?php
$select_product=mysqli_query($con,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

if(mysqli_num_rows($select_product)>0){
    while($fetch_products=mysqli_fetch_assoc($select_product)){

        ?>
<div class="box">
    <a href="cart.php?delete=<?php echo $fetch_products['id'];?>" class="" onclick="return confirm('are you sure to delete this item from cart')"><i class="fas fa-times"></i></a>
      <img src="uploaded_img/<?php echo $fetch_products['image'];?>">
        <div class="name"><?php echo $fetch_products['name'];?></div>
        <div class="price">$<?php echo $fetch_products['price'];?>/-</div>
        <form method="post">
            

        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'];?> ">
        <input type="number" class="qty" name="product_qty" value="<?php echo $fetch_products['quantity'];?>"  min="1">
        <input type="submit"  value="update" name="update_cart" class="option-btn">
        </form>
        <div class="sub_total">
            <p>sub-total :  <span>$<?php echo $sub_total=($fetch_products['price'] * $fetch_products['quantity']);
  
            ?>/-</span></p>

        </div>

</div>






        <?php
        $grand_total += $sub_total;
    }
}else{
    echo '<p class="text">your cart is empty</p>';
}
?>
    </div>

<div style="margin-top: 2rem;  text-align:center;">
    <a href="cart.php?delete_all" class="delete-btn  <?php echo ($grand_total >1) ? '' : 'disabled';?>" onclick="return confirm('are you sure to delete all items from cart')">dalete all</a>
           
    
</div>

<div class="cart-total">
     <p>grand-total :  <span>$<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="option-btn" style="margin-right: 1rem;">continue shopping</a>
            <a href="checkout.php" class="option-btn <?php echo ($grand_total >1) ? '' : 'disabled';?>">continue to checkout</a>

</div>

</section>





    <?php include 'footer.php'?>
    <script src="script.js"></script>
</body>
</html>