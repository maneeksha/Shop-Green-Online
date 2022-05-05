
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:90%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  width:25%;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
body {
  font-family: "Lato", sans-serif;
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
.sidenav {
  height: 100%;
  width: 300px;
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

.input[type=button] {
  background-color:#126751;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}
 .input[type=text], 
  { 
        width: 20%; 
        padding: 12px 20px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        color:black;
		float:center;
    }
.main {
  margin-left: 300px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
  color:black;
  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
input[type=submit] {
  background-color:#126751;
  color: white;
  border: 1px;
  border-color:green;
  cursor: pointer;
  float:center;
  width:120px;
  height:35px;
}
input[type=text]
  { 
        width: 50%; 
        padding: 12px 20px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        color:black;
		float:center;
    }
	optgroup { font-size:20px; }

</style>
</head>
<body>

<div class="sidenav">
<center><img src="images/3.png"  height="196px"  width="85%" ></center><br>
  <div class="topna">
  <br> <a href="addproduct.php">Products</a><br>
  <a href="addcat.php">Categories</a><br>
  <a href="adsubcat.php">Subcategories</a><br>
    <a href="feedbackview.php"> Feedback</a><br>
  <a href="manguser.php">User Details</a><br>
     <a href="addstaff.php"> Add Staff</a><br>

  <a href="login.php">Logout</a><br>
  
</div>
</div> 
 <?php
include('configr.php');
if(isset($_POST['subm']))
{   
    $a=$_POST['cat'];
    $b=$_POST['sub'];

$query="SELECT * FROM `product` WHERE prod_name='$b' "; 
$data = mysqli_query($con,$query);
if($res=mysqli_fetch_assoc($data))
{
	$ker=$res['prod_id'];
	//echo $ker;
$sql="INSERT INTO `category`( `prod_id`, `cat_name`) VALUES ('$ker','$a')";
	if(mysqli_query($con,$sql))
	{
			echo "registered successfully";
			
		}
		else  
		{
			echo mysqli_errno($con);
	
		}	}
}
?>
<div class="main">
 <center><h2>WELCOME TO SHOP GREEN ADMIN SIDE!!</H2></center>


<table id="customers">
  <tr>
    <th>Name</th>
	<th>Email</th>
	<th>Subject</th>
	<th>Description</th>
    
  
  </tr>
  
   <?php
		  include('configr.php');
		  
		  	 $query="SELECT feedback.subject ,feedback.decsription,register.reg_name,register.reg_email
FROM feedback JOIN register 
ON (feedback.reg_id = register.reg_id);";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_array($data))
	{
		?>
	    <tr>
		
		<td><?php echo $res['reg_name'];?></td>
		<td><?php echo $res['reg_email'];?></td>
		<td><?php echo $res['subject'];?></td>
		<td><?php echo $res['decsription'];?></td>
			
		</tr>	
	
	<?php
	}
	?>
		
</table>
</div>
</body>
</html>
<script type="text/javascript">
function validate()
{  
  
if(document.getElementById('cat').value.length==0)
 
{
span[0].innerText = "enter a valid name";
  span[0].style.color = 'red';
return false;
}

}
 </script>
