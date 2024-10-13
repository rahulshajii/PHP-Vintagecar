<!-- insert car details -->
<?php
include("../authentication/config.php");

if(isset($_POST['submit'])){
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



error_reporting(E_ALL);
ini_set('display_errors', 1);





 

$qry= mysqli_query($connect,"INSERT INTO tbl_cars(carname,carmodel,cartype,`year`,vin,color,mileage,price,originalowner,`description`) VALUES ('$carname','$carmodel','$cartype','$year','$vin','$color','$mileage','$price','$originalowner','$description') ");
// echo "asdfghj";
 if($qry){

    // echo "asdfghj";
    $last_id = mysqli_insert_id($connect);
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
                        $fileset=$_FILES['car_photos']['name'][$i];
                            $qry1="insert into tbl_carphoto (car_id,photo) values('$last_id','$fileset')";
                            $res=mysqli_query($connect,$qry1);
                    }
                }
                }

    echo ' <script>
                        alert("Data inserted successfully.");
                        window.location = "addcar.php";
            </script>
                    ';
 

 }
else{
   ' <script>
                    alert("Failed to inserting data.");
                    window.location = "addcar.php";
    </script>
                ';
}

}


?>
