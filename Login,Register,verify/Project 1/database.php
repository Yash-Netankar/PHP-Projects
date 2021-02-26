<?php 

    $con = mysqli_connect("localhost", "root", "", "first_dynamic_site") or die("Failed to connect To Database bcoz ".mysqli_error($con));

    $name = $_POST['username'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $query = "Insert into user_info (Username, Email, message) values
            ('$name', '$email', '$msg')";
    
    mysqli_query($con, $query) or die ("Query can't run bcoz ".mysqli_error($con));

    mysqli_close($con);
    header("Location: http://localhost/PHP/Projects/Project%201/");

?>