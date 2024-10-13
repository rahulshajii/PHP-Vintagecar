<?php 
session_start();
include("../authentication/config.php");
$userid= $_SESSION['userdata'];
if(isset($userid)){
	$qry ="SELECT u.*,l.email as email FROM `tbl_user` u INNER JOIN tbl_login l ON u.login_id=l.id where login_id=".$userid;
	$check= mysqli_query($connect,$qry); 
    
    if(mysqli_num_rows($check) > 0)
    {
  $userdata= mysqli_fetch_array($check);
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Box</title>
    <style>
         body {
            
         
        }
        .profile-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .profile-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .profile-box .profile-item {
            margin-bottom: 15px;
        }
        .profile-box .profile-item label {
            display: block;
            color: #666;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .profile-box .profile-item span {
            display: block;
            color: #333;
        }
        .profile-box .profile-item img {
            max-width: 100%;
            border-radius: 8px;
        }
        .profile-box .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }
        .profile-box .footer a {
            color: #01D28E;
            text-decoration: none;
        }
        .profile-box .footer a:hover {
            text-decoration: underline;
        }
        .one{
            position:relative;
        }
    </style>
	
</head>
<body style="background-color:#01D28E";>
	<?php include('usernavbar.php'); ?>


    <div class="container">
    <div class="row justify-content-end"> 
        <div class="col-4">
            <div class="p-3" style="background-color: white; border: 1px solid #ccc; border-radius: 5px;"> 
            <?php
                echo "<h4>Your Car Booking Sessions</h4>";

                // Initialize variable to track if any booking was found
                $Flag = false;

                // Check for pending bookings
                $resultPending = mysqli_query($connect, "SELECT * FROM tbl_session WHERE status='0' AND user_id=$userid");

                if ($resultPending && mysqli_num_rows($resultPending) > 0) {
                    echo "<p>Your bookings are pending.</p>";
                    $Flag = true;
                }

                // Check for successful bookings
                $resultConfirmed = mysqli_query($connect, "SELECT * FROM tbl_session WHERE status='2' AND user_id=$userid");

                if ($resultConfirmed && $session = mysqli_fetch_array($resultConfirmed)) {
                    echo "<p>your Bookings is Confirm ✅</p>"; 
                    // class="fa-solid fa-check" 
                    echo "<p>Booking Date: " . $session['session_date'] . "</p>";
                    echo "<p>Time: " . $session['session_time'] . "</p>";
                    echo "<p> Reach on Time!!
                    Marian Village, Puthuppady P.O, Kothamangalam, Highway, Muvattupuzha, Kochi, Kerala 686673
                    +91 759 4017 614
                    rahulshaji520@gmail.com</p>";
                    echo "Do you want to cancel this session?";
                    ?>
                    <a href="cancel.php"  class="btn btn-danger" onclick="return confirm('Are you sure you want to Cancel This Session?');">Cancel Session</a>

                <?php

                    $Flag = true;  
                }

                // If no bookings were found, show a message
                if (!$Flag) {
                    echo "<p>No booking sessions found.</p>";
                }
            ?>


            </div>
        </div>
    </div>
</div>


 <div class="profile-box">
    <h2>Profile</h2>
   
    <div class="profile-item">
        <label for="name">𝐅𝐮𝐥𝐥 𝐍𝐚𝐦𝐞:</label>
        <span id="name"><?php echo $userdata['name'];?></span>
    </div>
    
      
    
        <div class="profile-item">
    <label for="photo">𝐏𝐡𝐨𝐭𝐨:</label>
    <img id="photo" src="../authentication/user_images/<?php echo $userdata['photo']; ?>" width="100" height="100" alt="Profile Photo">
    
    
 
    </div>
  
   

    <div class="profile-item">
        <label for="age">𝐃𝐚𝐭𝐞 𝐨𝐟 𝐁𝐢𝐫𝐭𝐡:</label>
        <span id="age"><?php echo $userdata['age'];?></span>

    </div>

 
    <div class="profile-item">
        <label for="gender">𝐆𝐞𝐧𝐝𝐞𝐫:</label>
        <span id="gender"><?php if ($userdata['gender']=='male') echo 'Male'; else echo 'Female';?> </span>
    </div>


    <div class="profile-item">
        <label for="email">𝐄𝐦𝐚𝐢𝐥:</label>
        <span id="email"><?php echo $userdata['email']; ?></span>
    </div>


  
  
    <div class="profile-item">
        <label for="phone">𝐏𝐡𝐨𝐧𝐞 𝐍𝐮𝐦𝐛𝐞𝐫:</label>
        <span id="phone"><?php echo $userdata['phone']; ?></span>
    </div>
   

    <div class="profile-item">
        <label for="address">𝐀𝐝𝐝𝐫𝐞𝐬𝐬:</label>
        <span id="address"><?php echo $userdata['address'];?></span>
    </div>

    <div class="profile-item">
        <label for="lsnumber">𝐋𝐢𝐜𝐞𝐧𝐬𝐞 𝐍𝐮𝐦𝐛𝐞𝐫:</label>
        <span id="lsnumber"><?php echo $userdata['license'];?></span>
    </div>

 
 

	
		 <a href="usereditprofile.php" class="btn btn-primary py-2 mr-1">Edit Profile</a>
         <a href="userlogout.php" class="btn btn-danger py-2 mr-1" onclick="return confirm('Are you sure you want to Logout?');">Logout</a>


        
    </div>



</div> 
</div> 

    </body>
    </html>
<?php include('userfooter.php');?>


