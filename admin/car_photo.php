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
      
        
        <h2>Upload Car Images</h2>
        <form action="" method="post" enctype="multipart/form-data" >
                
                <div class="form-group">
                <label class="form-control-placeholde" style="color: #01D28E;"for="photo">Photo</label>
                <input type="file" id="imag" name="car_photos[]" multiple accept="image/*">&nbsp;
            </div>

               
     
            <div class="form-group">
            <button type="submit" name="car_photo_submit"  style="width:150px">Submit</button>
            </div>

           
        </form>
    </div>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// include("../authentication/config.php")
if(isset($_POST["car_photo_submit"])) 
{
  
    $files = array_filter($_FILES['car_photos']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['car_photos']['name']);
    // Loop through every file
    for( $i=0 ; $i < $total_count ; $i++ ) {
        
        
       //The temp file path is obtained
       $tmpFilePath = $_FILES['car_photos']['tmp_name'][$i];
       //A file path needs to be present
       if ($tmpFilePath != ""){
          //Setup our new file path
          $newFilePath = "/Applications/XAMPP/xamppfiles/htdocs/vintagecar/admin/car_img/" . $_FILES['car_photos']['name'][$i];
          //File is uploaded to temp dir
          if(move_uploaded_file($tmpFilePath, $newFilePath)) {
             //Other code goes here
          }
       }
    }
    // move_uploaded_file($file_tmp=$_FILES["car_photos"]["tmp_name"][$key],"/Applications/XAMPP/xamppfiles/htdocs/vintagecar/admin/car_img/$file_name");



}

?>



       
 </div>
 <?php include("footer.php"); ?>
  

