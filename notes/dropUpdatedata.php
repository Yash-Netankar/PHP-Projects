<?php
$con = mysqli_connect("localhost", "root", "", "notes");
if(!$con){
  header("Location: ./zerror.html");
}
$id = $_POST['sno'];
$title = $_POST['title'];
$desc = $_POST['desc'];

$sql = "UPDATE note SET title = '$title', description = '$desc' WHERE sno = $id";
mysqli_query($con, $sql);

header("Location: http://localhost/PHP/Projects/notes/index.php");

mysqli_close($con);
?>