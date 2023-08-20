<?php
include('conn.php');
$id=$_GET['userid'];
$get="select * from test where id='$id'";
$query=mysqli_query($conn,$get);
$fetch=mysqli_fetch_assoc($query);


if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$a= implode(',',$_POST['quali']);
	$job=$_POST['job'];
	if (!empty($_FILES['image']['name'])){
	$filename=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	$path="image/$filename";
	move_uploaded_file($tempname,$path);}
	else{
		$path=$fetch['image'];
	}
	
	$update="update test set name='$name',email='$email',phone='$phone',gender='$gender',quali='$a',job='$job',image='$path' where id='$id'";
	$check=mysqli_query($conn,$update);
	if($check){
		header("location:table.php");
	}
	
}

?>

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<form method="post" enctype="multipart/form-data" id="form" >
 <div class="form-group row">
    <label class="col-sm-2 col-form-label">NAME</label>
    <div class="col-sm-10">
      <input type="name" class="form-control" name="name" value="<?php echo $fetch['name']?>">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" value="<?php echo $fetch['email']?>"name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control"  value="<?php echo $fetch['phone']?>" name="phone">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="" type="radio" name="gender" value="male" <?php if($fetch['gender']=='male'){echo "checked";}?> >
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
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
	   <?php $quali=explode(',',$fetch['quali']);?>
      <div>
        <input class="" type="checkbox" name="quali[]" value="MCA" <?php if(in_array('MCA',$quali))echo"checked";?>>
        <label class="form-check-label" >
          MCA
        </label>
      </div>
	    <div>
        <input class="form-check-input" type="checkbox" name="quali[]" value="BCA"  <?php if(in_array('BCA',$quali))echo"checked";?>>
        <label class="form-check-label">
          BCA
        </label>
      </div>
	    <div>
        <input class="form-check-input" type="checkbox" name="quali[]" value="BA"  <?php if(in_array('BA',$quali))echo"checked";?>>
        <label class="form-check-label">
          BA
        </label>
      </div>
	  <select class="form-control form-control-lg" name="job">
	  <option>...select..</option>
      <option <?php if($fetch['job']=='android developer'){echo "selected";}?>>android developer</option>
	   <option <?php if($fetch['job']=='php developer'){echo "selected";}?> >php developer</option>
	    <option <?php if($fetch['job']=='python developer'){echo "selected";}?>>python developer</option>
     </select><br>
	  <img src="<?php echo $fetch['image']?>" style="height:80px;width:90px;"><br>
	 <input type="file" name="image">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit">submit</button>
    </div>
  </div>
</form>


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
			name:" name is required",
			email:" email is required",
			phone:"phone is required",
			gender:"gender is required",
			quali:"qualification is required",
			job:"job is required",
		}
	});
});


</script>