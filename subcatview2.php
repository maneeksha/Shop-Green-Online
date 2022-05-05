<?php 
include('configr.php');
session_start();
$cname=$_SESSION['email'];

?>
<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
.topnav{
	font-size:30px;
}
div.gallery {
  margin: 5px;
  border: 1px solid white;
  float: left;
  width: 280px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 40%;
}

div.desc {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:5px;
}
</style>
</head>
<body>
<div class="pannel">
  <div class="rimg"><img src="images/3.png"  height="100"  align="left">
 <p> <p>..Welcome <?php echo $cname; ?>..</p></p>
</div>

<div class="topnav">
    <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `product`";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		
		?>
    <a href="catview2.php?am=<?php echo $res["prod_id"];?>">
  <?php echo $res['prod_name'];?></a>
<?php
	}
	?>
	<a href="mycart.php" >My cart</a>
	<a href="profile.php" >My Profile</a>
  <a href="login.php" style="float:right">Logout</a>
  
</div>

    
<center>
<br>
<br>
<?php

$id=$_GET["am"];
//echo "$id";
$query="SELECT * FROM `subcategory` WHERE `cat_id`='$id' ;"; 
$data = mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($data))
{
			?>
	<form action="manage_cart.php" method="POST">
	<div class ="gallery">
		<a href="singleprod.php?pro=<?php echo $res['subcat_id'];?>">
        	<img src="image/<?php echo $res['subcat_image'];?>" width="600px" height="600px">
			</a>
            <div class="desc">
			<p class="prod" name="prod"><?php echo $res['subcat_name'];?><br></p>
			<p class="Price" name="Price">Price:<?php echo $res['subcat_price'];?></p>
			</div>
			<button type="submit"name="Add_to_cart"  class="btn btn-info">Add to Cart</button>
			<br>
			<input type="hidden" name="prod"value="<?php echo $res['subcat_name'];?>">  
			<input type="hidden" name="Price"value="<?php echo $res['subcat_price'];?>"> 
		</form>
	<?php
	
}?>

 </div> 
</body>
</html>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>