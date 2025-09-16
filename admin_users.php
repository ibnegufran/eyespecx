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
    mysqli_query($con,"DELETE FROM  `register` WHERE id='$delete_id'") or die('query failed');
    header('location:admin_users.php');

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
        <section class="user_section flex">
            <div class="users">
                <?php
                $select_users=mysqli_query($con,"SELECT * FROM `register`" ) or die('query failed');
                if(mysqli_num_rows($select_users)>0){
while($fetch_users = mysqli_fetch_assoc($select_users)){
    ?>
<div class="user_box flex">
    <p>name : <span><?php echo $fetch_users['name']?></span></p>
    <p>email : <span><?php echo $fetch_users['email']?></span></p>
    <p>user_type : <span><?php echo $fetch_users['user_type']?></span></p>
    <a href="admin_users.php?delete=<?php echo $fetch_users['id']?>" onclick="return confirm('delete this item')" id="user_delete" class="delete-btn" style="font-size:1.5rem;">delete</a>


</div>
<?php
}
}else{
echo '<p class="text">no users added yet!</p>';

}

?>
                
            </div>
        </section>
<script src="admin.js"></script>
   
</body>
</html>







