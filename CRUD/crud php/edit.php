<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>

    <?php 
    
    $con = mysqli_connect("localhost", "root", "", "php_crud") or die("Connection to DB Failed!!");

    $stud_id = $_GET['id'];
    $query = "Select * from stud WHERE sid = {$stud_id}";
    $result = mysqli_query($con, $query) or die("Query can't run bcoz ".mysqli_error($con));

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

    ?>

    <form class="post-form" action="update_edited_data.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row['sid'];?>"/>
          <input type="text" name="name" value="<?php echo $row['sname'];?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
        <input type="text" name="address" value="<?php echo $row['address'];?>"/>
      </div>
      <div class="form-group">
            <label>Class</label>
            <?php

            $query2 = "select * from stud_class";
            $result2 = mysqli_query($con, $query2) or die("Query can't run bcoz ".mysqli_error($con));

            if(mysqli_num_rows($result2) > 0){
                echo '<select name="class">';
                while($row2 = mysqli_fetch_assoc($result2)){
                    if($row['class'] == $row2['id']){
                        $select = "selected";
                    }
                    else{
                        $select = "";
                    }

              echo "<option {$select} value='{$row2['id']}'>{$row2['name']}</option>";
                }
                echo '</select>';
            }
            ?>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" value="<?php echo $row['phone'];?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>

    <?php 
        }
    }
    ?>
</div>
</div>
</body>
</html>
