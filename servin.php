<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>
 
</style>
</head>
<body>
<div class="pannel">
 
  <div class="rimg"><img src="images/3.png"  height="100" align="left"></div>
  <p>..Capture your best moments with phototantra..</p>
</div>

<div class="topnav">
   <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="servin.php">Services</a>
  <a href="gallary.php">Gallary</a>
  <a href="contact.php">Contact</a>
  <a href="login.php">Book Shoot</a>
  <a href="signup.php" style="float:right">SignUp</a>
  <a href="login.php" style="float:right">Login</a>
</div>
   
<div class="container">
<?php
include('configr.php');
$s=mysqli_query($con,"SELECT `catoid`,`cat_name`, `photo`, `description` FROM `category`");
while($res=mysqli_fetch_array($s))
{
echo "<div class='her'>";
echo"<div class='hero-image'><img src='".$res['photo']."' width=1400px height=500px ></div>";
echo"  <div class='hero-text'>";
echo" <h1 style='font-size:90px'>".$res['cat_name']."</h1>";
echo"<hr color=white>";
echo"<hr color=white>";
echo"<h2>".$res['description']."</h2>";
echo"<hr color=white>";
echo"<hr color=white>";
echo"<br>";
echo '<a href="view.php?id='.$res['catoid'].'"><button>View</button></a></div></div>';
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
}
?>
</div>



</body>
</html>