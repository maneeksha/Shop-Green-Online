
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
   <a href="addstaff.php"> Add Staff</a><br>
  <a href="manguser.php">User Details</a><br>
    

  <a href="login.php">Logout</a><br>
  
</div>
</div> 
 <?php
include('configr.php');
if(isset($_POST['subm']))
{   
    $a=$_POST['cat'];
    $b=$_POST['sub'];

	
$fileName = $_FILES['Photos']['name'];
$tmpName  = $_FILES['Photos']['tmp_name'];
$fileSize = $_FILES['Photos']['size'];
$fileType = $_FILES['Photos']['type'];
$folder = 'image/';
$filePath = $folder.$fileName;

$resu = move_uploaded_file($tmpName, $filePath);
if (!$resu) {
ECHO "File already exist"; 
      }
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
  $filePath = addslashes($filePath);
}
$query="SELECT * FROM `product` WHERE prod_name='$b' "; 
$data = mysqli_query($con,$query);
if($res=mysqli_fetch_assoc($data))
{
	$ker=$res['prod_id'];
	//echo $ker;
$sql="INSERT INTO `category`( `prod_id`, `cat_name`,`cat_image`,`status`) VALUES ('$ker','$a','$filePath',0)";
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

  <form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
	
	<label style="font-size:25px">Category Name:</label>
   <br> <input type="text"  id="cat" name="cat" placeholder="Add Category name" >
   <span></span>
	<br><label style="font-size:25px">Product Name:</label><br>
    <select required name="sub" id="sub">
	<optgroup>
	 <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `product`";

$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
		
    <option><?php echo $res['prod_name'];?></option>
	<?php
	}
	?>
	</optgroup>
</select>
<br>
<input type="file" id="image" name="Photos" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
<span></span>	
<input type="submit"  name="subm" value="Add Category">
  </form>
<table id="customers">
  <tr>
    <th>Products</th>
	<th>Categories</th>
    <th></th>
  
  </tr>
  
   <?php
		  include('configr.php');
		  
		  	 $query=" SELECT product.prod_name ,category.cat_id,category.cat_name 
FROM product JOIN category 
ON (product.prod_id = category.prod_id)";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
	    <tr>
		
		<td><?php echo $res['prod_name'];?></td>
		<td><?php echo $res['cat_name'];?></td>
			<td>
			<a href="editcat.php?am=<?php echo $res["cat_id"];?>">
<input type="button" style="background-color:blue;" value="Edit"></a>

							   </td>
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
