<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" defer></script>
</head>
<body>

<?php

    include "./dbcon.php";
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con, $_POST['uname']);
        $password = $_POST['password'];

        $pass_unmatch = false;
        $uname_unmatch = false;

        $uname_query = "select * from register where uname = '$username'";
        $uname_result = mysqli_query($con, $uname_query);

        $uname_cnt = mysqli_num_rows($uname_result);

        $arr = mysqli_fetch_assoc($uname_result);

        if($uname_cnt == 1){
            $pass = $arr['pass'];
            $pass_match = password_verify($password, $pass);
            if($pass_match){
                $_SESSION['username'] = $arr['uname'];
                if(isset($_POST['remember'])){
                    setcookie('uname', $username, time() + (86400 * 3));
                    setcookie('pass', $password, time() + (86400 * 3));
                    header("Location: ./website.php");
                }
                else{
                    header("Location: ./website.php");
                }
            }
            else{
                $pass_unmatch = true;
            }
        }
        else{
            $uname_unmatch = true;
        }

    }

?>

    <div class="container">
        <div class="form-box">

        <?php
            if(isset($_POST['login'])){
                if($uname_unmatch){
                    echo "<small class = 'error'>Invalid Username<small>";
                }
                if($pass_unmatch){
                    echo "<small class = 'error'>Invalid Password<small>";
                }
            }
        ?>

            <div class="form">
                <h1>Login</h1>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete = "off">
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="uname" value = "<?php if(isset($_COOKIE['uname'])){
                        echo $_COOKIE['uname']; }?>">


                        <i class='fas fa-user-alt'></i>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" value = "<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass']; }?>">
                        <i class='fas fa-lock'></i>
                    </div>

                    <label class="remember"><input type="checkbox" name = "remember">Remember Me(3 days)</label>

                    <div class="input-box">
                        <input type="submit" name="login" value="Login">
                    </div>

                    <p><a href="#">Forget Password</a></p>
                    <p><a href="#">Not a Member<i class='fas fa-question'></i> Sign UP</a></p>
                </form>
            </div>

        </div>
    </div>
</body>
</html>