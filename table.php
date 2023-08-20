<?php
include('conn.php');
$select="select * from test";
$query=mysqli_query($conn,$select) ;

?>
<!doctype html>
<html>
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">NAME</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
	  <th scope="col">image</th>
	  <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
   <?php while($fetch=mysqli_fetch_assoc($query)){
	  
?>
    <tr>
      <td><?php echo $fetch['id']?></td>
      <td><?php echo $fetch['name']?></td>
      <td><?php echo $fetch['email']?></td>
      <td><?php echo $fetch['phone']?></td>
	  <td><img src="<?php echo $fetch['image']?>" style="height:70px;width:80px;"></td>
	  <td><a href="delete.php?userid=<?php echo $fetch['id']?>"><button class="btn btn-danger">DELETE</button></a>
	      <a href="edit.php?userid=<?php echo $fetch['id']?>"><button class="btn btn-warning">EDIT</button></a>
	       <a href="view.php?userid=<?php echo $fetch['id']?>"><button class="btn btn-success">view</button></a></td>
	
    </tr>
     <?php } ?>
  </tbody>
</table>
</body>