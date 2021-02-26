<?php
session_start();
    if(isset($_POST['filename'])){
        $filename = $_POST['filename'];
        $fptr = fopen("./$filename", "w");
        if($fptr){
            if($_COOKIE['textarea_value'] != ""){
                fwrite($fptr, $_COOKIE['textarea_value']);
            }
            else{
                echo "<script>
                alert('Can't save empty File');
                </script>";
            }
        }
    }
    fclose($fptr);
    echo $_COOKIE['textarea_value'];
    header("Location: ./index.php");
?>