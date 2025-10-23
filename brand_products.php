<?php
include 'connect.php';
if(isset($_GET['gender']) && isset($_GET['brand'])){
    $gender = $_GET['gender'];
    $brand = $_GET['brand'];
    $heading = $gender." ". " Glasses aayega";
    $select_products=mysqli_query($con,"SELECT * FROM products WHERE gender='$gender' AND brand='$brand'") or die('query failed');
} elseif (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
    $heading = $brand . " Glasses";
    $select_products=mysqli_query($con,"SELECT * FROM products WHERE brand='$brand'") or die('query failed');
} else {
    echo "<h2>No brand selected!</h2>";
    exit;
}



?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>orders </title>
     <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
     <link rel="stylesheet" type="text/css" href="optics.css">

     <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 </head>

 <body>
   
     <?php include 'header.php'; ?>
<div class="category-product">
    <h2><?php echo $heading ?></h2>
<div class="product-con">
                    <?php
                    
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products=mysqli_fetch_assoc($select_products)){   
                    ?>
                     <a href="product_details.php?id=<?php echo $fetch_products['id']?>" class="product">
                         <img src="<?php echo $fetch_products['image_url']?>" alt="">
                         <p class="name"><?php echo $fetch_products['brand'] ?></p>
                         <p class="model"><?php echo $fetch_products['name'] ?></p>
                         <p class="price">₹<?php echo $fetch_products['price'] ?></p>

                        </a>
                    <?php
                        }   
                    }else{
                        echo '<p class="empty">no products added yet!</p>'; 
                    }
                    ?>
                 </div>

</div>



     </body>
     </html>