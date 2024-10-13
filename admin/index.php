<?php
include("../authentication/config.php");
include("header.php");

?>


<div class="container" style="background-image: url('./car_images/wallhaven-4o7y37_1920x1080.png');">
<div class="page-inner" >
        

    <?php
        $pending = 0;
        $accepted = 0;
        $rejected = 0;

        // Query to count the number of each status
        $q = mysqli_query($connect, "SELECT COUNT(status) AS count, status FROM tbl_session GROUP BY status");

        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($q)) {
            // Increment counters based on the status
            if ($row['status'] == '0') {
                $pending = $row['count'];
            } elseif ($row['status'] == '2') {
                $accepted = $row['count'];
            } elseif ($row['status'] == '1') {
                $rejected = $row['count'];
            }
        }
$number=0;
$qry= mysqli_query($connect,"SELECT COUNT(id) AS count, id FROM tbl_cars GROUP BY id");
while($row1 = mysqli_fetch_assoc($qry))
{
$number=$row1['id'];
}

$usernumber=0;
$r=mysqli_query($connect,"SELECT COUNT(id) AS count, id FROM tbl_user GROUP BY id");
while($row2 = mysqli_fetch_assoc($r))
{
$usernumber=$row2['id'];
}

$reviewrnumber=0;
$y=mysqli_query($connect,"SELECT COUNT(id) AS count, id FROM tbl_review GROUP BY id");
while($row3 = mysqli_fetch_assoc($y))
{
$reviewnumber=$row3['id'];
}


?>



        <div class="container row mt-5">
            
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Pending Bookings</h2>
            <p><?php echo $pending; ?></p>
            
</div>
            </div>  
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Rejected Bookings</h2>
            <p><?php echo $rejected; ?></p>
</div>
            </div> 
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Accepted Bookings</h2>
            <p><?php echo $accepted; ?></p>
</div>
            </div> 
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Total Bookings</h2>
            <p><?php echo $accepted+$rejected+$pending; ?></p>
</div>
            </div> 
            
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Total Cars</h2>
            <p><?php echo $number; ?></p>
</div>
            </div> 
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Total users</h2>
            <p><?php echo $usernumber; ?></p>
</div>
            </div> 
            <div class="col-md-4" style="padding:15px ;">
                <div style="background-color:white;color:black;border-radius:25px;height:158px;padding:10px">
            <h2>Reviews</h2>
            <p><?php echo $reviewnumber; ?></p>
</div>
            </div> 
            
        </div>

       

        

    </div>
</div>

<?php include("footer.php"); ?>
