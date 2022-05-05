<?php
include 'configr.php';
session_start();
$cname=$_SESSION['email'];
$id=$_GET["as"];
echo "$id";
$sq="select * from register where reg_email='$cname'";
$data=(mysqli_query($con,$sq));
if($row=mysqli_fetch_assoc($data))
{
$regid=$row['reg_id'];
$result=mysqli_query($con,"DELETE FROM `cart` WHERE `subcat_id`='$id' AND `reg_id`='$regid'");
$row=mysqli_fetch_array($result);
header("location:mycart.php");
}
?>