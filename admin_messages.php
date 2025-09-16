<?php
include 'connect.php';
session_start();
$admin_id=$_SESSION['admin_id'];
// agar session atart hone ke bad $admin_id et nahi hui to use login page per redirected kardo
if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    mysqli_query($con,"DELETE FROM  `messages` WHERE id='$delete_id'") or die('query failed');
    header('location:admin_messages.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders  </title>
    <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'admin_header.php';?>
        <section class="message_section">
            <div class="messages">
                <?php
                $select_messages=mysqli_query($con,"SELECT * FROM `messages`" ) or die('query failed');
                if(mysqli_num_rows($select_messages)>0){
while($fetch_messages = mysqli_fetch_assoc($select_messages)){
    ?>
<div class="message_box flex">
<p>user id : <span><?php echo $fetch_messages['user_id']?></span></p>

    <p>name : <span><?php echo $fetch_messages['name']?></span></p>
    <p>email : <span><?php echo $fetch_messages['email']?></span></p>
    <p>phone number : <span><?php echo $fetch_messages['number']?></span></p>
    <p>message : <span><?php echo $fetch_messages['message']?></span></p>

    <a href="admin_messages.php?delete=<?php echo $fetch_messages['id']?>" onclick="return confirm('delete this message')" id="message_delete" class="delete-btn">delete <i class="fas fa-trash"></i></a>


</div>
<?php
}
}else{
echo '<p class="text">no messages added yet!</p>';

}

?>
                
            </div>
        </section>
<script src="admin.js"></script>
   
</body>
</html>







