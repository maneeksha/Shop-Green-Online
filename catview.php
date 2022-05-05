<?php 
include('configr.php');
?>
<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
.topnav{
	font-size:30px;
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
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.containerimg1{;
  text-align: center;
  color: white;
  font-size:65px;
  filter: brightness(100%);
   filter: contrast(75%);
}
.containerimg {
  position: relative;
  text-align: center;
  color: white;
  font-size:65px;
  
}
.centered {
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
}
input[type=button] {
   border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #555;
  color: white;
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
  padding: 0px;
  text-align: center;
  color:black;
  font-size:25px;
}
</style>
</head>
<body>
<div class="pannel">
  <div class="rimg"><img src="images/3.png"  height="110"  align="left">

</div>
<br>

<div class="topnav">
<a href="user.php" >Home</a>

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
<a href="mycart.php" >My cart</a>
  <a href="login.php" style="float:right">Logout</a>
  
</div>

  </div>    
<center>
<br>
<br>
<?php
include('configr.php');

$id=$_GET["am"];
//echo "$id";
$query="SELECT * FROM `category` WHERE prod_id='$id' ;"; 
$data = mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($data))
{
	
		?>  
<div class="gallery">
  <img src="<?php echo $res['cat_image']; ?>" alt="Snow" style="width:100%; height:40%;">
<div class="desc">
  <?php echo $res['cat_name'];?>
  <a href="subcatview.php?am=<?php echo $res["cat_id"];?>"><br><br>
  <input type="button" value="Explore"></a></b></div>
 <br>
</div>
</div>
 	<?php
	}
?>

</body>
</html>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>