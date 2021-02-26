<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <a href="#" class="gmail-link">Login with Google</a>
            <a href="#" class="fb-link">Login with Facebook</a>
            <span>OR</span>

            <form action="login_db.php" method="POST">
                <input type="email" name="login_email" placeholder="Email Id" required>
                <input type="password" name="login_password" placeholder="Your Password" required>
                <button type="submit" class="submit" name="submit">Login</button>
            </form>

            <a href="./register.php">Don't have a account? Sign Up</a>
            <a href="#" class="forget-pass" name="forget">Forgot Password? Click Me</a>
        </div>
    </div>
</body>
</html>