<?php
    SESSION_start();
    $_SESSION['loggedIn'] = false;
    header("Location: index.php");
?>