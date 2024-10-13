<?php



include("config.php");
$name = "";
$age = "";
$gender = "";
$email = "";
$phone = "";
$address = "";
$license = "";
$photo= "";
$password = "";
$cpassword = "";


if(isset($_POST["submit"])) 
{
    $name       = $_POST['name'];
    $age        = $_POST['age'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $address    = $_POST['address'];
    $license    = $_POST['lsnumber'];
    $photo      = $_FILES['photo']['name'];
    $temp_photo = $_FILES['photo']['tmp_name'];
    $password   = $_POST['password'];
    $cpassword  = $_POST['cpassword'];


    
if($password == $cpassword)
{
    move_uploaded_file($temp_photo,"/Applications/XAMPP/xamppfiles/htdocs/vintagecar/authentication/user_images/$photo");
    $_insertFirst = mysqli_query($connect, "INSERT INTO tbl_login (email, password, user_type) VALUES('$email', '$password', 'customer')");
if ($_insertFirst) {
    $last_id = mysqli_insert_id($connect);
    $_insertSecond = mysqli_query($connect,"INSERT INTO tbl_user (login_id,name,age,gender,phone,address,license,photo) VALUES('$last_id','$name','$age','$gender','$phone','$address','$license','$photo') ");
    if($_insertSecond)
    { 
        echo '
                <script>
                    alert("Signup Successful");
                    window.location = "../index.php";
                </script>
                ';
    }
    else 
    { 
        echo '
                <script>
                    alert("Not inserted!");
                    window.location = "signin.php";
                </script>
                ';
    }
} else {
    // Handle the error
    echo "Error: " . mysqli_error($connect);
}

    }
    else {
        echo '
        <script>
            alert("Passwords do not match.");
            window.location = "signin.php";
        </script>
        ';
    }
}








?>