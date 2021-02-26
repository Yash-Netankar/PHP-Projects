<?php
session_start();
    $file_name = $_SESSION['file_name'];
    $fptr = fopen($_SESSION['file_name'], "w");
    $_SESSION['text_data'] = $_POST['textarea'];

    fwrite($fptr, $_SESSION['text_data']);
    
    fclose($fptr);
    session_unset();
    session_destroy();
    header("Location: ./index.php");
?>