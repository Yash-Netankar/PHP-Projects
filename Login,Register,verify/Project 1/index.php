<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Dynamic Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css.css">
</head>

<body>

    <div class="container">
        <nav id="navbar">
            <a href="#" class="logo">NY's Dynamic Site</a>


            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#about-me">About</a></li>
                <li> <a href="#gallery-items">Gallery</a></li>
                <li> <a href="#contact-form">Contact</a></li>
                <li> <a href="../logout.php">Logout</a></li>
            </ul>

            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>

        <main>
            <div class="content">
                <p class="h1">First Dynamic Website
                <p>
                <p>Like it? Follow me on Insta</p>
                <a href="https://www.instagram.com/ny_codes/" class="insta-btn" target="_blank"><i class="fa fa-instagram" style="font-size:24px"></i></a>
            </div>
        </main>

        <div class="about-us">
            <div class="heading">Yash Netankar</div>
            <div id="about-me">
                <div class="imgdiv"></div>
            <div class="articlediv">
                <article>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore consequuntur ad soluta
                    dolorum, autem id ipsum. Cupiditate iusto vel ab ducimus eius molestiae mollitia, officiis
                    adipisci reprehenderit rerum labore alias?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum neque quidem, tempore est aspernatur molestiae eveniet ullam eum dicta praesentium ex voluptas expedita amet voluptate reprehenderit deleniti id quos.
                </article>
            </div>
            </div>
        </div>

        <div class="gallery">
            <div class="heading">Gallery</div>
            <div id="gallery-items">
                <img src="./images/gallery/img1.jpeg">
                <img src="./images/gallery/img3.jpeg">
                <img src="./images/gallery/img2.jpeg">
                <img src="./images/gallery/img2.jpeg">
                <img src="./images/gallery/img1.jpeg">
                <img src="./images/gallery/img3.jpeg">
                <img src="./images/gallery/img3.jpeg">
                <img src="./images/gallery/img2.jpeg">
                <img src="./images/gallery/img1.jpeg">
            </div>
        </div>

        <div class="contact-us">
            <div class="description">
                <p class="heading">Contact Me</p>
                <p>If you liked my work</p>
            </div>
            <form action = "database.php" method="post" id="contact-form">
                <input type="text" name="username" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="msg" cols="50" rows="5" placeholder="Your Message for me"></textarea>
                <button type = "submit"class="submit-btn">Submit</button>
            </form>
        </div>

        <footer>
            <p>&copy;2020-2021 By Yash Netankar</p>
            <a href="#navbar">Back To Top</a>
        </footer>
    </div>

    <script src="./js.js"></script>
</body>
</html>