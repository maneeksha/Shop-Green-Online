<?php
include 'configr.php';
$id=$_GET["am"];
echo "$id";
$result=mysqli_query($con,"DELETE FROM `product` WHERE `prod_id`='$id'");
$row=mysqli_fetch_array($result);
header("location:addproduct.php");
?>