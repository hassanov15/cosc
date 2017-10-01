<?php
    // Start the session
    ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: index.php");
		if ($_SESSION['login_count'] >= 5) {
		      /* Too much login attempt, should blok the ip? */
		    } else {
		      $_SESSION['login_count'] ++;
		    }
    }
?>

<h1>hello user UR Logged In!</h1>
<form method="post" action="logout.php">
    <input type="submit" value="Logout">
</form>