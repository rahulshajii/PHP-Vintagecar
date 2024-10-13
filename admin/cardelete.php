<?php
include("../authentication/config.php");

$id=$_GET['id'];

$qry=mysqli_query($connect,"DELETE FROM tbl_cars WHERE id=$id");

if($qry){
    echo'
<script>
alert("Record Delete From Database");
window.location="cardatas.php";
</script>
';
}
else{

     echo'
    <script>
    alert("Record Not Delete");
    window.location="cardatas.php";
    </script>
    ';
}

