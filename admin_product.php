<?php
include 'connect.php';
// error_reporting(0);
session_start();
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_POST['add-product'])){
    //agar form submit ho gaya tha
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image_name;
   
$select_product_name=mysqli_query($con,"SELECT name FROM `products` WHERE name='$name'")
or die('query failed');

if(mysqli_num_rows($select_product_name)>0){
    $message[]='product already exist';
}else{
$add_product_query=mysqli_query($con,"INSERT INTO `products`(name,price,image)VALUES('$name','$price','$image_name')")or die('query failed');
if($add_product_query){
    if($image_size>2000000){
        $message[]='too big image size';
    }else{
        move_uploaded_file($image_tmp_name,$image_folder);
        $message=['product inserted successfully'];
        // $message[]='product inserted successfully';

        

    }
}else{
    $message[]='product inserting failed';

}
}
}
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $delete_img=mysqli_query($con,"SELECT image FROM `products` WHERE id='$del_id'")or die ('query failed');
    $fetch_del_pro=mysqli_fetch_assoc($delete_img);
    unlink("uploaded_img/".$fetch_del_pro['image']);
 mysqli_query($con,"DELETE  FROM `products` WHERE id='$del_id'")or die('query failed') ;
 header("location:admin_product.php");
}

if(isset($_POST['update_product'])){
    $update_p_id=$_POST['update_p_id'];
    $update_p_name=$_POST['update_name'];
    $update_p_price=$_POST['update_price'];

    
    
    mysqli_query($con,"UPDATE `products` SET name='$update_p_name',price=' $update_p_price' WHERE id ='$update_p_id'") or die('query failed');
    $update_img=$_FILES['update_image']['name'];
    $update_img_size=$_FILES['update_image']['size'];
    $update_img_tmp_name=$_FILES['update_image']['tmp_name'];
    $update_img_folder='uploaded_img/'.$update_img;
    $update_old_img=$_POST['update_old_image'];
    if(!empty($update_img)){
        if( $update_img_size>2000000){
$message[]="image size is too big";
        }
        else{
            mysqli_query($con,"UPDATE `products` SET image='$update_img' WHERE id ='  $update_p_id'") or die('query failed');
move_uploaded_file($update_img_tmp_name, $update_img_folder);
unlink('uploaded_img/'.$update_old_img);
        }
    }
    header("location:admin_product.php");

}

?>








<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admin-page</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
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
    <?php
    include 'admin_header.php'
    ?>
<h1 class="product_heading">shop products</h1>
    <div class="add-products flex">
<div class="form flex">
<h2> products</h2>
<form action="" method="post" class="flex" enctype="multipart/form-data">
<input type="text" name="name" id="" placeholder="enter product name" required>
<input type="number" name="price" id="" placeholder="enter product price" required>
 <input type="file" name="image"  accept=".jpg  ,.jpeg, .png"  id="file" required>
<input type="submit"  name="add-product" value="add product" id="" class="btn">






</form>


</div>


    </div>
    <div class="show-product flex">
        <div class="product-box">
<?php
$select_product=mysqli_query($con,"SELECT * FROM products")or die ('query failed');
if(mysqli_num_rows($select_product)>0){
while($fetch_products=mysqli_fetch_assoc($select_product)){
    ?>
<div class="box flex">
<img src="uploaded_img/<?php echo $fetch_products['image'];?>" alt="" >  
<p class="product-name"><?php echo $fetch_products['name'];?></p>  
<p class="product-price">$<?php echo $fetch_products['price'];?>/-</p>  
<div class="button">
    <a href="admin_product.php?update=<?php echo $fetch_products['id'];?>" id="update">UPDATE</a>
    <a href="admin_product.php?delete=<?php echo $fetch_products['id'];?>" id="delete" onclick="return confirm('are you sure to delete the product ')">DELETE</a>

</div>
</div>
<?php
}
}else{
    echo '    <p class="text">no product added yet!</p>';
}
?>

        </div>
    </div>
    <section class="edit-sec">

<?php
if(isset($_GET['update'])){
    $update_id=$_GET['update'];
    $update_query=mysqli_query($con,"SELECT * FROM products WHERE id='$update_id'")or die ('query failed');
    if(mysqli_num_rows($update_query)>0){
        while($row=mysqli_fetch_assoc($update_query)){
            ?>
    <div class="update_container flex">
    <form action="" method="post" class="" enctype="multipart/form-data">
        <input type="hidden" name="update_p_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $row['image']; ?>">

        <img src="uploaded_img/<?php echo $row['image']; ?>" alt="">
<input type="text"  value="<?php echo $row['name']; ?>" name="update_name" id="update_name" placeholder="enter product name"  class="update-input">
<input type="number"  value="<?php echo $row['price'];?>" name="update_price" id="update_price" placeholder="enter product price"  class="update-input">
 <input type="file"  value="<?php echo $row['image'];?>"  name="update_image"  accept=".jpg  ,.jpeg, .png"  id="file" class="update-input">
<div class="buttons">
<input type="submit"  name="update_product" value="update" id="update_btn" class="btn">
<input type="reset"  name="reset-product" value="reset" id="reset" class="option-btn">
</div>
</form>
</div>

<?php
}
    }
}else{
echo '<script>   
document.querySelector(".update_container").style.display="none";

</script>';
}

?>



    </section>
<script src="admin.js"></script>
</body>
</html>
<!-- SET @autoid:=0;
UPDATE products set id=(@autoid:=1);
ALTER TABLE products AUTO_INCREMENT=1; -->