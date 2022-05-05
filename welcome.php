<?php
include('configr.php');
?>
<table border=1>
<tr>
<th>ID</th>

</tr>
<?php
$res=mysqli_query($con,"SELECT * FROM `register`");
 while($row=mysqli_fetch_array($res)){ 
?>
<tr>
<td><?php echo $row['User_Id'];?></td>
</tr>
<?php
}
?>
</table>