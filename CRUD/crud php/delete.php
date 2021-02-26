<?php include 'header.php';

    if(isset($_POST['deletebtn'])){
        include "config.php";

        $sid = $_POST['id'];

    $query = "Delete From stud where sid = {$sid}";
    $result = mysqli_query($con, $query) or die("Query can't run");
       
    header("Location: http://localhost/PHP/CRUD/crud%20php/index.php");

    mysqli_close($con);
    }

?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
