    <?php
    include 'connect.php';
    session_start();
    $user_id=$_SESSION['user_id'];
    // agar session atart hone ke bad $admin_id set nahi hui to use login page per redirected kardo
    if(!isset($user_id)){
        header('location:login.php');
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>orders  </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php include 'header.php';?>
        <section class="header">
            <h3 class="title">about us</h3>
            <p><a href="home.php">home</a> / <a href="about.php">about</a></p>
        </section>

        <section class="about">
            <div class="about_con">
                
                <div class="image">
                    <img src="images/about-img.jpg">
                </div>
                <div class="content">
                    <h3>why choose us ?</h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <a href="contact.php" class="btn">contact us</a>
                </div>
            </div>

        </section>



        <section class="reviews">
          <h1 class="title"n style="margin-bottom: 2rem; color: var(--black);">client's review</h1>

            <div class="box-con">
                <div class="box">
                    <img src="images/pic-1.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>
                <div class="box">
                    <img src="images/pic-2.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>
                <div class="box">
                    <img src="images/pic-3.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>
                <div class="box">
                    <img src="images/pic-4.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>
                <div class="box">
                    <img src="images/pic-5.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>
                <div class="box">
                    <img src="images/pic-6.png" alt="review-images">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestiae</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>

                    </div>
                    <h3>john doe</h3>


                </div>

            </div>



        </section>

        <section class="authors">
          <h1 class="title"n style="margin-bottom: 2rem;color: var(--black);">great authors!</h1>
            <div class="box-con">
                
                <div class="box">
                    <img src="images/author-1.jpg" alt="authors-image">
                    <div class="shares">
                       <a href="#" class="fab fa-facebook"></a>
                       <a href="#" class="fab fa-twitter"></a>
                       <a href="#" class="fab fa-whatsapp"></a>
                       <a href="#" class="fab fa-linkedin"></a>
                   </div>
                   <h3>john smith</h3>
               </div>
               
               
               <div class="box">
                <img src="images/author-2.jpg" alt="authors-image">
                <div class="shares">
                   <a href="#" class="fab fa-facebook"></a>
                   <a href="#" class="fab fa-twitter"></a>
                   <a href="#" class="fab fa-whatsapp"></a>
                   <a href="#" class="fab fa-linkedin"></a>
               </div>
               <h3>john smith</h3>
           </div>
           
           <div class="box">
            <img src="images/author-3.jpg" alt="authors-image">
            <div class="shares">
               <a href="#" class="fab fa-facebook"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-whatsapp"></a>
               <a href="#" class="fab fa-linkedin"></a>
           </div>
           <h3>john smith</h3>
       </div>
       
       
       <div class="box">
        <img src="images/author-4.jpg" alt="authors-image">
        <div class="shares">
           <a href="#" class="fab fa-facebook"></a>
           <a href="#" class="fab fa-twitter"></a>
           <a href="#" class="fab fa-whatsapp"></a>
           <a href="#" class="fab fa-linkedin"></a>
       </div>
       <h3>john smith</h3>
    </div>

    <div class="box">
        <img src="images/author-5.jpg" alt="authors-image">
        <div class="shares">
           <a href="#" class="fab fa-facebook"></a>
           <a href="#" class="fab fa-twitter"></a>
           <a href="#" class="fab fa-whatsapp"></a>
           <a href="#" class="fab fa-linkedin"></a>
       </div>
       <h3>john smith</h3>
    </div>


    <div class="box">
        <img src="images/author-6.jpg" alt="authors-image">
        <div class="shares">
           <a href="#" class="fab fa-facebook"></a>
           <a href="#" class="fab fa-twitter"></a>
           <a href="#" class="fab fa-whatsapp"></a>
           <a href="#" class="fab fa-linkedin"></a>
       </div>
       <h3>john smith</h3>
    </div>
    </div>


    </section>




    <?php include 'footer.php'?>
    <script src="script.js"></script>
    </body>
    </html>