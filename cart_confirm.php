<?php

require 'connection.php';
session_start();
$item_id=$_GET['id'];
$user_id=$_SESSION['id'];
$clear_table_query = "DELETE FROM users_items WHERE user_id='$user_id'";
mysqli_query($con, $clear_table_query);
header('location: cart.php');



?>