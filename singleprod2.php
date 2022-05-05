
<?php 
include('configr.php');
session_start();
$cname=$_SESSION['email'];

?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<style> 
  .form {border: 3px solid green; 
   width:50%;align:center;
   float:center;}
    .span{
   display:block;
   margin-left:20px;
   color:red;
   font-style:italics;
   } 
.prod {

  padding: 2px ;
  float:center;
  width:90%;
  height:100%;
  background-color:#80ffaa;
  margin-left: auto;
    margin-right: auto;
   color:#003300; 
   font-size:20px;
}

.prod1 {
  padding: 0px 20px ;
  float:left;
  width:50%;
  height:90%;
  background-color:white;
  margin-left: auto;
  margin-right: auto;
  color:#003300;
  font-size:20px;
}
.prod2 {
  padding: 25px 20px ;
  float:left;
  width:50%;
  height:90%;
  background-color:white;
  margin-left: auto;
  margin-right: auto;
  color:#003300;
  font-size:20px;
} 

div.desc {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:35px;
}  
div.desc1 {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:25px;
} 
div.desc2 {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:23px;
} 
input[type=button] {
   border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color:#fbd32c;
  text-align: center;
  cursor: pointer;
  font-size:30px;
  height:10%;
  width:40%;
}

input[type=button]:hover {
  background-color: #555;
  color: white;
}
input[type=submit] {
   border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color:#60de3b;
  text-align: center;
  cursor: pointer;
  font-size:30px;
  height:10%;
  width:40%;
}

input[type=submit]:hover {
  background-color: #555;
  color: white;
}
</style> 
</head>


<body>

<div class="pannel">
 <div class="rimg"><img src="images/3.png"  height="100"  align="left">
  <p>..Welcome <?php echo $cname; ?>..</p>

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
  <a href="login.php" style="float:right">Logout</a>
</div>
 <br> 
<form action="#" method="post" onsubmit="return validate();">
 
<div class="prod">
	<?php

$id=$_GET["am"];
//echo "$id";
$query="SELECT * FROM `subcategory` WHERE `subcat_id`='$id' ;"; 
$data = mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($data))
{
			?>
			&nbsp; &nbsp; &nbsp;
<div class="gallery">
 


 </div>

  <div class="prod1">
        <br>
		<br>
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="image/<?php echo $res['subcat_image']; ?>" alt="Cinque Terre" width="450px" height="475px">
	 
		</div>
		<div class="prod2">
		<br><br><br>

	<b>	<div class="desc" ><?php echo $res['subcat_name'];?></div></b>
        <div class="desc1"> Price :  &nbsp;	₹<?php echo $res['subcat_price'];?></div>
	 <div class="desc2" ><?php echo $res['subcat_details'];?></div>
	 <br>
	 <br>
	 <br>
	   &nbsp; &nbsp;&nbsp; &nbsp;
	    <a href="cart.php?id=<?php echo $res["subcat_id"];?>">
		<input type="button" name="submit" value="Add to Cart"><input type="submit" name="submit" value="Buy Now">
		</a>
  </div>
 	<?php
	
}?>
</div>
</form>
<div class="footer">
<br><center>
      <p>...WE PROVIDE THE BEST PRODUCTS & SERVICES...</p>
	  <h3>Follow Us</h3>
     <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Add font awesome icons -->
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-youtube"></a>

</div>
</body>
</html>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>