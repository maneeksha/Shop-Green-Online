<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php 
include('configr.php');
session_start ();
$subcat=$_GET['as'];
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
  color: Black;
   
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
  width:100%;
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
  <?php
  $id=$_GET["as"];
//echo "$id";
$query="SELECT * FROM `subcategory` WHERE `subcat_id`='$id' ;"; 
$data = mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($data))
{
			?>
			&nbsp; &nbsp; &nbsp;
<div class="gallery">
 


 </div>

  <div class="prod1">
        <br>
		<br>
 <center>   <img src="image/<?php echo $res['subcat_image']; ?>" alt="Cinque Terre" width="100px" height="150px">
	 
		</div>
		<div class="prod2">
		<br>

	<b><div class="desc" ><?php echo $res['subcat_name'];?></div></b>
     <center>   <div class="desc1"> Price :  &nbsp;	₹<?php echo $res['subcat_price'];?></div>
	 <br>
	 <br>
	 <br>
</div>
<?php
}
?>
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
<form  action="payment_process.php" method="post" >
   <table id="customers">
  
  <tr>   
<th  valign="top"><div align="left">Name</div></th>

<td  valign="top" name="name"><input type="text"name="name" value="<?php ECHO $name; ?>"></td>

  </tr>
   <tr>
    <th valign="top"><div align="left">Address</div></th>

 <td valign="top"><?php echo $add; ?></td>
 
  </tr>
  <tr>
    <th valign="top"><div align="left">Email</div></th>

 <td valign="top"><?php echo $email; ?></td>
 
  </tr>
    <tr>
    <th valign="top"><div align="left">Mobile</div></th>

<td valign="top"><?php echo $phone; ?></td>


  </tr>
 
</td>

  </tr>

    
</table>
<form>
<center><input type="button" name="btn" id="btn" value="Proceed" onclick="pay_now()"></center>
</div>

<script>
<?php
  $id=$_GET["as"];
//echo "$id";
$query="SELECT * FROM `subcategory` WHERE `subcat_id`='$id' ;"; 
$data = mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($data))
{
			?>

    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_L2VOJDIImOQ7wJ", 
                        "amount":<?php echo $res['subcat_price'];?> *100	, 
                        "currency": "INR",
                        "name": "SGO",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="success.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
	<?php
}
?>
</script>