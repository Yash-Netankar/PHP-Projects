<?php  

if(isset($_POST['submit']))
{
// connnection
$con = mysqli_connect("localhost", "root", "", "register_php") or die("Can't connect to Database bcoz ".mysqli_error($con));

if($con){
?>
    <script>
        alert("Connection to DB Successful..");
    </script>
<?php

        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailQuery = "select * from register where email = '$email'";
        $emailResult = mysqli_query($con, $emailQuery);

        if((mysqli_num_rows($emailResult)) > 0){
        ?>
            <script>
                alert("Email Already Exists");
            </script>
        <?php
            echo("<h2><a href='http://localhost/PHP/Projects/Login,Register,verify/register.html'>Go Back</a></h2>");
            echo("<h3>And Enter your Unique Email Id</h3>");
        }
        else{
            if($password === $cpassword){
                $query = "insert into register (fname, lname, email, password, cpassword, contact) values ('$fname', '$lname', '$email', '$pass', '$cpass', '$phone') order by uid";

                mysqli_query($con, $query);

                header("Location: http://localhost/PHP/Projects/Login,Register,verify/register.html");
            }
            else{
                echo "<h2>Passwords aren't Matching</h2>";
                echo("<h3><a href='http://localhost/PHP/Projects/Login,Register,verify/register.html'>Go Back</a></h3>");
            echo("<h4>And Enter your both passwords correctly</h4>");
            }
        }
    }
}
?>