<?php
$servername="localhost";
$username="root";
$password="";
$datebase="db_vintage";

$connect= new mysqli($servername,$username,$password,$datebase);
if(!$connect){
    echo "DataBase Connection Error";
}
// else{
//     echo "test1";
// }


//?>