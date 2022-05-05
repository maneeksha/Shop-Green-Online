<?php
include('configr.php');
if(isset($_POST['subm']))
    { 
  
	 $a=$_POST['sub'];
	 $b=$_POST['name'];
	 $c=$_POST['email'];
	 $d=$_POST['phone'];
	 
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
$query="SELECT * FROM `jobs` WHERE Job_name='$a' ;"; 
$data = mysqli_query($con,$query);
if($res=mysqli_fetch_assoc($data))
{
	$ker=$res['job_id'];
	//echo $ker;
$sql="INSERT INTO `staff`( `job_id`, `staff_name`, `staff_email`, `staff_phone`, `photo`)
VALUES ('$ker','$b','$c','$d','$filePath');";
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
</style>
</head>
<body>
<div class="sidenav">
<center><img src="images/3.png"  height="200px"  width="80%" ></center><br>
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
<br>
<br>
<br>
<br>
<br>
<br>
 <center><h2>WELCOME TO SHOP GREEN ADMIN SIDE!!</H2></center>
 <form method="POST" action="addstaff.php"enctype="multipart/form-data"> 
<center><h3>ADD STAFFS</h3></center>
<label style="font-size:25px"> Name</label><br>
    <input type="text" id="sub" name="name" placeholder="Add  name" required><br>
	<label style="font-size:25px">Email</label><br>
    <input type="text" id="sub" name="email" placeholder="Add  name" required><br>
	<label style="font-size:25px">Phone</label><br>
    <input type="text" id="sub" name="phone" placeholder="Add  name" required><br>
<br><label style="font-size:25px">Photo:</label><br>
    <input type="file" id="image" name="Photos" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
	<br><label style="font-size:25px">Category Name:</label><br>
    <select required name="sub" id="sub">
	<optgroup>
	 <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `jobs`";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
		
    <option><?php echo $res['Job_name'];?></option>
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
   
	 <th>Name</th>
	 <th>Email</th>
	 <th>Phone</th>
	 <th>Photo</th>
	 <th>Job</th>
	 <th>Salary</th>
	  <th></th>
	
   
	
  </tr>

    <?php
		  include('configr.php');
		  
		  	 $query="select j.Job_name,j.salary,s.staff_name,s.staff_email,s.staff_phone,s.photo
			 from staff s inner join jobs j on s.job_id = j.job_id ;";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
	    <tr>
		
		<td  ><?php echo $res['staff_name'];?></center></td>
		<td  ><?php echo $res['staff_email'];?></center></td>
		<td  ><?php echo $res['staff_phone'];?></center></td>
		<td><img height="100px" width="100px" src="<?php echo $res['photo']; ?>"></img></td>
		<td  ><?php echo $res['Job_name'];?></center></td>
		<td  ><?php echo $res['salary'];?></center></td>
		
		<td>
<input type="button" style="background-color:blue;" value="Edit">
<input type="button" style="background-color:red;" value="Delete">
		</td>
		</tr>	
		
	<?php
	}
	?>
	</div>	
</table>
</form>
</div>
</body>
</html>
