<?php
include 'connect.php'; // database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // COMBINE THE QUERIES INTO ONE
    $select_product = mysqli_query($con, "
        SELECT p.*, a.*
        FROM products p
        LEFT JOIN product_attributes a ON p.id = a.product_id
        WHERE p.id = '$id'
    ") or die('Query failed: ' . mysqli_error($con)); // Added error reporting for debugging

    if (mysqli_num_rows($select_product) > 0) {
        $product = mysqli_fetch_assoc($select_product);
    } else {
        echo "<h2>Product not found!</h2>";
        exit;
    }
} else {
    echo "<h2>No product selected!</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?> | EyespecX</title>
    <link rel="stylesheet" href="optics.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php include 'header.php'; ?>
<section class="product-details">
    <div class="image-section">
        <img src="<?php echo $product['image_url']; ?>" alt="" id="main-img">

        <img src="<?php echo $product['additional_images']; ?>" alt="" id="add-img">
    </div>

    <div class="info-section">
        <h2><?php echo $product['brand']; ?></h2>
        <p class="name"><?php echo $product['name']; ?></p>
        <p class="price">₹<?php echo $product['price']; ?></p>
        <a href="" class="rating-con">
        <p class="rating"><strong>Rating:</strong> <?php echo $product['rating']; ?> /5</p>
        <p><strong>198</strong> Reviews</p>
        </a>
        <button><i class="fa-brands fa-whatsapp"></i> Buy Now</button>
    </div>
</section>
<section class="product-info">
    <div class="desc">
    <h2>Description</h2>
    <p><?php echo $product['description']; ?></p>
    </div> 
    <div class="info-table">
    <h2>Information</h2>
    <table>
        <tr>
            <td>Brand</td>
            <td><?php echo $product['brand']; ?></td>
        </tr>
        <tr>
            <td>Model</td>
            <td><?php echo $product['name']; ?></td>
        </tr>
        <tr>
            <td>Lens size</td>
            <td><?php echo $product['lens_size']; ?></td>
        </tr>
        <tr>
            <td>Lens Material</td>
            <td><?php echo $product['material']; ?></td>
        </tr>
         <tr>
            <td>temple length</td>
            <td><?php echo $product['temple_length']; ?></td>
        </tr>
         <tr>
            <td>gender</td>
            <td><?php echo $product['gender']; ?></td>
        </tr>
        <tr>
            <td>material</td>
            <td><?php echo $product['material']; ?></td>
        </tr>
         <tr>
            <td>shape</td>
            <td><?php echo $product['shape']; ?></td>
        </tr>
        <tr>
            <td>Lens Color</td>
            <td><?php echo $product['lens_colour']; ?></td>
        </tr>
        <tr>
            <td>nose bidge length</td>
            <td><?php echo $product['nose_bridge_length']; ?></td>
        </tr>
       
       
         <tr>
            <td>country of origin</td>
            <td><?php echo $product['country_of_origin']; ?></td>
        </tr>
         <tr>
            <td>style tip</td>
            <td><?php echo $product['style_tip']; ?></td>
        </tr>
    </table>
    </div>
</section>

</body>
</html>
