<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php 
include('configr.php');
session_start();
$cname=$_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1.0">
<title>Cart</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>

table{
	font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}
table tr:nth-child(even){
	background-color: #f2f2f2;
}

table tr:hover {
	background-color: #ddd;
	}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #8a8984;
  color: white;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 35px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container1 {
  background-color: white;
  padding: 15px 20px 15px 20px;
  border: 1px solid green;
  border-radius: 3px;
  color:green;
}
		
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color:green;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #ed766d;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.topnav{
	font-size:30px;
}
div.gallery {
  margin: 5px;
  border: 1px solid white;
  float: left;
  width: 280px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 40%;
}

div.desc {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:5px;
}
.container13 {
  background-color: #f2f2f2;
  padding: 15px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  width:100%;
}
</style>
</head>
<body>
<div class="pannel">
  <div class="rimg"><img src="images/3.png"  height="100"  align="left">
 <p> <p>..Welcome <?php echo $cname; ?>..</p></p>
</div>

<div class="topnav">
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
	<a href="mycart.php" >My cart</a>
	<a href="profile.php" >My Profile</a>
  <a href="login.php" style="float:right">Logout</a>
  
</div>

    
<center>
<br>
<br>
<div class="container1">
    <div class="col-lg-12 text-center border rounded bg-light my-5" >
        <h1> My Cart</h1>
</div>

<div class="col-lg-8">

<table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No:</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class ="text-center">
<?php
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $key => $value)
{
    $sr=$key+1;
   
    echo"
    <tr>
    <td>$sr</td>
    <td>$value[prod]</td>
    <td>$value[Price]<input type='hidden'class='iprice'value='$value[Price]'></td>
    <td>
    <input class ='text-center iquantity'onchange='subTotal()' type='number' value='$value[Quantity]'min='1' max='10'>
    <input  type='hidden'name='prod'value='$value[prod]'>
    </form>
    </td>
    <td class='itotal'></td>
    <td>
    <form action='manage_cart.php'method='POST'>
    <button  name='Remove_Item'class='btn btn-sm btn-outline-danger'>REMOVE</button>
   <input  type='hidden'name='prod'value='$value[prod]'>
    </form>
    </td>
</tr>
";
}
}
?>
    
    
  </tbody>
</table>
<div class="col-lg-9">
    <div class="border bg-light rounded p-4">
        <h4>Grand Total:</h4>
<h5 class="text-right"id="gtotal"></h5>
<br>
</div>
</div>
</div>
</div>
<?php

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{
?>
<br>
<br>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--checkout starts-->
<div class="container13">
<form method="POST" action="#" >
  <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname" ><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="">
            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="">
              </div>
            </div>
          </div>


			</form>
			<?php 
			}
?>	
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
			<script>
			
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
                        "amount": gt * 100, 
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
</script>

</div>
<input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" class="btn"/>
			  <br/><br/>
</div> 

</div>
</div>




<script>

var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
function subTotal()
{
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
       
        gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
}


subTotal();
    </script>
	</div>
	</body>
	</html>