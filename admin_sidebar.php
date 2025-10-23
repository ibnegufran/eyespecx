  <?php

        
if(!empty($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>




    <div class="sidebar">
        <h1>Admin Panel</h1>
        <a href="admin_page.php">dashboard</a>
        <a href="admin_allproducts.php">All products</a>
        <a href="admin_product.php">New Products</a>
        <a href="admin_users.php">Add banner</span></a>
       
    </div>
    <script>
     setTimeout(() => {
  document.querySelectorAll('.message').forEach(t => t.remove());
}, 3500);


    </script>
