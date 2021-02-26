<?php 

$sid = $_POST['sid'];
$sname = $_POST['name'];
$saddress = $_POST['address'];
$sclass = $_POST['class'];
$sphone = $_POST['phone'];

$con = mysqli_connect("localhost", "root", "", "php_crud") or die("Connection to DB Failed!!");

$query = "Update stud set sname = '{$sname}', address = '{$saddress}', class = '{$sclass}', phone = '{$sphone}' where sid = {$sid}";

mysqli_query($con, $query) or die("Query can't run bcoz ".mysqli_error($con));

header("Location: http://localhost/PHP/CRUD/crud%20php/index.php");

mysqli_close($con);

?>