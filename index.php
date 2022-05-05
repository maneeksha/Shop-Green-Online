<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>

 .hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/banner2.jpg");
  height: 60%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: white;
  background-color:transparent;
  font-family:Goudy Old Style;
  font-size:25px;
  text-align: center;
  cursor: pointer;
}
</style>
</head>
<body>
<div class="pannel">
  <div class="rimg"><img src="images/3.png"  height="100"  align="left">
 <center> <p>....Make A Space For Nature...</p></center>
</div>

<div class="topnav">
    <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `product`";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		
		?>
  <a href="catview.php?am=<?php echo $res["prod_id"];?>">
  <?php echo $res['prod_name'];?></a>
  
<?php
	}
	?>
  <a href="login.php" style="float:right">Login</a>
  <a href="signup.php" style="float:right">SignUP</a>
</div>

<br>
<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:40px ;color:white">We provide the quality plants.</h1>
    <p>make your home green and fresh</p>
  </div>
</div>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
     
      <h1>Planters on fleek! </h1> 
    <p>
The perfect companions for your green members and also decor pieces in their own right, our planters truly amp up your space. There is a plant for every home and a planter for every plant. Browse our extensive in-house collection to find your match.</p>
<div class="rimg"><img src="images/ban3.jpg"  height="500" width="100%" ></div>
</div>
	   <div class="card">
      <h2>Create your spaces more Green</h2>
      <p>At Shop Green, we firmly believe that we do not inherit the earth from our ancestors, but borrow it from our children.
Let's pass it on cleaner, better, and greener.</p>
   
	 <div class="rimg"><img src="images/ban4.jpg"  height="500" width="100%" ></div>
	   </div>
	 </div>
	  <div class="rightcolumn">
	 <center> <h1>...Best Sellers...</h1></center>
    <div class="card">
      
   <center>   <div class="fakeimg" style="height:100px;"><a href="gallary.html"><div class="rimg"><img src="images/pro5.jpg"  height="300" width="200" ></a></div></div>
    </div>
	<br><br>
    <div class="card">
      <h3></h3>
      <center> <br><div class="fakeimg"><p><a href="gallary.html"><img src="images/pro2.jpg"  height="300" width="300" ></a></p></div>
	  <br><div class="fakeimg"><p><a href="gallary.html"><img src="images/pro3.jpg"  height="200" width="300" ></a></p></div>
	  <p>Flat 20% OFF on all Pots & Planters
Containers or Pots for plants in any form are the hot favorites of gardeners worldwide. They save a lot of space and look extremely beautiful.</p>
      
	   <a href="bookshoot.html"><input type="button" value="Buy Now"></a>
	</div>
   
  </div>
</div>
</div>
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
</script