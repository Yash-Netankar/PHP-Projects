<?php

    $con = mysqli_connect("localhost", "root", "", "notes");
    if(!$con){
      header("location: ./zerror.html");
    }
  
  if(isset($_POST["submit"])){
  $title = $_POST['title'];
  $desc = $_POST['description'];

  $sql = "insert into note (title, description) values ('$title', '$desc')";
  $result = mysqli_query($con, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Notes</title>
    <link rel="stylesheet" href="./css.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
<body>
  <div class="container">
      
    <?php
      include "nav.html";
    ?>

    <main>
    <form class="main-form" action="<?php $_SERVER['PHP_SELF']?>" method="POST" autocomplete="off">
          <label for="title"><h2>Add Your Notes</h2></label>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" />

          <label for="desc">Description</label>
          <textarea name="description" id="desc"></textarea>

          <button type="submit" name="submit">Add Note</button>
        </form>
    </main>
<hr>
      <section class="notes">
        <table>
          <thead>
            <tr>
                <th>S.no</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php
              $sql2 = "select * from note";
              $result2 = mysqli_query($con, $sql2);
              $cnt = 1;
              while($rows = mysqli_fetch_assoc($result2)){
                $id = $rows['sno'];
                echo "<tr>
                <td>". $cnt ."</td>
                <td>". $rows['title'] ."</td>
                <td>". $rows['description'] ."</td>
                <td><a href='update.php?id=$id'>
                  <i class='fas fa-edit edit-del'></i>
                  <a> 
                    &nbsp;&nbsp;
                  <a href='delete.php?id=$id'>
                    <i class='fas fa-prescription-bottle edit-del'></i>
                  </a>
                </td>
              </tr>";
              $cnt++;
              }
            ?>
          </tbody>

        </table>
      </section>
  </div>

</body>
</html>
