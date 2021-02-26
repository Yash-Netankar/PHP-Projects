<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
    <h4>Hii, Mr/Mrs <?php echo $_SESSION['username']?></h4>
    <h4>Good Morning!!</h4>

    <a href= "./logout.php" name='logout'>Logout</a>
</body>
</html>