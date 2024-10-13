<?php
include("header.php");
?>
<div class="container">
          <div class="page-inner">
            
          <style>
       
        .bob {
            width: 100%;
            max-width: 500px; 
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 8px;
        }
     
        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 19px;
            box-sizing: border-box;
        }
        .form-group button {
            background: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
       
     
    </style>
            
      


    <div class="bob">
      
        
        <h2>Upload Car Type</h2>
        <form action="cartype_insert.php" method="post" >
                
                <div class="form-group">
                <label for="make">Car type</label>
                <input type="text" id="make" name="car_type" placeholder="Car Name" required>
            </div>

               
     
            <div class="form-group">
            <button type="submit" name="car_type_submit"  style="width:150px">Submit</button>
            </div>

           
        </form>
    </div>

    </div>
       
 </div>
 <?php include("footer.php"); ?>
  

