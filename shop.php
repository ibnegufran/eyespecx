<?php
include 'connect.php';
session_start();
$user_id=$_SESSION['user_id'];
// agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
if(!isset($user_id)){
    header('location:login.php');
}


 if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_qty=$_POST['product_qty'];




    $check_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart)>0){
      // $message[] = 'already added to cart!';
      $message[] = 'already added to cart!';
    }else{
        mysqli_query($con,"INSERT INTO `cart`(user_id,name,price,quantity,image)  VALUES('$user_id','$product_name','$product_price','$product_qty','$product_image')") or die('query failed');
          
      $message[] = 'product added to cart!';

    }




    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php';?>
    
    <section class="header" style="background-image: url(images/bg3.avif);">
            <h3 class="title" style="color: var(--orange);">our shop</h3>
            <p style="font-size: 1.8rem;"><a href="home.php" style="font-size: 1.8rem;">home</a> / <a href="shop.php" style="font-size: 1.8rem;">shop</a></p>
        </section>


<section class="products">
        <h2 class="title">latest products</h2>
        <div class="box_con">
            <?php
            $select_products=mysqli_query($con,"SELECT * FROM `products`") or die('query failed');

            if(mysqli_num_rows($select_products)>0){
                while($fetch_products=mysqli_fetch_assoc($select_products)){
            ?>

    <div class="box">
    <form action="" method="post">
        <img src="uploaded_img/<?php echo $fetch_products['image'];?>">
        <input type="number" name="product_qty" value="1" class="qty" min="1">
        <div class="name"><?php echo $fetch_products['name'];?></div>
        <div class="price">$<?php echo $fetch_products['price'];?>/-</div>
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?> ">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?> ">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?> ">

        <input type="submit"  value="add to cart" name="add_to_cart" class="btn">

    </form>
        </div>

    <?php

                }
            }else{
                // echo '<p class="text">no products added yet</p>' ;
            }
    ?>


        </div>
       
    </section>







    <?php include 'footer.php'?>
    <script src="script.js"></script>
</body>
</html>