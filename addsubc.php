w <?php
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
<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
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
<div class="fort" >
  <form method="POST" action="addsubc.php"> 
<label style="font-size:25px">Category Name</label><br>
    <input type="text" id="sub" name="cat" placeholder="Add  name" required><br>
	<label style="font-size:25px">Product Name:</label><br>
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

	<br><input type="submit"name="subm" value="Submit"><br><br>
  </form>
  <br>
  <table border="4px"   style="border-color:firebrick;width:90% ;font-size:25px ;margin-left:0%">
  <tr>
     
    <td>Product</td>
	 <td>Category</td>
	
   
	
  </tr>

    <?php
		  include('configr.php');
		  
		  	 $query=" SELECT product.prod_name ,category.cat_name 
FROM product JOIN category 
ON (product.prod_id = category.prod_id)";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
	    <tr>
		
		<td><?php echo $res['prod_name'];?></td>
		<td><?php echo $res['cat_name'];?></td>
		</tr>	
		
	<?php
	}
	?>
</table>

</div>


</body>
</html>

<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>