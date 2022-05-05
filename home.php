
<?php
include('configr.php');
session_start();
$cname=$_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
.header {
  padding: 10px;
  text-align: center;
  background: #ff9999;
  color: white;

}
.header h1 {
  font-size: 30px;
}
.navbar {
  overflow: hidden;
  background-color: white;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  background-color:   #ff3333;
  padding:5px;
  overflow: hidden;
}
li {
  float: right; 
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 30px 10px;
  text-decoration: none;
}
li a:hover {
  background-color: #ff8080;
}
div.gallery {
  margin: 5px;
  border: 2px solid white;
  float: left;
  width: 250px;
  
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 250px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
.footer {
  margin-top: 30%;
  padding:10px;
  text-align: center;
  background: #ddd;
}
button {
  background-color: #ff3333;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 250px;
}
.product-quantity{
	width: 240px;
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
while($res2=mysqli_fetch_assoc($data))
{
			?>
	&nbsp; &nbsp;
	
	</div>
	<form action="manage_cart.php" method="POST">
	<div class ="gallery">
		<a href="singleprod.php?pro=<?php echo $res2['subcat_id'];?>">
        	<img src="image/<?php echo $res2['subcat_image'];?>" width="600px" height="600px">
			</a>
            <div class="desc">
			<p class="prod" name="prod"><?php echo $res2['subcat_name'];?><br></p>
			<p class="Price" name="Price">Price:<?php echo $res2['subcat_price'];?></p>
			</div>
			<button type="submit"name="Add_to_cart"  class="btn btn-info">Add to Cart</button>
			<br>
			<input type="hidden" name="prod"value="<?php echo $res2['subcat_name'];?>">  
			<input type="hidden" name="Price"value="<?php echo $res2['subcat_price'];?>"> 
		</form>
		
			
			

	<?php
	
	}
	
	?> 
	
</div>
</div>

</body>
</html>