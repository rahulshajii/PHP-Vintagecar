<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Edit profile</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<style>
		 .profile-box {
			margin-left:550px;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
	input{
    margin: 15px;

}
	</style>
</head>
<body>
<?php
session_start();
include("../authentication/config.php");
$userid= $_SESSION['userdata'];
if(isset($userid)){
	$qry = "SELECT * from tbl_user where login_id=".$userid; 
	$check= mysqli_query($connect,$qry); 
    
    if(mysqli_num_rows($check) > 0)
    {
     $userdata= mysqli_fetch_array($check);
	}
}
?>
<?php include('usernavbar.php');?>

<div class="profile-box">
<form action="userupdate.php" method="POST" enctype="multipart/form-data">
	<div>
		<label for="name">Full Name:</label>
		<input type="text" name="name" value="<?php echo $userdata['name'];?> ">
	</div>
	<br>
	<div class="ab">
		<label for="age">Date of Birth:</label>
		<input type="date" id="datemax" name="age" max="2013-12-31" value="<?php echo $userdata['age'];?>">
	</div>
	<br>
	<div>
		<label for="gender">Gender:</label>
		<input type="radio" name="gender" value="male" <?php if ($userdata['gender'] == 'male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="female" <?php if ($userdata['gender'] == 'female') echo 'checked'; ?>> Female

	</div>
	<br>
	<div>
		<label for="phone">Phone Number:</label>
		<input type="number" name="phone" value="<?php echo $userdata['phone'];?>">
	</div>
	<br>
	<div>
		<label for="address">Address:</label> <br>
		<input type="text" name="address" value="<?php echo $userdata['address'];?>">
	</div>
	<br>
	<div>
	<label for="photo">Photo</label>
	
	<p> <img src="../authentication/user_images/<?php echo $userdata['photo']; ?>" width="75" height="75" /></p>
        <input type="file" value="<?php echo $userdata['photo'];?>" name="photo"/>
    &nbsp;
</div>

	<div>
		<label for="lsnumber">License Number:</label>
		<input type="text" name="lsnumber" value="<?php echo $userdata['license'];?>">
	</div>
     <br>
		<button type="submit" class="btn btn-success py-2 mr-1" name="update">Update</button>
	</div>
	<br>
</form>
</div>
<?php include('userfooter.php');?> 
</body>
</head>