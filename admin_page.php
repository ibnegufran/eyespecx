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
        <title>admin-pae</title>
        <link rel="stylesheet" type="text/css" href="optics.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
    <div class="dashboard-container">
    <?php
    include 'admin_sidebar.php' ;
    ?>
<section class="rightside">

<h1>Dashboard</h1>
<div class="box-container">
<div class="box">
<?php
$total_products=0;
$select_products=mysqli_query($con,"SELECT * FROM `products`")or die('query faile');
$total_products=mysqli_num_rows($select_products);


?>
<h3><?php echo $total_products;?></h3>
<p>total products</p>


</div>
<div class="box">
<?php
$mens_products=0;
$select_products=mysqli_query($con,"SELECT * FROM `products` WHERE category='Men'")or die('query faile');
$mens_products=mysqli_num_rows($select_products);


?>
<h3><?php echo $mens_products;?></h3>
<p>Men products</p>


</div>
<div class="box">
<?php
$womens_products=0;
$select_products=mysqli_query($con,"SELECT * FROM `products` WHERE category='Women'")or die('query faile');
$womens_products=mysqli_num_rows($select_products);


?>
<h3><?php echo $womens_products;?></h3>
<p>women products</p>


</div>


</div>

<?php
$brand_query="SELECT brand, COUNT(*) AS brand_total_products FROM products GROUP BY brand";
$result=mysqli_query($con,$brand_query)or die('query faile');   
if(mysqli_num_rows($result)>0){
    ?>
    <table  cellpadding='8' class="brand-table">
        <tr>
            <th>Brand</th>
            <th>Total Products</th>
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <td><?php echo $row['brand'];?></td>
                <td><?php echo $row['brand_total_products'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}else{
    echo "<p class='empty'>no brand found</p>";     
}
?>


</section>


</div>
<script src="admin.js"></script>
</body>

</html>