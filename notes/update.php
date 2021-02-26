<?php
  $con = mysqli_connect("localhost", "root", "", "notes");
  if(!$con){
    header("Location: ./zerror.html");
  }
  $id = $_GET['id'];
  $sql = "select * from note where sno = $id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./update-delete.css">
</head>
<body>
<!-- 1]. EDIT MODAL -->
<div class="edit-modal">
    <h1>Edit</h1>
    <form action="./dropUpdatedata.php" method="POST">
        <label for="edit_title">Edit Title</label>
        <input type="text" name="title" id="edit_title" value = "<?php echo $row['title']; ?>">

        <input type="hidden" name="sno" value="<?php echo $row['sno'] ?>">
  
        <label for="edit_desc">Edit Description</label>
    <textarea type="text" name="desc" id="edit_desc"><?php echo  $row['description'];?></textarea>
  
        <button type="submit">Edit</button>
    </form>
  </div>
  
  <!-- <script src="./update.js"></script> -->
</body>
</html>