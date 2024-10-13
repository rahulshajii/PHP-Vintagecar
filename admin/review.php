<?php
include("header.php");
?>
<div class="container">
    <div class="page-inner">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
            <?php
            include("../authentication/config.php");

            $result = mysqli_query($connect, "SELECT * FROM tbl_review");
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
            <?php
                }
            }
             else {
                echo "<tr><td colspan='4'>No reviews found</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>
