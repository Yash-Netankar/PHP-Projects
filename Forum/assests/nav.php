<nav>
<?php
    $name = isset($_SESSION['username'])? $_SESSION['username']: "Anonymous";
?>
    <div class="logo">
        <h1><?php echo $name?></h1>
    </div>
    <ul>
        <li><a href='#'>Home</a></li>
        <li><a href='#'>About</a></li>
        <li><a href='#'>Contact</a></li>
        <i class='fas fa-bars'></i>
        <a href='./Login/login.php' class="login">Login</a>
        <a href='./Login/logout.php' class="logout">Logout</a>
    </ul>
</nav>