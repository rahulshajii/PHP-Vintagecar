<?php
include("header.php");
include("../authentication/config.php");

$query = "SELECT car_type FROM tbl_cartype ORDER BY car_type";
$result = mysqli_query($connect, $query);
?>
<div class="container">
          <div class="page-inner">
            
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
        
        <h2>Upload Car Details</h2>
        <form  action="./insertcar.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label for="make">Name:</label>
                <input type="text" id="make" name="carname" placeholder="Car Name" required>
            </div>

                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="carmodel" placeholder="Model" required>
            </div>
                    
                </div>
                <div class="col-md-4">
                <div class="form-group">

                <label for="car_type">Car Type:</label>
                <select id="car_type" name="cartype" required>
                <option value="">Select Car Type</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['car_type'] . '">' . $row['car_type'] . '</option>';
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
                <input type="text" id="year" name="year" min="1886" max="2024" placeholder="Year" required>
            </div>

                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="vin">VIN:</label>
                <input type="text" id="vin" name="vin" placeholder="Indentification Number" required>
            </div>
                    
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" placeholder="Color" required>
            </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label for="mileage">Mileage:</label>
                <input type="text" id="mileage" name="mileage" placeholder="Mileage" required>
            </div>

                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" step="0.01" placeholder="Price" required>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="originalowner">Originalowner:</label>
                <input type="text" id="originalowner" name="originalowner" placeholder="originalowner Name" required>
            </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" placeholder="Discription....." required></textarea>
            </div>
                </div>
                <div class="col-md-4">
                

            <div class="form-group">
                <label class="form-control-placeholde" style="color: #01D28E;"for="photo">Photo</label>
                <input type="file" id="imag" name="car_photos[]" multiple accept="image/*">&nbsp;
            </div>  
                </div>
             
            </div>
            <div class="row">
            <div class="form-group">
            <button type="submit" name="submit"  style="width:150px">Submit</button>
            </div>
    </div>
           
        </form>
    </div>


            </div>
          </div>
        </div>
<?php include("footer.php"); ?>
