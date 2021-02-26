<?php

$sname = $_POST['sname'];
$saddress = $_POST['saddress'];
$class = $_POST['class'];
$sphone = $_POST['sphone'];

$con = mysqli_connect("localhost", "root", "", "php_crud") or die("Connection to DB Failed!!");

$query = "Insert into stud (sname, address, class, phone) values ('{$sname}','{$saddress}','{$class}','{$sphone}')";

mysqli_query($con, $query) or die("Query can't run");

header("Location: http://localhost/PHP/CRUD/crud%20php/index.php");

mysqli_close($con);

?>