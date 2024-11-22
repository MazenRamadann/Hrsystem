<?php
include "inc/connection.php";

$name=$_POST['txtName'];
$gender=$_POST['txtGender'];
$position=$_POST['txtPosition'];
$department=$_POST['txtDepartment'];
$email=$_POST['txtEmail'];
$status=$_POST['txtStatus'];
$date=$_POST['txtDate'];

$sql="INSERT INTO employees (db_fullName , db_gender , db_position , db_department , db_email , db_status , db_date) 
                        VALUES ('$name' , '$gender' , '$position',  '$department' , '$email' , '$status' , '$date')";



mysqli_query($con, $sql) or die(mysqli_error($con));

// Redirect after successful insertion
header("Location: addEmployee.php?flag=2");

?>