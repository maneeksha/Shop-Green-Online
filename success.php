
<?php 
include('configr.php');
session_start ();

$cname=$_SESSION['email'];
$res= mysqli_query($con,"SELECT * FROM `register`where reg_email='$cname'");
while($r = mysqli_fetch_array($res))
{
$name=$r['reg_name'];
$add=$r['reg_address'];
$email=$r['reg_email'];
$phone=$r['reg_phn'];
$adhar=$r['reg_adhar'];
$dob=$r['reg_date'];
$gender=$r['reg_gender'];

}
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>
table
{
	font-size:
}
.sidenav {
  height: 100%;
  width: 290px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#CBF1CC;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}
.main {
  margin-left:281px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
  color:black;
  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.topna {
  overflow: hidden;
  background-color:#04AA6D;
  color:white;
}

/* Change color on hover */
.topna a:hover {
  background-color:black;
  color: white;

}
.topnav1 {
  overflow: hidden;
  background-color:#04AA6D;
}

/* Style the topnav links */
.topnav1 a {
  font-size: 20px;
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-family:Goudy Old Style
}

/* Change color on hover */
.topnav1 a:hover {
  background-color:black;
  color: white;
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
  background-color:#fbd32c;
  text-align: center;
  cursor: pointer;
  font-size:30px;
  height:8%;
  width:1000%;
}

input[type=button]:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>
<div class="sidenav">
<center><img src="images/3.png"  height="200px"  width="80%" ></center><br>
  <div class="topna">
 
</div> 
</div>
<div class="main">

<div class="pannel">
  
  <p>...Welcome <?php echo $name; ?>...</p>
</div>

<div class="topnav1">
	<a href="user.php" >Home</a>

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
	<a href="profile.php" >My Profile</a>
	<a href="mycart.php" >My Cart</a>
    <a href="login.php" style="float:right">Logout</a>
  
</div>
<br>
</h3><br>
<form  action="#" method="post" >
   <div class="containerimg">
 <div class="containerimg1">

<center><img src="images/payment.png"style="width:50%; height:50%;">
  </div>


</div>

</div>
<form>

</div>

<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>