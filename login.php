<?php
include('configr.php');
session_start();
if(isset($_POST['check_submit_btn']))
{
  $email = $_POST['email_id'];

  $emailQuery = "SELECT * FROM `register` where `reg_email`='$email' ";
  $query = mysqli_query($con,$emailQuery);

  if(mysqli_num_rows($query) > 0){
    echo "";
  }
  else{
    echo "Email Not Exist";
}
exit();
}
?> 
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="script.js"></script>
</head>


<body>
<div class="pannel">
<div class="rain">
  <div class="rimg"><img src="images/3.png"  width="650px" height="620px"  align="left">
  <h1>..Feel The Nature In You..</h1>
  </div>
</div>


<div class="topnav">
  <?php
		  include('configr.php');
		  
		  $query="SELECT * FROM `product`";
$data = mysqli_query($con,$query);
	while($res=mysqli_fetch_assoc($data))
	{
		
		?>
  <a href="catview.php?am=<?php echo $res["prod_id"];?>">
  <?php echo $res['prod_name'];?></a>
  
<?php
	}
	?>
  <a href="index.php" style="float:right">Home</a>
  <a href="signup.php" style="float:right">SignUP</a>
</div>
 <br> 
 <div id="error_msg"></div>
<form action="login.php" method="post" >
 
<div class="container5">

  <div class="container">
  
    <label for="uname"><b>Username</b></label><br>
    <input class="checking_email" id="email" type="text" placeholder="Enter your email id" name="uname" required>
	<small class="error_email" style="color:red;"></small>
<br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
		<br>
   <center> <input type="submit"  name="submit" ></center><br>
<center> <a href="forget.html" style="color:#126751" ><b>Forget Password</b></a>
          <br> don't have an account ? <br>
		   <a href="signup.php" style="color:#126751"><b>SIGNUP</a>
        
		<br>
  </div>
</div>
</form>
 </form> 
 <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php



	if(isset($_POST['submit']))
{  
	$us=$_POST['uname'];
	$password=md5($_POST['psw']);
	
	$query="SELECT * FROM `register` WHERE reg_email='$us'AND password='$password'  ";
	$res=mysqli_query($con,$query);
	
	
	if(mysqli_num_rows($res)>0)
	{ 
                       $_SESSION['email']=$uname;
					   if(( $us =="admin@123.com"))
					   {
					   	
					   	
						   header('location:adminhome.php');
					   }
					   else{
						   
					   	$_SESSION['email']=$us;
                       header('location:user.php');

                           }
					   
                     }
					 else
					 {
						 echo '<script type="text/javascript"> alert("invalid user name or password!!")</script>';
                            }

}
						 

?> 
 </form> 
<div class="footer">
<br><center>
      <p>...WE PROVIDE THE BEST PRODUCTS & SERVICES...</p>
	  <h3>Follow Us</h3>
     <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Add font awesome icons -->
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-youtube"></a>

</div>
</body>
</html>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 
