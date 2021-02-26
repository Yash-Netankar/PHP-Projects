<?php  
session_start();
if(isset($_POST['submit']))
{
    $con = mysqli_connect("localhost", "root", "", "register_php") or die("Can't connect to Database bcoz ".mysqli_error($con));

    $email = mysqli_real_escape_string($con, $_POST['login_email']);
    $password = mysqli_real_escape_string($con, $_POST['login_password']);

    $query = "select * from register where email = '$email'";
    $result = mysqli_query($con, $query);

    if((mysqli_num_rows($result)) == 1){
       
        $login_pass = mysqli_fetch_assoc($result);
        $pass = $login_pass['password'];

        $_SESSION['username'] = $login_pass['fname'];

        $check_pass = password_verify($password, $pass);

        if($check_pass){
            header("Location: ./project 1");
        }
        else{
            echo "Password Incorrect";
        }
    }
    else{
        echo"Invalid Email";
    }

}
?>