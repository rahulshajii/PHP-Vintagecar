
<?php
include("header.php");


include("../authentication/config.php");
?>
<div class="container">
          <div class="page-inner">
            
            
            
            
            <div class="row">
              
<?php
$id=$_GET['id'];

$qry=mysqli_query($connect,"SELECT * FROM tbl_cars WHERE id='$id'");
//  $qry=mysqli_query($connect,$sql);


 $row=mysqli_fetch_assoc($qry);
//  echo $row['description'];




 if(isset($_POST['update'])){

    $carname=$_POST['carname'];
    $carmodel=$_POST['carmodel'];
    $cartype=$_POST['cartype'];
    $year=$_POST['year'];
    $vin=$_POST['vin'];
    $color=$_POST['color'];
    $mileage=$_POST['mileage'];
    $price=$_POST['price'];
    $originalowner=$_POST['originalowner'];
    $description=$_POST['description'];



$update= "UPDATE tbl_cars SET carname='$carname', carmodel='$carmodel', cartype='$cartype', year='$year', vin='$vin', color='$color', mileage='$mileage', price='$price',originalowner='$originalowner', description='$description' WHERE id='$id' ";
$result=mysqli_query($connect,$update);      
if($result){
    echo '
    <script>
    alert("Record update Successfully");
     window.location="cardatas.php";
    </script>
    ';

}

else{
echo '
<script>
alert("Update Error");
window.location="cardatas.php";
</script>
';

}
 }

?>

<style>
       
       .bob {
           width: 100%;
           /* max-width: 500px; */
           background: #fff;
           padding: 20px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           border-radius: 8px;
       }
       .form-group {
           margin-bottom: 15px;
       }
       .form-group label {
           display: block;
           margin-bottom: 5px;
       }
       .form-group input, 
       .form-group select, 
       .form-group textarea {
           width: 100%;
           padding: 19px;
           box-sizing: border-box;
       }
       .form-group input[type="file"] {
           padding: 3px;
       }
       .form-group button {
           background: #5cb85c;
           color: white;
           border: none;
           padding: 10px 15px;
           cursor: pointer;
           border-radius: 5px;
       }
       .form-group button:hover {
           background: #4cae4c;
       }
       nav {
           width: 100%;
           background: #fff;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           margin-bottom: 20px;
           padding: 10px;
       }
   </style>
           

           <div class="row">




<div class="bob">
    
    <h2>Update Car Details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="make">Name:</label>
            <input type="text" id="make" name="carname" value="<?php echo $row['carname']; ?>" required>
        </div>

            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" id="model" name="carmodel" value="<?php echo $row['carmodel']; ?>"   required>
        </div>
                
            </div>


            <?php
            $query = "SELECT car_type FROM tbl_cartype ORDER BY car_type";
            $result = mysqli_query($connect, $query);
            ?>



            <div class="col-md-4">
            <div class="form-group">
            <label for="car_type">Car Type:</label>
            <select id="car_type" name="cartype" >
                <option value=""><?php echo $row['cartype']; ?> </option>



                <?php
                    while ($row3 = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row3['car_type'] . '">' . $row3['car_type'] . '</option>';
                    }
                    
                ?>



                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Truck">Truck</option>
                <option value="Coupe">Coupe</option>
                <option value="Convertible">Convertible</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Van">Van</option>
            </select>
        </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" id="year" name="year" min="1886" max="2024" value="<?php echo $row['year']; ?>"  required>
        </div>

            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="vin">VIN:</label>
            <input type="text" id="vin" name="vin" value="<?php echo $row['vin']; ?>"  required>
        </div>
                
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $row['color']; ?>"  required>
        </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="mileage">Mileage:</label>
            <input type="text" id="mileage" name="mileage" value="<?php echo $row['mileage']; ?>"  required>
        </div>

            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>"  required>
        </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="originalowner">Originalowner:</label>
            <input type="text" id="originalowner" name="originalowner" value="<?php echo $row['originalowner']; ?>"  required>
        </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" value=""  required><?php echo $row['description']; ?></textarea>
        </div>
            </div>
            <!-- <div class="col-md-4">
            <div class="form-group">
            <label for="car_image">Upload Image:</label>
            <input type="file" id="car_image" name="carphoto" accept="image/*" required>
        </div>
            </div> -->
         
        </div>
        <div class="row">
        <div class="form-group">
        <button type="submit" name="update"  style="width:150px">Submit</button>
        </div>
</div>
       
    </form>
</div>


        </div>
      </div>
    </div>
<?php include("footer.php"); ?>

 


