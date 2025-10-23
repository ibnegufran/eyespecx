 <?php
include 'connect.php';
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
                    <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` WHERE category='men' LIMIT 8") or die ('query failed');
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

                 <div class="button">
                     <button>View All Products</button>
                 </div>
             </div>

             <div class="women-products product-list women">
                 <div class="product-con">
                      <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` WHERE category='women' LIMIT 8" ) or die ('query failed');
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
             <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` WHERE category='women' LIMIT 4" ) or die ('query failed');
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products=mysqli_fetch_assoc($select_products)){   
                    ?>
             <div class="content slide">
                 <img src="<?php echo $fetch_products['image_url']?>" alt="">
                 <div class="details">
                     <p class="name"><?php echo $fetch_products['brand']?></p>
                     <p class="model"><?php echo $fetch_products['name']?></p>
                     <p class="price">₹ <?php echo $fetch_products['price']?>INR</p>

                     <a href="" class="link">view product details</a>

                 </div>
             </div>

              <?php
                        }   
                    }else{
                        echo '<p class="empty">no products added yet!</p>'; 
                    }
                    ?>

             
         </div>
     </section>


     <hr>
     <section class="bestseller">
         <h2>Bestseller</h2>

          <div class="product-con">
                    <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` LIMIT 8") or die ('query failed');
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
        <?php
        $brand_name_first='Gucci';
        ?>
         <h5>the vibe of now</h5>
         <h4><?php echo $brand_name_first ?></h4>

          <div class="product-con">
                    <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` WHERE brand='$brand_name_first' LIMIT 8") or die ('query failed');
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
     </section>



     <hr>


     <section class="akoni bestseller">
        <?php
        $brand_name_sec="Akoni";
        ?>
         <h5>explore the collection</h5>
         <h4><?php echo $brand_name_sec ?></h4>

         <div class="product-con">
                    <?php
                    $select_products=mysqli_query($con,"SELECT * FROM `products` WHERE brand='$brand_name_sec' LIMIT 8") or die ('query failed');
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



      <script>
        
const track = document.querySelector(".model-track");
const slides = document.querySelectorAll(".model-con");
const totalSlides = slides.length;
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");
const logoTrack = document.querySelector(".logo-track");



let menuBtn=document.querySelector("#menu-btn");
menuBtn.addEventListener("click",()=>{
    document.querySelector(".menu_con").classList.toggle("nav-active");
  

})

for (let i = 0; i < 3; i++) {
  if(slides[i]){

    const firstClone =  slides[i].cloneNode(true);
    
    track.appendChild(firstClone);
  }
}

console.log(slides)
let index=0

const showNextSlide = () => {
  
  const cardWidth=slides[0].offsetWidth;
  track.style.transition = 'transform 0.5s ease';
  track.style.transform = `translateX(-${index * cardWidth}px)`;
  if (index === totalSlides) 
  { 
    setTimeout(() => { 
      track.style.transition = 'none'; 
    track.style.transform = 'translateX(0)';
     index = 0; }, 500); 
    
    }
};


if(nextBtn){
nextBtn.addEventListener("click",()=>{
  index++;
  showNextSlide()
  clearInterval(autoSlider)
})
}
prevBtn.addEventListener("click",()=>{
  index--;

  if(index < 0){
index=slides.length-1;

  }
  showNextSlide()
  clearInterval(autoSlider)
})


const autoSlider=setInterval(()=>{
  index++;
  showNextSlide()
},3000)

      </script>
     <!-- <script src="script.js"></script> -->
 </body>

 </html>