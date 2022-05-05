
<?php 
include('configr.php');
session_start ();

$cname=$_SESSION['email'];
$res= mysqli_query($con,"SELECT * FROM `register`where reg_email='$cname'");
while($r = mysqli_fetch_array($res))
{
$id=$r['reg_id'];
$name=$r['reg_name'];
$add=$r['reg_address'];
$email=$r['reg_email'];
$phone=$r['reg_phn'];
$adhar=$r['reg_adhar'];
$dob=$r['reg_date'];
$gender=$r['reg_gender'];
}
if(isset($_POST["submit"]))
{
  $name1=$_POST['name'];
  $add2=$_POST['add'];
  $email3=$_POST['mail'];
  $phone4=$_POST['phn'];
  $adhar5=$_POST['adhar'];
  
  //echo $name;
   mysqli_query($con,"UPDATE `register` SET `reg_name`='$name1',`reg_email`='$email3',`reg_address`='$add2',`reg_phn`='$phone4',`reg_adhar`='$adhar5' WHERE  `reg_id`='$id'");
   echo 'edited successfully';
   header("location:profile.php");
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

}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  width:5%;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:white;
  color: black;
   
}
</style>
</head>
<body>
<div class="sidenav">
<center><img src="images/3.png"  height="200px"  width="80%" ></center><br>
  <div class="topna">
  <br> <a href="editprofile.php">Edit Profile</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>
</div> 
<div class="main">

<div class="pannel">
  
  <p>..Welcome <?php echo $cname; ?>..</p>
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
   <table id="customers">
  
  <tr>   
<th  valign="top"><div align="left">Name</div></th>

<td  valign="top"><input type="text" name="name" value="<?php ECHO $name; ?>"></td>

  </tr>
   <tr>
    <th valign="top"><div align="left">Address</div></th>

 <td valign="top"><input type="text" name="add" value="<?php echo $add; ?>"></td>
 
  </tr>
  <tr>
    <th valign="top"><div align="left">Email</div></th>

 <td valign="top"><input type="text" name="mail" value="<?php echo $email; ?>"></td>
 
  </tr>
    <tr>
    <th valign="top"><div align="left">Mobile</div></th>

<td valign="top"><input type="text" name="phn" value="<?php echo $phone; ?>"></td>


  </tr>
      <tr>
    <th valign="top"><div align="left">Aadhar</div></th>

<td valign="top"><input type="text" name="adhar" value="<?php echo $adhar; ?>"></td>

  </tr>
   </table>
   <br>
  <center><input type="submit" name="submit" value="UPDATE"></center>
</form>
</div>
</div>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>