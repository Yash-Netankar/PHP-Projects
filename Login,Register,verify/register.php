<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <a href="#" class="gmail-link">Register with Google</a>
            <a href="#" class="fb-link">Register with Facebook</a>
            <span>OR</span>
            <form action="register_database.php" method="POST">
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email Id" required>
                <input type="password" name="password" placeholder="Your Password" required>
                <input type="password" name="cpassword" placeholder="Confirm Your Password" required>
                <input type="text" name="phone" placeholder="Contact No.">

                <div class="btnbox">
                    <button type="submit" class="submit" name="submit">Register</button>
                    <a href="login.php" class="submit" name="forget">Login</a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>