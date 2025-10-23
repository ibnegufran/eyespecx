<?php
$search=isset($_GET['search']) ? $_GET['search'] : '';
include 'connect.php';

if($search != ''){
    $sql="SELECT * FROM products WHERE name LIKE '%{$search}%' OR brand LIKE '%{$search}%' OR category LIKE '%{$search}%'"; 
}else{
    $sql="SELECT * FROM products"; 
}
$result=mysqli_query($con,$sql) or die('query failed');
if(mysqli_num_rows($result)>0){
    while($fetch_product=mysqli_fetch_assoc($result)){
         echo '
        <div class="product">
            <img src="./' . $fetch_product['image_url'] . '" alt="">
            <h3>' . $fetch_product['brand'] . '</h3>
            <p>' . $fetch_product['name'] . '</p>
            <p>' . $fetch_product['category'] . '</p>
            <p>₹' . $fetch_product['price'] . '/-</p>
            <div class="btn-con">
                <a href="admin_allproducts.php?delete=' . $fetch_product['id'] . '" class="p-delete-btn">Delete</a>
                <a href="admin_allproducts.php?update=' . $fetch_product['id'] . '" class="edit-btn">Edit</a>
            </div>
        </div>';
    }
}else{
    echo '<p>NO product found</p>';
}

?>
