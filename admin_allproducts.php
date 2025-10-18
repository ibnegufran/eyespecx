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
    <title>All products</title>
</head>
<body>
<div class="dashboard-container">
    <?php
    include 'admin_sidebar.php' ;
    ?>
<section class="rightside">
    <h2>All Products</h2>
    <div class="product-con">
        
            <?php
            $select_products=mysqli_query($con,"SELECT * FROM `products`")or die('query faile');
            if(mysqli_num_rows($select_products)>0){
                while($fetch_product=mysqli_fetch_assoc($select_products)){
            ?>
            <div class="product">
                <img src="./<?php echo $fetch_product['image_url']; ?>" alt="">
                <h3><?php echo $fetch_product['brand']; ?></h3>
                <p><?php echo $fetch_product['name']; ?></p>
                <p><?php echo $fetch_product['category']; ?></p>
                <p>₹<?php echo $fetch_product['price']; ?>/-</p>
                <div class="btn-con">
                <button class="p-delete-btn">Delete</button>
                <button class="edit-btn">Edit</button>
                </div>

            </div>
            <?php
                }
            }else{
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
    
    </div>
</section>
</div>
 
</body>
</html>