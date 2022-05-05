<?php 
include('configr.php');
session_start();
$cname=$_SESSION['email'];
$sql="select * FROM `register` where `reg_email` = '$cname';";
$data= mysqli_query($con,$sql);
if($res=mysqli_fetch_assoc($data))
{
$ker=$res['reg_id']	;
//echo $ker;
$prod=$_GET["id"];
//echo $prod;

$sql2="INSERT INTO `cart`( `reg_id`, `subcat_id`) VALUES ('$ker','$prod');";
if(mysqli_query($con,$sql2))
{
echo "added to cart";
header("location:mycart.php");
}
  else
      {
		echo mysqli_errno($con);
      }
}


?>
