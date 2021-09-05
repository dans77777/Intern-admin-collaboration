<?php
    session_start();
    unset($_SESSION['legitUser']);
    unset($_SESSION['legitEmail']);
    session_destroy();
    header("Location:../");
?>