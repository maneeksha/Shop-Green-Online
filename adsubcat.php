<?php
include('configr.php');
if(isset($_POST['subm']))
    { 
    $a=$_POST['sub'];
	$c=$_POST['pro'];
	$b=$_POST['details'];
	$d=$_POST['price'];

	if($_FILES["img"]["tmp_name"]!="")
		$i=$_FILES["img"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	else
		$i=$row['subcat_image'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"image/".$_FILES["img"]["name"]);
 
$query="SELECT * FROM `category` WHERE cat_name='$a' "; 
$data = mysqli_query($con,$query);
if($res=mysqli_fetch_assoc($data))
{
	$ker=$res['cat_id'];
	//echo $ker;
$sql="INSERT INTO `subcategory`( `cat_id`, `subcat_name`, `subcat_details`,`subcat_image`,`subcat_price`,``status`) 
VALUES ('$ker','$c','$b','$i','$d',0)";
	if(mysqli_query($con,$sql))
	{
			echo "registered successfully";
	}
		else  
		{
			echo mysqli_errno($con);
	
	    }
}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
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
  width: 270px;
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
        width: 100%; 
        padding: 12px 20px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        color:black;
		float:center;
    }
.main {
  margin-left: 270px; /* Same as the width of the sidenav */
  font-size: 15px; /* Increased text to enable scrolling */
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
        width: 100%; 
        padding: 12px 20px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        color:black;
		float:center;
    }
	optgroup { font-size:20px; }
.cart_options_col{
	dispaly:inline-block;
	width:30%;
}
.cart_options_col input{
	width:48px;
	
}
</style>
</head>
<body>

<div class="sidenav">
<center><img src="images/3.png"  height="196px"  width="85%" ></center><br>
  <div class="topna">
  <br> <a href="addproduct.php">Products</a><br>
  <a href="addcat.php">Categories</a><br>
  <a href="adsubcat.php">Subcategories</a><br>
  <a href="manguser.php">User Details</a><br>
  <a href="feedbackview.php"> Feedback</a><br>
   <a href="addstaff.php"> Add Staff</a><br>
  <a href="login.php">Logout</a><br>
  
</div>
</div> 
 
<div class="main">
 <center><h2>WELCOME TO SHOP GREEN ADMIN SIDE!!</H2></center>
<form method="POST" action="adsubcat.php"enctype="multipart/form-data"> 
<center><h3>ADD SUBCATEGORIES</h3></center>
	 <label>Subcategories Name:</label><br>
    <input type="text" id="sub" name="pro" placeholder="Add name" required><br>
    <label>Details:</label><br>
	<input type="text" id="sub" name="details" placeholder="Add details" required><br>
    <label>Price:</label><br>
    <input type="text" id="sub" name="price" placeholder="Add price" required><br>
	<label>Image:</label><br>
    <input type="file" id="image" name="img" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
	<br><br>
	<div class="cart_options_col">
	<label>Quantity</label>
	<input type="number" name="quant" min="1" value ="1">
	</div>
	<br><label style="font-size:25px">Category Name:</label><br>
    <select required name="sub" id="sub">
	<optgroup required><br>
	
	 <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `category`";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
		
    <option><?php echo $res['cat_name'];?></option>
	<?php
	}
	?>
	</optgroup>
</select>
<br><input type="submit"name="subm" value="Submit">
  </form>
<br>
<table id="customers" >
  <tr>
  
    <th>Subcategory</th>
	 <th>Image</th>
	 <th>Price</th>
	 <th>Status</th>
	
	  
   
	
  </tr>

    <?php
		 
		  	 $query1="SELECT * FROM `subcategory`";
             $data1 = mysqli_query($con,$query1);
	while($res=mysqli_fetch_array($data1))
	{
		?>
	    <tr>
		<td ><?php echo $res['subcat_name'];?></td>
		<td><img height="50px" width="50px" src="image/<?php echo $res['subcat_image']; ?>"></img></td>
		<td><?php echo $res['subcat_price'];?></td>
		<td><?php echo $res['status'];?></td>
		
		</tr>	
		
	<?php
	}
	?>
	</div>	
</table>
</div>
</body>
</html>
