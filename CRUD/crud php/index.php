<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
        // creating connection
        $con = mysqli_connect("localhost", "root", "", "php_crud") or die("Connection to DB Failed!!");
        // query
        $query = "Select * From stud Join stud_class where stud.class = stud_class.id order by sid";
        // running query
        $result = mysqli_query($con, $query) or die("Query can't run");
        // checking if we got data or not
        if(mysqli_num_rows($result) > 0){ 
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
                while($rows = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $rows['sid'];?></td>
                <td><?php echo $rows['sname'];?></td>
                <td><?php echo $rows['address'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td>
                    <a href='edit.php?id=<?php echo $rows['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $rows['sid']; ?>'>Delete</a>
                </td>
            </tr>

            <?php
                }
            ?>

        </tbody>
    </table>

    <?php
        }
        else{
            echo("<h2>No Records Found</h2>");
        }
        // closing connection
        mysqli_close($con);
    ?>

</div>
</div>
</body>
</html>
