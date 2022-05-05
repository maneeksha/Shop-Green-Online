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
  border: 1px solid #ccc;
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
   <a href="Plants.php"><?php echo $res['prod_name'];?></a>
  
<?php
	}
	?>
  <a href="login.php" style="float:right">Login</a>
  <a href="signup.php" style="float:right">SignUP</a>
</div>

    
<center>
<br>
<br>
<?php
		  include('configr.php');
		  
		  	 $query="SELECT * FROM `subcategory`;";
              $data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
<div class="gallery">
<a href="subcatview.php?am=<?php echo $res["prod_id"];?>">
    <img src="<?php echo $res['subcat_image']; ?>" alt="Cinque Terre" width="200" height="200">
	 <div class="desc"><?php echo $res['subcat_name'];?></div>
 </a>
 </div>
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