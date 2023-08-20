<?php
include('conn.php');

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	
	$filename=time().$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	$path="image/$filename";
	move_uploaded_file($tempname,$path);

	
	$insert="insert into test(name,email,phone,gender,image) values('$name','$email','$phone','$gender','$path')";
	$query=mysqli_query($conn,$insert);
	if($query){
		header("location:table.php");
	}
}




?>


<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<form method="POST" enctype="multipart/form-data" id="form" >
 <div class="form-group row">
    <label class="col-sm-2 col-form-label">NAME</label>
    <div class="col-sm-10">
      <input type="name" class="form-control" name="name" placeholder="name">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Phone" name="phone">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="" type="radio" name="gender" value="male" >
          <label class="form-check-label">
            male
          </label>
        </div>
        <div class="form-check">
          <input  type="radio" name="gender" value="female" >
          <label class="form-check-label" >
            female
          </label>
        </div>
      
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit">submit</button>
    </div>
  </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
	$("#form").validate({
		
		rules :{
			name:"required",
			email:"required",
			phone:"required",
			gender:"required",
			quali:"required",
			job:"required",
		},
		
		messeges :{
			name:"required",
			email:"required",
			phone:"required",
			gender:"required",
			quali:"required",
			job:"required",
		}
	});
});





</script>