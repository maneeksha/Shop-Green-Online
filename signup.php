 <?php
include('configr.php');
if(isset($_POST['submit']))
{    
	$uname=$_POST['name'];
	$adrs=$_POST['address'];
	$mail=$_POST['email'];
	$mobile=$_POST['phone'];
	$adar=$_POST['adhar'];
	$dob= date('Y-m-d',strtotime($_POST['date']));
	$gen=$_POST['gender'];
    $cpassword=md5($_POST['password']);
	
	
		$sql="INSERT INTO `register`( `reg_name`, `reg_email`,`reg_address`,`reg_phn`,`reg_adhar`,`reg_date`,`reg_gender`,`password`) VALUES('$uname','$mail','$adrs','$mobile','$adar','$dob','$gen','$cpassword')";
		
		if(mysqli_query($con,$sql))
	    {  
	       $query="SELECT * FROM `register` WHERE reg_email='$mail' "; 
           $data = mysqli_query($con,$query);
		   if($row=mysqli_fetch_assoc($data))
		   {
		   $query1="SELECT * FROM `usertype` WHERE type_name='user' "; 
           $data1= mysqli_query($con,$query1);
        if($res=mysqli_fetch_assoc($data1))
          {
	        $ker=$row['reg_id'];
	         //echo $ker;
			 $type=$res['type_id'];
			$sql2="INSERT INTO `login` (`reg_id`,`type_id` ) VALUES('$ker','$type')";
			if(mysqli_query($con,$sql2))
	              {  
			echo "registered";
				  }
		
		
		else  
		{
			echo mysqli_errno($con);
			
		}
		
		}
		}
		}
}
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<style> 
  .form {border: 3px solid green; 
   width:50%;align:center;
   float:center;}
    .span{
   display:block;
   margin-left:20px;
   color:red;
   font-style:italics;
   }   
</style> 
</head>


<body><br>
<center><h1><b>....Make A Space For Nature...</b></h1></center>
<div class="pannel">
  <div class="rimg"><img src="images/20.jpg"  width="650px" height="823px"  align="left"> 
</div>


<div class="topnav">
   <a href="index.php">Plants</a>
  <a href="about.php">Fertilizers</a>
  <a href="ser.php">Accessories</a>
  <a href="login.php">About</a>
  <a href="index.php" style="float:right">Home</a>
  <a href="login.php" style="float:right">Login</a>
</div>
 <br> 
<form action="#" method="post" onsubmit="return validate();">
 
<div class="containers">

    <center>  <h1>..REGISTER HERE...</h1></center>
  <div class="containers1">
        <label for="name"><b>Name</b></label>
        <input type="text" id="name" name="name" placeholder="Your name..">
		<span></span><br>
		 <label for="name"><b>Address</b></label>
		 <textarea id="ad" name="address" placeholder="Enter Your Address"></textarea>
		 <span></span><br>
		<label for="email"><b>Email</b></label>
        <input type="text" id="email" class="check_email"name="email" placeholder="Your  email..">
		<span></span><br>
		<small class="error_email" style="color:red"></small>
		<label for="phone"><b>PhoneNo</b></label>
		<input type="text" id="phn" name="phone" placeholder="Your Phone No">
		<span></span><br>
		<label for="phone"><b>Adhar Number</b></label>
		<input type="text" id="adar" name="adhar" placeholder="Your adhar no">
		<span></span>
		</div>
		<div class="containers2">
		<label for="birthday"><b>Birthday:</b></label><br>
         <input type="date" id="date" max="2021-11-08" name="date" class="datepicker"></p>
		 <p><b>Please select your Gender:</b></p>
         <input type="radio" id="gender" name="gender" value="Male">
         <label for="male">Male</label><br>
         <input type="radio" id="gender3" name="gender" value="Female">
         <label for="female">Female</label><br>
         <input type="radio" id="gender1" name="gender" value="Others">
         <label for="others">Other</label><br><br>
        <label for="password"><b>Password</b></label>
		<input type="password" id="pass1" name="password" placeholder="password">
		 <label for="password"><b>Confirm Password</b></label>
		<input type="password" id="pass2" name="cpassword" placeholder="Confirm Password">
        <span></span>
		<br>
		
  </div>
  <center> <span></span>
  <center><a href="login.php" ><input type="submit" id="submit" value="Register" name="submit"></a></center>
           <center><b>Already have an account ? </b>
		   <br><a href="login.php" style="color:#009900"><b>Login</b> </a></center>
</div>
</form>

 <br><br> <br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br>


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
<script type="text/javascript">
function validate()
{  
  
if(document.getElementById('name').value.length==0 ||document.getElementById('ad').value.length==0 || document.getElementById('gender').value.length==0 ||
document.getElementById('email').value.length==0 || document.getElementById('phn').value.length==0 ||
 document.getElementById('adar').value.length==0 || document.getElementById('date').value.length==0 || 
 document.getElementById('pass1').value.length==0 || document.getElementById('pass2').value.length==0)
{
span[6].innerText = "Complete the registration";
  span[6].style.color = 'red';
return false;
}

}
  let name = document.getElementById('name');
  let date = document.getElementById('date');
  let ad = document.getElementById('ad');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('email');
  let phn = document.getElementById('phn');
  let adhar = document.getElementById('adar');
  let pass1 = document.getElementById('pass1');
  let pass2 = document.getElementById('pass2');
  let butt = document.getElementById('button');
  name.onkeydown = function()
  {
  var regex = /^([\a-zA-Z ]+)([a-zA-Z]+){1,30}$/;
  if(regex.test(name.value))
  {
  span[0].innerText = "";
  span[0].style.color = '#28fc7a';
  name.style.borderColor= '#28fc7a';
  document.getElementById("ad").disabled = false;
  document.getElementById("email").disabled = false;
  document.getElementById("phn").disabled = false;
  document.getElementById("adar").disabled = false;
  document.getElementById("date").disabled = false;
  document.getElementById("gender").disabled = false;
  document.getElementById("gender1").disabled = false;
  document.getElementById("gender3").disabled = false;
  document.getElementById("pass1").disabled =false;
  document.getElementById("pass2").disabled = false;
  
  }
  else
  {
  span[0].innerText = "enter a valid name";
  span[0].style.color = 'red';
  name.style.borderColor= 'red';
  document.getElementById("ad").disabled = true;
  document.getElementById("email").disabled = true;
  document.getElementById("phn").disabled = true;
  document.getElementById("adar").disabled = true;
  document.getElementById("date").disabled = true;
  document.getElementById("gender").disabled = true;
  document.getElementById("gender1").disabled = true;
  document.getElementById("gender3").disabled = true;
  document.getElementById("email").disabled = true;
  document.getElementById("pass1").disabled = true;
  document.getElementById("pass2").disabled = true;
  butt.disable = true;
  }
  }
  
  email.onkeydown = function(){
  const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
  const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
  if(regex.test(email.value) || regexo.test(email.value))
  {
  span[2].innerText = "";
  span[2].style.color = '#28fc7a';
  document.getElementById("phn").disabled = false;
  document.getElementById("adar").disabled = false;
  document.getElementById("date").disabled = false;
  document.getElementById("gender").disabled = false;
  document.getElementById("gender1").disabled = false;
  document.getElementById("gender3").disabled = false;
  document.getElementById("pass1").disabled =false;
  document.getElementById("pass2").disabled = false;

  }
  else
  {
  span[2].innerText = "your email is invalid";
  span[2].style.color = 'red';
  document.getElementById("phn").disabled = true;
  document.getElementById("adar").disabled = true;
  document.getElementById("date").disabled = true;
  document.getElementById("gender").disabled = true;
  document.getElementById("gender1").disabled = true;
  document.getElementById("gender3").disabled = true;
  document.getElementById("pass1").disabled = true;
  document.getElementById("pass2").disabled = true;
  butt.disable = true;
  }
 }
 phn.onkeydown = function(){
   const regexn = /^[0-9]{9}$/;
   if(regexn.test(phn.value))
  {
  span[3].innerText = "";
  span[3].style.color = '#28fc7a';
   document.getElementById("adar").disabled = false;
  document.getElementById("date").disabled = false;
  document.getElementById("gender").disabled = false;
  document.getElementById("gender1").disabled = false;
  document.getElementById("gender3").disabled = false;
  document.getElementById("pass1").disabled =false;
  document.getElementById("pass2").disabled = false;
  
  }
  else
  {
  span[3].innerText = "your number is invalid";
  span[3].style.color = 'red';
  document.getElementById("adar").disabled = true;
  document.getElementById("date").disabled = true;
  document.getElementById("gender").disabled = true;
  document.getElementById("gender1").disabled = true;
  document.getElementById("gender3").disabled = true;
  document.getElementById("pass1").disabled = true;
  document.getElementById("pass2").disabled = true;
  butt.disable = true;
  }
  }
 adar.onkeydown = function(){
   const regexn = /^[0-9]{11}$/;
   if(regexn.test(adar.value))
  {
  span[4].innerText = "";
  span[4].style.color = '#28fc7a';
  document.getElementById("date").disabled = false;
  document.getElementById("gender").disabled = false;
  document.getElementById("gender1").disabled = false;
  document.getElementById("gender3").disabled = false;
  document.getElementById("pass1").disabled =false;
  document.getElementById("pass2").disabled = false;
  }
  else
  {
  span[4].innerText = "your number is invalid";
  span[4].style.color = 'red';
  document.getElementById("date").disabled = true;
  document.getElementById("gender").disabled = true;
  document.getElementById("gender1").disabled = true;
  document.getElementById("gender3").disabled = true;
  document.getElementById("pass1").disabled = true;
  document.getElementById("pass2").disabled = true
  butt.disable = true;
  }
  }
   pass2.onkeyup = function(){
   if (document.getElementById('pass1').value==document.getElementById('pass2').value)
   
  {
  span[5].innerText = "";
  span[5].style.color = '#28fc7a';
  }
  else
  {
  span[5].innerText = "password doesn't match";
  span[5].style.color = 'red';
  }
  }
 </script>

<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>