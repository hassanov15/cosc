<?php
    SESSION_start();
    $_SESSION['loggedIn'] = false;
    header("Location: index.php");
	if($_SESSION['loginCount']== true){
		$_SESSION['loginCount'] = 0;
		
	}
?>