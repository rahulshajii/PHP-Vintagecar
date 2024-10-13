<!DOCTYPE html>
<html>
<head>
    <title>admin profile</title>
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
        table {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            padding: 10px;
        }
        h2{
          text-align: center;
            margin-left: auto;
            margin-right: auto;
            padding:30px;
        
        }
    </style>
</head>
<body>
  <?php
     include('sidebar.php');
     include('navbar.php');
 ?>


    

    <h2>Admin Profile</h2>

    <table width="378" height="158" cellpadding="10">
        <tr>
            <th>Admin</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Name:</td>
            <td>RAHUL SHAJI</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>&nbsp;rahulshaji@gmail.com</td>
        </tr>
        <tr>
            <td>Contact:</td>
            <td>&nbsp;+91 759 4017 614</td>
        </tr>
    </table>

</body>
</html>

