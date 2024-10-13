
<?php
include("header.php");
?>
<div class="container">
          <div class="page-inner">
            
 <div class="row">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <form action="addcar.php">
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                        type="submit"
                      >Add Cars
                      
                        <i class="fa fa-plus"></i>
                       
                        
                        
                      </button>
                      </form>
</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                      <?php
                      $result = mysqli_query($connect, "SELECT * FROM tbl_cars");
                      if(mysqli_num_rows($result) > 0) {
                        ?>
                      
                        <thead>
                          <tr>
                            <th>Car Name</th>
                            <th>Car Model</th>
                            <th>Car Type</th>
                            <th>Year</th>
                            <th>VIN</th>
                            <th>Color</th>
                            <th>Mileage</th>
                            <th>Price</th>
                            <th>originalowner</th>
                            <th>Description</th>
                            <th>Car Photo</th>
                            <th>Upload Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!-- <tfoot>
                          <tr>
                                <th>Car Name</th>
                                <th>Car Model</th>
                                <th>Car Type</th>
                                <th>Year</th>
                                <th>VIN</th>
                                <th>Color</th>
                                <th>Mileage</th>
                                <th>Price</th>
                                <th>originalowner</th>
                                <th>Description</th>
                                <th>Car Photo</th>
                                <th>Upload Date</th>
                                <th>Action</th>
                          </tr>
                        </tfoot> -->
                        <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                              $car_id = $row['id'];
                              $query = "SELECT photo FROM tbl_carphoto WHERE car_id = '$car_id' ORDER BY photo LIMIT 1";
                              $photo_result = mysqli_query($connect, $query);

                              $pic = '';
                              if ($row1 = mysqli_fetch_assoc($photo_result)) {
                                  $pic = $row1['photo'];
                              }

                              
                              echo '<tr>
                                        <td>'.$row['carname'].'</td>
                                        <td>'.$row['carmodel'].'</td>
                                        <td>'.$row['cartype'].'</td>
                                        <td>'.$row['year'].'</td>
                                        <td>'.$row['vin'].'</td>
                                        <td>'.$row['color'].'</td>
                                        <td>'.$row['mileage'].'</td>
                                        <td>'.$row['price'].'</td>
                                        <td>'.$row['originalowner'].'</td>
                                        <td>'.$row['description'].'</td>

                                        <td><img src="./car_img/'.$pic.' " alt="Car Photo" style="width: 100px;"></td>
                                        <td>'.$row['car_date'].'</td>
                                        <td class="action-icons">
                                            <a href="carupdate.php?id='.$row['id'].'" style="margin-right:5px"><i class="fas fa-edit"></i></a> &nbsp;
                        
                                            <a href="cardelete.php?id='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete this record?\');" ><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>';
                            }
                            ?>
                          
                         
                         
                        </tbody>
                    <?php 
                    } 
                    else {
                        echo 'No records found.';
                        }
                    ?>
                      </table>
                    </div>
                  </div>
<?php include("footer.php"); ?>
        
         

