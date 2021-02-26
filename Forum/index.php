<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyForum | Home</title>
    <link rel="stylesheet" href="./assests/styles/css.css">
    <link rel="stylesheet" href="./assests/styles/slider.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' defer></script>
</head>

<body>
    <div class="container">
        <!-- nav -->
        <?php include "./assests/nav.php";?>
        <main>
            <!-- slider -->
            <?php include "./assests/slider.php"?>
            <!-- cards -->
            <div class="main-cardContainer">
                <?php include "./assests/card.php";?>
            </div>
        </main>
    </div>
    <script src="./assests/js/slider.js" defer></script>
</body>

</html>