<?php
$servername="localhost";  
$user="root";
$password="";
$database="tecweb";

$conn = mysqli_connect($servername, $user, $password, $database);
try{
   $conn;
}
catch (Exception $e){
   echo "<br/>fuck " . $e;
} 
?>