<?php
include 'connect.php';
session_start();
$user_id=$_SESSION['user_id'];
// agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
if(!isset($user_id)){
    header('location:login.php');
}



if(isset($_POST['order_btn'])){
    $name=$_POST['name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $method=$_POST['method'];

    $address=mysqli_real_escape_string($con,'flat no.' . $_POST['flate'] . ', '. $_POST['street'] . ', '. $_POST['country'] . ', '. $_POST['state'] . ', '. $_POST['city'] .'-'.  $_POST['pincode']);
    $placed_on=date('D-M-Y');
    $cart_total=0;
    $cart_products[] = '';

    $cart_query=mysqli_query($con,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed'); 

if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);




    $order_query=mysqli_query($con,"SELECT *  FROM `orders` WHERE name='$name' AND number='$number' AND email='$email' AND method='$method' AND address='$address' AND total_products='$total_products' AND total_price='$cart_total'") or die('query failed');

    if($cart_total == 0){
$message[]='your cart is empty';
    }else{
if(mysqli_num_rows($order_query) > 0){
$message[]='order already placed';

}else{
    mysqli_query($con, "INSERT INTO `orders`(user_id,name,number,email,method,address,total_products,total_price,placed_on) VALUES('$user_id','$name','$number','$email','$method','$address','$total_products','$cart_total','$placed_on')") or die('query failed');
$message[]='order successfully placed';
echo '<script>alert("your order successfully placed")</script>';
mysqli_query($con, "DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');

}


    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php';?>
<section class="header" style="background-image: url('https://t3.ftcdn.net/jpg/01/17/33/22/360_F_117332203_ekwDZkViF6M3itApEFRIH4844XjJ7zEb.jpg');">
            <h3 class="title" style="color: var(--white)">checkout </h3>
            <p style="color: white;" ><a href="home.php"style="color: white;">home</a> / <a href="" style="color: white;">checkout</a></p>
        </section>

<section class="checkout-products">
    <div class="check_con">
        <?php
        $grand_total=0;
        $select_products=mysqli_query($con,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($select_products)>0){
            while ($fetch_products=mysqli_fetch_assoc($select_products)) {
                # code...
        ?>
<div class="box">
    <p><?php echo $fetch_products['name']?> <span> (<?php echo '$'.$fetch_products['price']  .'/-' . ' ' .'x'.  ' ' .$fetch_products['quantity'] . 'piece'; 
$total_price=($fetch_products['price'] * $fetch_products['quantity']);
 ?>) </span></p>

</div>


        <?php
$grand_total +=$total_price;

            }

        }else{
            echo '<p class="text">your checkout list is  empty</p>';
}
        ?>

    </div>
<div class="grand_total">
      <p>grand-total :  <span>$<?php echo $grand_total; ?>/-</span></p>
</div>
</section>


<section class="checkout_form">
    
    <div class="form_con">
        <form method="post">
            <div class="box">
            <div class="input-area">
                <span>your name :</span>
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="input-area">
                <span>your number :</span>
                <input type="number" name="number" placeholder="enter your number" required>
            </div>
            <div class="input-area">
                <span>your email :</span>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="input-area">
                <span>payement method :</span>
                <select name="method">
                    <option value="cash on delievery">cash on delievery</option>
                    <option value="credit card">credit card</option>
                    <option value="paypal">paypal</option>
                    <option value="paytm">paytm</option>

                </select>
            </div>
            <div class="input-area">
                <span> address line 01 :</span>
                <input type="number" min="0" name="flate" placeholder="eg. falte no." required>
            </div>
             <div class="input-area">
                <span> address line 02 :</span>
                <input type="text" name="street" placeholder="eg. street name" required>
            </div>
             <div class="input-area">
                <span>country:</span>
                <input type="text" name="country" placeholder="eg. india" required>
            </div>
             <div class="input-area">
                <span>state:</span>
                <input type="text" name="state" placeholder="eg. maharashtra" required>
            </div>
             <div class="input-area">
                <span>city:</span>
                <input type="text" name="city" placeholder="eg. mumbai" required>
            </div>
              <div class="input-area">
                <span>pincode:</span>
                <input type="number" name="pincode" min="0" placeholder="eg. 123456" required>
            </div>
            </div>
            <input type="submit" name="order_btn" value="order now" class="btn">
        </form>

    </div>
</section>





    <?php include 'footer.php'?>
    <script src="script.js"></script>
</body>
</html>