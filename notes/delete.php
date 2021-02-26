
<?php
$con = mysqli_connect("localhost", "root", "", "notes");
if(!$con){
  header("Location: ./zerror.html");
}
$id = $_GET['id'];

$sql = "delete from note where sno = $id";
mysqli_query($con, $sql);

header("Location: http://localhost/PHP/Projects/notes/index.php");

mysqli_close($con);
?>






<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./update-delete.css">
</head>
<body> -->
    <!-- 2]. DELETE MODAL -->
  <!-- <div class="del-modal">
    <h1>Delete</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <label for="del_title">Delete Title</label>
        <input type="text" name="del_title" id="del_title">
  
        <label for="del_desc">Delete Description</label>
        <textarea type="text" name="del_desc" id="del_desc"></textarea>
  
        <button type="submit">Delete</button>
    </form>
  </div>
</body>
</html> -->