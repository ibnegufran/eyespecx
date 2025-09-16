
        <?php
$message =[];
        
if(isset($message)){
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

<header class="head">

    <nav class="flex">
        <h1>admin <span>panel</span></h1>
        <ul>
            <li><a href="admin_page.php">home</a></li>
            <li><a href="admin_product.php">products</a></li>
            <li><a href="admin_orders.php">orders</a></li>
            <li><a href="admin_users.php">users</a></li>
            <li><a href="admin_messages.php">messages</a></li>

        </ul >
        <div class="icons">
            <i class="fas fa-bars" id="menu"></i>
            <i class="fas fa-user" id="user"></i>

        </div>
        <div class="account-box flex">
            <p>username : <?php echo $_SESSION['admin_name']; ?></p>
            <p>email : <?php echo $_SESSION['admin_email']; ?></p>
            <a href="logout.php">logout</a>
        </div>
    </nav>
</header>