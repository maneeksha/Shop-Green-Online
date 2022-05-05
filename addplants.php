<?php
include('configr.php');
if(isset($_POST['subm']))
    { 
    $a=$_POST['sub'];
	$c=$_POST['pro'];
	$b=$_POST['details'];
	$d=$_POST['price'];
	if($row=mysqli_fetch_assoc($data)){
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
$sql="INSERT INTO `subcategory`( `cat_id`, `subcat_name`, `subcat_details`,`subcat_image`,`subcat_price`,`status`) 
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
<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>


</style>
</head>
<body>
<div class="header">

<div class="pannel">
  <div class="rimg"><img src="images/3.png"  height="100"  align="left">
  <p></p>
</div>
<div class="navbar">
  <a href="adminhome.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">View
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="usrdtil.php">userdetails</a>
      <a href="bokdtil.php">bookingdetails</a>
      <a href="dcontct.php">contact details</a>
	   <a href="dstaff.php">staff details</a>
    </div>
	</div>
	
	
		 <div class="dropdown">
	  <button class="dropbtn">Add Products
      <i class="fa fa-caret-down"></i>
    </button>
	  <div class="dropdown-content">
      <a href="addcat.php">Categories</a>
      <a href="addsubc.php">Sub-categories</a>
	  <a href="addplants.php">Products</a> 
</div>
</div>
</div>
<div class="fort">
  <form method="POST" action="addplants.php"enctype="multipart/form-data"> 
	 <label>Product Name:</label><br>
    <input type="text" id="sub" name="pro" placeholder="Add name"><br>
    <label>Details:</label><br>
	<input type="text" id="sub" name="details" placeholder="Add details"><br>
    <label>Price:</label><br>
    <input type="text" id="sub" name="price" placeholder="Add price"><br>
	<label>Image:</label><br>
    <input type="file" id="image" name="Photos" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
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
	<br><br>
	<br><input type="submit"name="subm" value="Submit">
  </form>
</div>
<table border="4px"   style="border-color:firebrick;width:50% ;font-size:25px ;margin-left:0%;height:10%">
  <tr>
   <td>Product</td>
     <td>Subcategory</td>
    <td>Name</td>
	 <td>Details</td>
	 <td>Image</td>
	 <td>Price</td>
	 <td>Status</td>
	 
	
   
	
  </tr>

    <?php
		  include('configr.php');
		  
		  	 $query="select p.prod_name,c.cat_name,s.subcat_name, s.subcat_details, s.subcat_image, s.subcat_price,s.status 
			 from subcategory s inner join category c on s.cat_id = c.cat_id inner join product p on c.prod_id = p.prod_id";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
	    <tr>
		<td  width="10px"><center><?php echo $res['prod_name'];?></center></td>
		<td  width="10px"><center><?php echo $res['cat_name'];?></center></td>
		<td ><?php echo $res['subcat_name'];?></td>
		<td><?php echo $res['subcat_details'];?></td>
		<td width="35px"><img height="100px" width="100px" src="image/<?php echo $res['subcat_image']; ?>"></img></td>
		<td><?php echo $res['subcat_price'];?></td>
        <td><?php echo $res['status'];?></td>
		</tr>	
		
	<?php
	}
	?>
</table>



</body>
</html>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>