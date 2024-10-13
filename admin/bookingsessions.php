<?php
include("../authentication/config.php");
include("header.php");

?>


<div class="container">
    <div class="page-inner">
        <div class="container mt-5">
            <h2>Pending Bookings</h2>
            <table class="table table-bordered table-striped">
                <?php
                // Fetch data from the database
                $result = mysqli_query($connect, "SELECT * FROM tbl_session where status='0'");
                
                // Check if there are any records
                if(mysqli_num_rows($result) > 0) {
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car ID</th>
                        <th>Booking Date</th>
                        <th>Session Time</th>
                        <th>Session Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the rows and display data
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['car_id']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['session_time']; ?></td>
                        <td><?php echo $row['session_date']; ?></td>
                        <td>
    <form action="update_status.php" method="POST" style="display: inline-block;">
        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="status" value="Accepted" class="btn btn-success btn-sm">Accept</button>
        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="status" value="Declined" class="btn btn-danger btn-sm">Decline</button>
    </form>
</td>


                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                } else {
                    // Display message if no records are found
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="container mt-5">
            <h2>Accepted Bookings</h2>
            <table class="table table-bordered table-striped">
                <?php
                // Fetch data from the database
                $result = mysqli_query($connect, "SELECT * FROM tbl_session where status='2'");
                
                // Check if there are any records
                if(mysqli_num_rows($result) > 0) {
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car ID</th>
                        <th>Booking Date</th>
                        <th>Session Time</th>
                        <th>Session Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the rows and display data
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['car_id']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['session_time']; ?></td>
                        <td><?php echo $row['session_date']; ?></td>
                        


                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                } else {
                    // Display message if no records are found
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="container mt-5">
            <h2>Declined Bookings</h2>
            <table class="table table-bordered table-striped">
                <?php
                // Fetch data from the database
                $result = mysqli_query($connect, "SELECT * FROM tbl_session where status='1' ");
                
                // Check if there are any records
                if(mysqli_num_rows($result) > 0) {
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car ID</th>
                        <th>Booking Date</th>
                        <th>Session Time</th>
                        <th>Session Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the rows and display data
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['car_id']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['session_time']; ?></td>
                        <td><?php echo $row['session_date']; ?></td>
                        


                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                } else {
                    // Display message if no records are found
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="container mt-5">
            <h2> Bookings with date</h2>
            <form method="post">
                <label>from date</label>
            <input type="date" name="from" required>
            <label>to date</label>
            <input type="date" name="to" required>
            <input class="btn btn-primary" type="submit" name="datesubmit">
            </form>
            <table class="table table-bordered table-striped">
                <?php
                // Fetch data from the database
                $resultdate= mysqli_query($connect, "SELECT * FROM tbl_session");
                if(isset($_POST['datesubmit']))
                {
                    $from=$_POST['from'];
                    $to=$_POST['to'];
                    $resultdate= mysqli_query($connect, "SELECT * FROM tbl_session where session_date between '$from' and '$to' "); 
                    //  echo "SELECT * FROM tbl_session where session_date between '$from' and '$to' ";
                }
                
                // Check if there are any records
                if(mysqli_num_rows($resultdate) > 0) {
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car ID</th>
                        <th>Booking Date</th>
                        <th>Session Time</th>
                        <th>Session Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the rows and display data
                    while($row1 = mysqli_fetch_assoc($resultdate)) {
                    ?>
                    <tr>
                        <td><?php echo $row1['id']; ?></td>
                        <td><?php echo $row1['user_id']; ?></td>
                        <td><?php echo $row1['car_id']; ?></td>
                        <td><?php echo $row1['date_time']; ?></td>
                        <td><?php echo $row1['session_time']; ?></td>
                        <td><?php echo $row1['session_date']; ?></td>
                        


                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                } else {
                    // Display message if no records are found
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="container mt-5">
            <h2> Bookings with Time</h2>
            <form method="post">
                <label>from date</label>
            <input type="time" name="from" required>
            <label>to date</label>
            <input type="time" name="to" required>
            <input class="btn btn-primary btn-sm" type="submit" name="timesubmit">
            </form>
            <table class="table table-bordered table-striped">
                <?php
                // Fetch data from the database
                $resultdate= mysqli_query($connect, "SELECT * FROM tbl_session");
                if(isset($_POST['timesubmit']))
                {
                    $from=$_POST['from'];
                    $to=$_POST['to'];
                    $resultdate= mysqli_query($connect, "SELECT * FROM tbl_session where session_time between '$from' and '$to' "); 
                    //   echo "SELECT * FROM tbl_session where session_time between '$from' and '$to' ";
                }
                
                // Check if there are any records
                if(mysqli_num_rows($resultdate) > 0) {
                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car ID</th>
                        <th>Booking Date</th>
                        <th>Session Time</th>
                        <th>Session Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the rows and display data
                    while($row1 = mysqli_fetch_assoc($resultdate)) {
                    ?>
                    <tr>
                        <td><?php echo $row1['id']; ?></td>
                        <td><?php echo $row1['user_id']; ?></td>
                        <td><?php echo $row1['car_id']; ?></td>
                        <td><?php echo $row1['date_time']; ?></td>
                        <td><?php echo $row1['session_time']; ?></td>
                        <td><?php echo $row1['session_date']; ?></td>
                        


                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                } else {
                    // Display message if no records are found
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>
