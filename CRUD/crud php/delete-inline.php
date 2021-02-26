<?php

    $sid = $_GET['id'];
    
    include "config.php";

    $query = "Delete From stud where sid = {$sid}";

    $result = mysqli_query($con, $query) or die("Query can't run");
       
    header("Location: http://localhost/PHP/CRUD/crud%20php/index.php");

    mysqli_close($con);

?>