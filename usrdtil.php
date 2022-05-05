
<?php
include('configr.php');
session_start();

?>

<DOCTYPE! HTML>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>
input[type=text], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #660000;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: yellow;
}

.fort {
  border-radius: 5px;
  background-color: black;
  padding: 5px;
  margin-left:30%;
}
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #660000;
}

.navbar a {
  float: left;
  font-size: 20px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  width:10%;
}

.dropdown {
  float: left;
  overflow: hidden;
  font-size: 20px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: 2px;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  font-size: 20px;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
    background-color:#660000;
}

.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
   width:100%;
}

.dropdown-content a:hover {
  background-color:black;
  width:100%;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>
<div class="header">
  <div class="rimg"><img src="images/3.png"  height="200"  align="center">
  
</div>



<div class="topnav">
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
	  <button class="dropbtn">Products
      <i class="fa fa-caret-down"></i>
    </button>
	  <div class="dropdown-content">
      <a href="gal.php">add products</a>
      <a href="usrgal">add category </a>
      
    </div>
	</div>
	
		 <div class="dropdown">
	  <button class="dropbtn">Services
      <i class="fa fa-caret-down"></i>
    </button>
	  <div class="dropdown-content">
      <a href="adds.php">add Services</a>
      <a href="addc.php">add categories</a>
      <a href="mser.php">manage services</a>
	  <a href="mcat.php">manage categories</a>
    </div>
	
  </div> 
</div>
<br>
<br>
<center><table border="5px"   style="border-color:firebrick;font-size:25px ;margin-left:0%">
  <tr>
    <td>Name</td>
	<td>Email</td>
    <td>Address</td>
    
	<td>Phone</td>
	<td>Adhar</td>
	 <td>Date</td>
	<td>Gender</td>
	<td>Password</td>
	
  </tr>

    <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM register";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		?>
	    <tr>
		<td><?php echo $res['reg_name'];?></td>
		<td><?php echo $res['reg_email'];?></td>
		<td><?php echo $res['reg_address'];?></td>
		
		<td><?php echo $res['reg_phn'];?></td>
	    <td><?php echo $res['reg_adhar'];?></td>
		<td><?php echo $res['reg_date'];?></td>
		<td><?php echo $res['reg_gender'];?></td>
		<td><?php echo $res['password'];?></td>
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