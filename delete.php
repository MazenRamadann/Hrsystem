
<?php
// session_start();

// if(!isset($_SESSION['user']))
//   header("Location:login.php?error=2");


include "inc/connection.php";

$employeeId=$_GET['ID'];
$sql = "DELETE FROM employees WHERE db_id = '$employeeId'";
mysqli_query($con,$sql);

header("Location:manageEmployee.php");

?>