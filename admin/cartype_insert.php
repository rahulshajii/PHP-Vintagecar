<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

include("../authentication/config.php");

if(isset($_POST["car_type_submit"]))
{

    $car_type=$_POST['car_type'];


    $sql = mysqli_query($connect, "INSERT INTO tbl_cartype(car_type) VALUES ('$car_type')");

if($sql){

    echo '
    <script>
        alert("CarType Insert Successful");
        window.location = "cartype.php";
    </script>
    ';
}
}
else{
    echo '
    <script>
        alert("Not inserted!");
        window.location = "cartype.php";
    </script>
    ';
}

?>
