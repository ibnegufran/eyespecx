<?php
include 'connect.php';
session_start();    
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}   


// delete product
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_img=mysqli_query($con,"SELECT image_url, additional_images FROM `products` WHERE id='$delete_id'")or die ('query failed');

    mysqli_query($con, "SET @count = 0");
mysqli_query($con, "UPDATE products SET id = @count:=@count+1");
mysqli_query($con, "ALTER TABLE products AUTO_INCREMENT = 1");

    $fetch_del_pro=mysqli_fetch_assoc($delete_img);
   
    if ($fetch_del_pro) {
        // Delete main image
        if (!empty($fetch_del_pro['image_url']) && file_exists($fetch_del_pro['image_url'])) {
            unlink($fetch_del_pro['image_url']);
        }

        // Delete additional images (if any)
        if (!empty($fetch_del_pro['additional_images'])) {
            $extraImages = json_decode($fetch_del_pro['additional_images'], true);
            if (is_array($extraImages)) {
                foreach ($extraImages as $imgPath) {
                    if (file_exists($imgPath)) {
                        unlink($imgPath);
                    }
                }
            }
        }
 mysqli_query($con,"DELETE  FROM `products` WHERE id='$delete_id'")or die('query failed') ;
    $message[]='product deleted successfully!';
}
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_name'];
    $update_p_price = $_POST['update_price'];
    $update_p_description = $_POST['update_description'];
    $update_p_category = $_POST['update_category'];
    $update_p_brand = $_POST['update_brand'];
    $update_p_type = $_POST['update_type'];

    // 🧩 Update basic product details
    mysqli_query($con, "UPDATE `products` SET 
        name='$update_p_name',
        price='$update_p_price',
        description='$update_p_description',
        category='$update_p_category',
        brand='$update_p_brand',
        type='$update_p_type'
        WHERE id='$update_p_id'") or die('query failed');

    // 🖼️ Update main image
    $update_img = $_FILES['update_image']['name'];
    $update_img_size = $_FILES['update_image']['size'];
    $update_img_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_img_folder = 'uploaded_image/' . $update_img;
    $update_old_img = $_POST['update_old_image'];

    if (!empty($update_img)) {
        if ($update_img_size > 2000000) {
            $message[] = "Main image size is too big";
        } else {
            mysqli_query($con, "UPDATE `products` SET image_url='uploaded_image/$update_img' WHERE id='$update_p_id'") or die('query failed');
            $message[] = "Product updated successfully";
            move_uploaded_file($update_img_tmp_name, $update_img_folder);
            if (file_exists('uploaded_image/' . $update_old_img)) {
                unlink('uploaded_image/' . $update_old_img);
            }
        }
    }

    // 🖼️ Update additional images
    if (!empty($_FILES['additional_images']['name'][0])) {

        // 🔹 Fetch old additional images from DB
        $select_old_imgs = mysqli_query($con, "SELECT additional_images FROM products WHERE id='$update_p_id'") or die('query failed');
        $fetch_old_imgs = mysqli_fetch_assoc($select_old_imgs);
        $old_images = json_decode($fetch_old_imgs['additional_images'], true);

        // 🔹 Delete old additional images (unlink)
        if (is_array($old_images)) {
            foreach ($old_images as $old_path) {
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
        }

        // 🔹 Upload new additional images
        $new_additional_images = [];
        foreach ($_FILES['additional_images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['additional_images']['name'][$key];
            $file_tmp = $_FILES['additional_images']['tmp_name'][$key];
            $file_size = $_FILES['additional_images']['size'][$key];
            $upload_path = 'uploaded_image/' . $file_name;

            if ($file_size <= 2000000) {
                move_uploaded_file($file_tmp, $upload_path);
                $new_additional_images[] = $upload_path;
            }
        }

        // 🔹 Convert array to JSON and update DB
        $json_images = json_encode($new_additional_images);
        mysqli_query($con, "UPDATE `products` SET additional_images='$json_images' WHERE id='$update_p_id'") or die('query failed');
    }

    header("Location: admin_allproducts.php");
    exit();
}

?>

<!-- update products -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <link rel="stylesheet" href="optics.css">
    <title>All products</title>
</head>
<body>
<div class="dashboard-container">
    <?php
    include 'admin_sidebar.php' ;
    ?>
<section class="rightside">
  <h2>All Products</h2>

  <div class="search-box">
    <input type="text" placeholder="search products..." id="search-box">
  </div>

  <div class="product-con" id="product-container">
    <?php
  
    $select_products = mysqli_query($con, "SELECT * FROM products") or die('query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
    ?>
        <div class="product">
            <img src="./<?php echo $fetch_product['image_url']; ?>" alt="">
            <h3><?php echo $fetch_product['brand']; ?></h3>
            <p><?php echo $fetch_product['name']; ?></p>
            <p><?php echo $fetch_product['category']; ?></p>
            <p>₹<?php echo $fetch_product['price']; ?>/-</p>
            <div class="btn-con">
                <a href="admin_allproducts.php?delete=<?php echo $fetch_product['id']?>" class="p-delete-btn">Delete</a>
                <a href="admin_allproducts.php?update=<?php echo $fetch_product['id']?>" class="edit-btn">Edit</a>
            </div>
        </div>
    <?php
        }
    } else {
        echo '<p class="empty">No products found!</p>';
    }
    ?>
  </div>
</section>
</div>
 <script>
    const search_box=document.getElementById('search-box');
    const product_con=document.querySelector('#product-container');
console.log(product_con);
    
    search_box.addEventListener('keyup',()=>{
        const search_text=search_box.value.trim();
        // send request to admin_search.php to fetch products matching the search text
       fetch(`admin_search.php?search=${search_text}`)
       .then(res=>res.text())
         .then(data=>{
            
          product_con.innerHTML=data;   
         });
    })
</script>

    <!-- // update products -->
    <section class="edit-sec">

<?php
if(isset($_GET['update'])){
    echo '<script>   
document.querySelector("body").style.height="100vh";
document.querySelector("body").style.overflow="hidden";

</script>';
    $update_id=$_GET['update'];
    $update_query=mysqli_query($con,"SELECT * FROM products WHERE id='$update_id'")or die ('query failed');
    if(mysqli_num_rows($update_query)>0){
        while($fetch_product=mysqli_fetch_assoc($update_query)){
            ?>
    <div class="update_container flex">
    <form action="" method="post" class="" enctype="multipart/form-data">
        <input type="hidden" name="update_p_id" value="<?php echo $fetch_product['id']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $fetch_product['image_url']; ?>">
<div class="images-sec">
        <img src="./<?php echo $fetch_product['image_url']; ?>" alt="" id="main_img">
        <div class="additional-images">
        <?php
        $additional_images = json_decode($fetch_product['additional_images'], true);  
        if (is_array($additional_images)) {
            foreach ($additional_images as $imgPath) {
                echo '<img src="./' . $imgPath . '" alt="Additional Image">';
            }
        }
        ?>
        </div>
        </div>
        <div class="input-sec">
<input type="text"  value="<?php echo $fetch_product['name']; ?>" name="update_name" id="update_name" placeholder="enter product name"  class="update-input">
<input type="number"  value="<?php echo $fetch_product['price'];?>" name="update_price" id="update_price" placeholder="enter product price"  class="update-input">
<input type="text"  value="<?php echo $fetch_product['description']; ?>" name="update_description" id="update_description" placeholder="enter product description"  class="update-input">
 <select name="update_category" id="">
        <option>Select category</option>
        <option value="Men" <?= ($fetch_product['category'] == 'Men') ? 'selected' : '' ?>>Men</option>
        <option value="Women" <?= ($fetch_product['category'] == 'Women') ? 'selected' : '' ?>>Women</option>
    </select>

    <!-- BRAND -->
    <select name="update_brand" id="">
        <option>Select Brand</option>
         <option value="Gucci" <?= ($fetch_product['brand'] == 'Gucci') ? 'selected' : '' ?>>Gucci</option>
        <option value="Rayban" <?= ($fetch_product['brand'] == 'Rayban') ? 'selected' : '' ?>>Rayban</option>
        <option value="Vogue" <?= ($fetch_product['brand'] == 'Vogue') ? 'selected' : '' ?>>Vogue</option>
        <option value="Tommy Hilfiger" <?= ($fetch_product['brand'] == 'Tommy Hilfiger') ? 'selected' : '' ?>>Tommy Hilfiger</option>
        <option value="Oakley" <?= ($fetch_product['brand'] == 'Oakley') ? 'selected' : '' ?>>Oakley</option>
        <option value="Lacoste" <?= ($fetch_product['brand'] == 'Lacoste') ? 'selected' : '' ?>>Lacoste</option>
        <option value="Nova" <?= ($fetch_product['brand'] == 'Nova') ? 'selected' : '' ?>>Nova</option>
        <option value="Velocity" <?= ($fetch_product['brand'] == 'Velocity') ? 'selected' : '' ?>>Velocity</option>
        <option value="CK" <?= ($fetch_product['brand'] == 'CK') ? 'selected' : '' ?>>CK</option>
        <option value="Zeiss" <?= ($fetch_product['brand'] == 'Zeiss') ? 'selected' : '' ?>>Zeiss</option>
        <option value="FAOS" <?= ($fetch_product['brand'] == 'FAOS') ? 'selected' : '' ?>>FAOS</option>
        <option value="LAPS" <?= ($fetch_product['brand'] == 'LAPS') ? 'selected' : '' ?>>LAPS</option>
        <option value="Italia Independent" <?= ($fetch_product['brand'] == 'Italia Independent') ? 'selected' : '' ?>>Italia Independent</option>
        <option value="Walnut" <?= ($fetch_product['brand'] == 'Walnut') ? 'selected' : '' ?>>Walnut</option>
        <option value="Fastrack" <?= ($fetch_product['brand'] == 'Fastrack') ? 'selected' : '' ?>>Fastrack</option>
        <option value="Akoni" <?= ($fetch_product['brand'] == 'Akoni') ? 'selected' : '' ?>>Akoni</option>
    </select>

    <!-- TYPE -->
    <select name="update_type" id="">
        <option>Select type</option>
        <option value="Optical" <?= ($fetch_product['type'] == 'Optical') ? 'selected' : '' ?>>Optical</option>
        <option value="sunglasses" <?= ($fetch_product['type'] == 'Sunglasses') ? 'selected' : '' ?>>Sunglasses</option>
    </select>
    <label for="image" >select product image</label>
 <input type="file"  value="<?php echo $row['image-url'];?>"  name="update_image"  accept=".jpg  ,.jpeg, .png , .webp"  id="file" class="update-input">
    <label for="image">select Additional images</label>
  <input type="file" name="additional_images[]" accept=".jpg, .jpeg, .png, .webp" multiple class="update-input">

<div class="buttons">
<input type="submit"  name="update_product" value="update" id="update_btn" class="btn">
<input type="reset" value="cancel" id="close-update" class="option-btn">
</div>
</div>
</form>
</div>

<?php
}
    }
}else{
echo '<script>   
document.querySelector(".update_container").style.display="none";
document.querySelector("body").style.height="auto";
document.querySelector("body").style.overflow="hidden";

</script>';
}

?>



    </section>
 <script>
    document.querySelector('#close-update').onclick=()=>{
    document.querySelector('.update_container').style.display='none';
    window .location.href="admin_allproducts.php"
}
 </script>
</body>
</html>