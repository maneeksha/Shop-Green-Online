<?php
include('configr.php');
session_start();
$id=$_GET["am"];
echo "$id";
$edit=mysqli_query($con,"SELECT * FROM `subcategory` WHERE `subcat_id`='$id'");
$res=mysqli_fetch_assoc($edit);

if (isset($_POST["submit"]))
{
  $b=$_POST["sub"];
  $query="SELECT * FROM `category` WHERE cat_name='$b' "; 
  $data = mysqli_query($con,$query);
  if($row=mysqli_fetch_assoc($data)){

    $ker=$row["cat_id"];
    //echo $name;
    $a=$_POST["pro"];
    //echo $address;
    $p=$_POST["details"];
    //echo $phone;
	 $d=$_POST["price"];
	if($_FILES["img"]["tmp_name"]!="")
		$i=$_FILES["img"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	else
		$i=$row['subcat_image'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"image/".$_FILES["img"]["name"]);
  mysqli_query($con,"UPDATE `subcategory` SET `cat_id`='$ker',`subcat_name`='$a',`subcat_details`='$p', `subcat_image`='$i',`subcat_price`='$d' ,`status`=0 WHERE `subcat_id`='$id'");
  header("location:adsubcat.php");
 }
$edit=mysqli_query($con, "SELECT * FROM `subcategory` WHERE `subcat_id`='$id'");
$row=mysqli_fetch_array($edit);
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
  margin-left:300px; /* Same as the width of the sidenav */
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
</style>
</head>
<body>

<div class="sidenav">
<center><img src="images/3.png"  height="200px"  width="80%" ></center><br>
  <div class="topna">
  <br> <a href="addproduct.php">Products</a><br>
  <a href="addcat.php">Categories</a><br>
  <a href="adsubcat.php">Subcategories</a><br>
  <a href="User.php">User Details</a><br>
  <a href="login.php">Logout</a><br>
  
</div>
</div> 	
<div class="main">
<br>
<br>

 <center><h2>WELCOME TO SHOP GREEN ADMIN SIDE!!</H2></center>
 <form method="POST" action="#" enctype="multipart/form-data"> 
	<center><h3>ADD SUBCATEGORIES</h3></center>
	 <label>Subcategories Name:</label><br>
    <input type="text" id="sub" name="pro" value="<?php echo $res["subcat_name"];?>"><br>
    <label>Details:</label><br>
	<input type="text" id="sub" name="details" value="<?php echo $res["subcat_details"];?>"><br>
    <label>Price:</label><br>
    <input type="text" id="sub" name="price" value="<?php echo $res["subcat_price"];?>"><br>
	<label>Image:</label><br>
	<img src="image/<?php echo $res["subcat_image"]?>" height="100" width="100"/>
    <input type="file" id="img" name="img"  >
	<br><label style="font-size:25px">Category Name:</label><br>
    <select required name="sub" id="sub">
	<optgroup>
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
	
	<input type="submit" name="submit" value="submit">
	<span></span>
  </form>
</div>
</body>
</html>
<script>

</script>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>