<?php

    session_start();
    session_unset();
    session_destroy();

    setcookie("uname", "", time() -  (86400 * 3));
    setcookie("pass", "", time() -  (86400 * 3));

    header("Location: ./login.php");

?>