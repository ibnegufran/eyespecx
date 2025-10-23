<?php
$server='db.fr-pari1.bengt.wasmernet.com';
$username='a1a52a1d782480004f9aa55c06bc';
$password='068fa1a5-2a1d-79d0-8000-c17d91b8a426';
$database='eyespecx';

// $server='localhost';
// $username='root';
// $password='';
// $database='eyespecx';
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