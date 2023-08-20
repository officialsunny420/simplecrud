<?php
include('conn.php');
$id=$_GET['userid'];
$get="select * from test where id='$id'";
$query=mysqli_query($conn,$get);
$fetch=mysqli_fetch_assoc($query);
 

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
      
    </div>
  </div>
</form>