<?php
include 'connect.php';
// error_reporting(0);
session_start();
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}
$message =[];
 // your database connection file

if (isset($_POST['add-product'])) {

    // --- Basic product details ---
    $name     = $_POST['model_name'];
    $price    = $_POST['price'];
    $category = $_POST['category'];
    $brand    = $_POST['brand'];
    $type     = $_POST['type'];
    $description= $_POST['description'];


    // --- MAIN IMAGE handling ---
    $mainImageName = $_FILES['image']['name'];
    $mainImageTmp  = $_FILES['image']['tmp_name'];
    $mainImageSize = $_FILES['image']['size'];
    $mainImagePath = 'uploaded_image/' . $mainImageName;

    // --- ADDITIONAL IMAGES handling ---
    $additionalPaths = [];

    if (!empty($_FILES['additional_images']['name'][0])) {
        foreach ($_FILES['additional_images']['tmp_name'] as $key => $tmpName) {
            $fileName = $_FILES['additional_images']['name'][$key];
            $fileTmp   = $_FILES['additional_images']['tmp_name'][$key];
            $filePath  = 'uploaded_image/' . $fileName;

            if (move_uploaded_file($fileTmp, $filePath)) {
                $additionalPaths[] = $filePath;
            }
        }
    }

    // Convert all additional image paths into a single text (JSON)
    $additionalImagesText = json_encode($additionalPaths);

    // --- Validation: product already exists ---
    $checkQuery = mysqli_query($con, "SELECT name FROM products WHERE name='$name'");

    if (mysqli_num_rows($checkQuery) > 0) {
        $message[] = "Product already exists.";
    } else {
        // --- Save to database ---
        if ($mainImageSize > 2000000) {
            $message[] = "Main image too large (max 2MB).";
        } else {
            // Move main image first
            move_uploaded_file($mainImageTmp, $mainImagePath);

            $insertQuery = mysqli_query($con, "
                INSERT INTO products (name, price, category, brand, type, image_url, additional_images)
                VALUES ('$name', '$price', '$category', '$brand', '$type', '$mainImagePath', '$additionalImagesText')
            ");

            if ($insertQuery) {
                $message[]= "Product inserted successfully!";
            } else {
                $message[]= "Error while inserting product.";
            }
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
        <link rel="stylesheet" type="text/css" href="optics.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
         <div class="dashboard-container">
    <?php
    include 'admin_sidebar.php' ;
    ?>
<section class="rightside">
   
<h1 class="product_heading">Add Product</h1>
<div class="add-products flex">
<div class="form ">

<form action="" method="post" class="" enctype="multipart/form-data">
<input type="text" name="model_name" id="" placeholder="Enter product model name" required>
<input type="number" name="price" id="" placeholder="enter product price" required>
<select name="category" id="">
    <option  >Select ctaegory</option>
    <option value="Men">Men</option>
    <option value="Women">Women </option>

</select>
<select name="brand" id="">
  <option >Select Brand</option>
  <option value="Gucci" >Gucci</option>
  <option value="Rayban">Rayban</option>
  <option value="Vogue">Vogue</option>
  <option value="Tommy Hilfiger">Tommy Hilfiger</option>
  <option value="Oakley">Oakley</option>
  <option value="Lacoste">Lacoste</option>
  <option value="Nova">Nova</option>
  <option value="Velocity">Velocity</option>
  <option value="CK">CK</option>
  <option value="Zeiss">Zeiss</option>
  <option value="FAOS">FAOS</option>
  <option value="LAPS">LAPS</option>
  <option value="Italia Independent">Italia Independent</option>
  <option value="Walnut">Walnut</option>
  <option value="Fastrack">Fastrack</option>
  <option value="Akoni">Akoni</option>
</select>

<select name="type" id="">
    <option >Select type</option>
    <option value="Optical">Optical</option>
    <option value="sunglasses">sunglasses </option>
</select>
<input type="text" name="description" id="" placeholder="enter product description" required>
<label for="image" >select product image</label>
 <input type="file" name="image"  accept=".jpg  ,.jpeg, .png , .webp"  id="file" required >

 <label for="image">select Additional images</label>
 <input type="file" name="additional_images[]"  accept=".jpg  ,.jpeg, .png, .webp"  id="file" multiple >
<input type="submit"  name="add-product" value="add product" id="" class="btn">






</form>


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
    </section>
<script src="admin.js"></script>
</body>
</html>
<!-- SET @autoid:=0;
UPDATE products set id=(@autoid:=1);
ALTER TABLE products AUTO_INCREMENT=1; -->