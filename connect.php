<?php
$server='localhost';
$username='root';
$password='';
$database='ecommerce';

$con=mysqli_connect($server,$username,$password,$database);
if($con){
//    echo "connection successfull";
}
else{
    echo "connection failed";
}
// if (!isset($message) || !is_array($message)) {
//     $message = [];
// }
?>