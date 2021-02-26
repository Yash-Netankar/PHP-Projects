<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./styles/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" defer></script>
</head>
<body>
<?php
    
    include "../assests/dbcon.php";
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['uname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // securing passwords
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        // boolean variables
        $email_exists = false;
        $uname_exists = false;
        $pass_unmatch = false;

        // checking if username or email exists
        $check_email = "select * from signup where email = '$email'";
        $email_result = mysqli_query($con, $check_email);
        $check_uname = "select * from signup where uname = '$username'";
        $uname_result = mysqli_query($con, $check_uname);

        $email_cnt = mysqli_num_rows($email_result);
        $uname_cnt = mysqli_num_rows($uname_result);

        if($email_cnt == 0 && $uname_cnt == 0){
            if($password === $cpassword){
                $sql = "insert into signup (uname, email, pass, cpass) values('$username', '$email', '$pass', '$cpass')";
                $result = mysqli_query($con, $sql);
            }
            else{
                $pass_unmatch = true;
            }
        }
        else if($email_cnt > 0){
            $email_exists = true;
        }
        else if($uname_cnt > 0){
            $uname_exists = true;
        }

    }
?>

    <div class="container">
        <div class="form-box">

            <div class="form">
                <h1>Register</h1>

            <?php
            if(isset($_POST['submit'])){
                if($uname_exists){
                    echo "<p><small class = 'error'>Username already Exists</small></p>";
                }
                if($email_exists){
                    echo "<p><small class = 'error'>Email already Exists</small></p>";
                }
                if($pass_unmatch){
                    echo "<p><small class = 'error'>Passwords Not Matching</small></p>";
                }
            }
            ?>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete = "off">
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="uname" required>
                        <i class='fas fa-user-alt'></i>
                    </div>

                    <div class="input-box">
                        <input type="email" placeholder="Email" name="email" required>
                        <i class='fas fa-envelope'></i>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" required>
                        <i class='fas fa-lock'></i>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Confirm Password" name="cpassword" required>
                        <i class='fas fa-user-lock'></i>
                    </div>

                    <div class="input-box">
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>