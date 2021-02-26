<?php

$con = mysqli_connect("localhost", "root", "", "forum");
if(!$con){
    header("Location: ./error.html");
}

?>