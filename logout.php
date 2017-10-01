<?php
    
	SESSION_destroy();
    $_SESSION['loggedIn'] = false;
    header("Location: index.php");
?>