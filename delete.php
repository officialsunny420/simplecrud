<?php
include('conn.php');
$userid=$_GET['userid'];
$delete="delete from test where id='$userid'";
$fire=mysqli_query($conn,$delete);
if($fire){
	header("location:table.php");
}


?>