<?php 
ob_start();
$connection = mysqli_connect("localhost" , "root" , "" ,"eshop")
or die('Could Not Connect');

$id = $_GET['id'];

$query = "DELETE from categories where id=$id";
if(mysqli_query($connection,$query)){
    header("location:manage_category.php");
}

?>
