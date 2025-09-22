 <?php
    // include 'connect.php';
    // session_start();
    // $user_id=$_SESSION['user_id'];
    // // agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
    // if(!isset($user_id)){
    //     header('location:login.php');
    // }




    // if(isset($_POST['add_to_cart'])){
    // $product_name=$_POST['product_name'];
    // $product_price=$_POST['product_price'];
    // $product_image=$_POST['product_image'];
    // $product_qty=$_POST['product_qty'];




    // $check_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');

    // if(mysqli_num_rows($check_cart)>0){
    //   $message[] = 'already added to cart!';
    // }else{
    //     mysqli_query($con,"INSERT INTO `cart`(user_id,name,price,quantity,image)  VALUES('$user_id','$product_name','$product_price','$product_qty','$product_image')") or die('query failed');

    //   $message[] = 'product added to cart!';

    // }




    // }

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
     <div class="carousel hero">
         <div class="slides bg-slate-700 h-80 w-screen text-2xl">
             <div class="slide"><img src="./images/1.png" alt=""></div>
             <div class="slide"><img src="./images/2.png" alt=""></div>
             <div class="slide"><img src="./images/3.png" alt=""></div>
             <div class="slide"><img src="./images/4.png" alt=""></div>
             <div class="slide"><img src="./images/5.png" alt=""></div>


         </div>
     </div>


     <section class="our-products">
         <div class="header">
             <h2>OUR PRODUCTS</h2>
             <div class="">
                 <h3 class="tab bottom-border active" onclick="productShow('men',this)">SHOP MEN </h3>
                 <h3 class="tab " onclick="productShow('women',this)">SHOP WOMEN</h3>

             </div>

         </div>
         <div class="products">
             <div class="men-products product-list men active ">
                 <div class="product-con">
                     <div class="product">
                         <img src="./images/g1.jpg" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>


                     <div class="product">
                         <img src="./images/g2.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g3.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g4.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g5.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g6.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g4.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g1.jpg" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>

                 </div>

                 <div class="button">
                     <button>View All Products</button>
                 </div>
             </div>

             <div class="women-products product-list women">
                 <div class="product-con">
                     <div class="product">
                         <img src="./images/gw1.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>


                     <div class="product">
                         <img src="./images/gw2.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/gw3.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/gw4.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g5.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g6.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g4.webp" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>
                     <div class="product">
                         <img src="./images/g1.jpg" alt="">
                         <p class="name">PRADA</p>
                         <p class="model">17WS 1AB/5S0 49</p>
                         <p class="price">₹ 36,290.00 INR</p>

                     </div>

                 </div>

                 <div class="button">
                     <button>View All Products</button>
                 </div>
             </div>
         </div>
     </section>

     <hr>

     <section class="week-sec carousel">
         <div class="header">
             <h5>its fresh, it's fire ....it's the</h5>
             <h4>drop you can't miss</h4>
         </div>
         <div class="slid-show slides">
             <div class="content slide">
                 <img src="./images/w1.webp" alt="">
                 <div class="details">
                     <p class="name">CELINE</p>
                     <p class="model">TRIOMPHE 40235U 30N 54</p>
                     <p class="price">₹ 63,200.00 INR</p>

                     <a href="" class="link">view product details</a>

                 </div>
             </div>

             <div class="content slide">
                 <img src="./images/g1.jpg" alt="">
                 <div class="details">
                     <p class="name">CELINE</p>
                     <p class="model">TRIOMPHE 40235U 30N 54</p>
                     <p class="price">₹ 63,200.00 INR</p>

                     <a href="" class="link">view product details</a>

                 </div>
             </div>

             <div class="content slide">
                 <img src="./images/g2.webp" alt="">
                 <div class="details">
                     <p class="name">CELINE</p>
                     <p class="model">TRIOMPHE 40235U 30N 54</p>
                     <p class="price">₹ 63,200.00 INR</p>

                     <a href="" class="link">view product details</a>

                 </div>
             </div>
         </div>
     </section>


     <hr>
     <section class="bestseller">
         <h2>Bestseller</h2>

         <div class="product-con">
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>


             <div class="product">
                 <img src="./images/g2.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g3.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g5.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g6.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>

         </div>
     </section>

     <!-- <hr> -->

     <section class="apointment">
         <!-- <h4>expert care trendy wear </h4> -->
         <button class="btn visit-btn">plan your visit</button>
         <!-- <div class="form">
    <form action="">
        <input type="text" name="" id="" placeholder="Please Enter Name ">
        <input type="number" name="" id="" placeholder="Please Enter Mobile Number">
        <input type="email" name="" id="" placeholder="Please Enter Email">
        <input type="time" name="" id="" placeholder="Please Enter time">
        <input type="date" name="" id="" placeholder="Please Enter Date">
        <input type="submit" class="btn" value="Book Appointment">

    </form>
</div> -->
     </section>

     <section class="model-section">
         <h5>step into style</h5>
         <h4>shop the drop</h4>
         <button class="carousel-control prev"><i class="fa-solid fa-chevron-left"></i></button>
         <button class="carousel-control next"><i class="fa-solid fa-chevron-right"></i></button>
         <div class="model-img">


             <div class="model-track"> <!-- this is the moving container -->
                 <div class="model-con"><img src="./images/model (4).png" alt=""><button class="btn">view product</button></div>
                 <div class="model-con"><img src="./images/model (3).png" alt=""><button class="btn">view product</button></div>
                 <div class="model-con"><img src="./images/model (2).png" alt=""><button class="btn">view product</button></div>

                 <div class="model-con"><img src="./images/model (1).png" alt=""><button class="btn">view product</button></div>

             </div>
         </div>

     </section>

     <hr>


     <section class="gucci bestseller">
         <h5>the viube of now</h5>
         <h4>gucci</h4>

         <div class="product-con">
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>


             <div class="product">
                 <img src="./images/g2.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g3.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g5.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g6.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>

         </div>
     </section>



     <hr>


     <section class="akoni bestseller">
         <h5>explore the collection</h5>
         <h4>akoni</h4>

         <div class="product-con">
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>


             <div class="product">
                 <img src="./images/g2.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g3.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g5.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g6.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g4.webp" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>
             <div class="product">
                 <img src="./images/g1.jpg" alt="">
                 <p class="name">PRADA</p>
                 <p class="model">17WS 1AB/5S0 49</p>
                 <p class="price">₹ 36,290.00 INR</p>

             </div>

         </div>
     </section>


     <hr>
     <section class="logo-caraousel">


         <h4>our brands</h4>
         <div class="logo-slider" aria-label="Partner logos">
             <div class="logo-track">

                 <div class="slide"><img src="./images/brand (1).png" /></div>
                 <div class="slide"><img src="./images/brand (2).png" /></div>
                 <div class="slide"><img src="./images/brand (3).png" /></div>
                 <div class="slide"><img src="./images/brand (4).png" /></div>
                 <div class="slide"><img src="./images/brand (5).png" /></div>
                 <div class="slide"><img src="./images/brand (6).png" /></div>
                 <div class="slide"><img src="./images/brand (7).png" /></div>
                 <div class="slide"><img src="./images/brand (8).png" /></div>
                 <div class="slide"><img src="./images/brand (9).png" /></div>
                 <div class="slide"><img src="./images/brand (10).png" /></div>
                 <div class="slide"><img src="./images/brand (11).png" /></div>
                 <div class="slide"><img src="./images/brand (12).png" /></div>
             </div>
             <div  aria-hidden class="logo-track">

                 <div class="slide"><img src="./images/brand (1).png" /></div>
                 <div class="slide"><img src="./images/brand (2).png" /></div>
                 <div class="slide"><img src="./images/brand (3).png" /></div>
                 <div class="slide"><img src="./images/brand (4).png" /></div>
                 <div class="slide"><img src="./images/brand (5).png" /></div>
                 <div class="slide"><img src="./images/brand (6).png" /></div>
                 <div class="slide"><img src="./images/brand (7).png" /></div>
                 <div class="slide"><img src="./images/brand (8).png" /></div>
                 <div class="slide"><img src="./images/brand (9).png" /></div>
                 <div class="slide"><img src="./images/brand (10).png" /></div>
                 <div class="slide"><img src="./images/brand (11).png" /></div>
                 <div class="slide"><img src="./images/brand (12).png" /></div>


             </div>
         </div>
     </section>
     <?php include 'footer.php' ?>



     <script src="optics.js"></script>

     <!-- <script src="script.js"></script> -->
 </body>

 </html>